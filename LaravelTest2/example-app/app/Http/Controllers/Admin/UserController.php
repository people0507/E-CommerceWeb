<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);
        return view('admins.users.table',compact('users'));
    }


    public function search(Request $request){
        $query = $request->input('query');
        
        $users = User::where('id', $query)
                     ->orWhere('user_name', 'LIKE', "%$query%")
                     ->orWhere('user_email', 'LIKE', "%$query%")
                     ->get();
        return view('admins.users.table',compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('admins.users.create',compact('roles'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'user_email'         =>  'required|email',
            'user_name'          =>  'required',
            'role_id'          =>  'required',
            'user_password'      =>  'required',
            'user_confirm'  => 'required|same:user_password',
        ]);

        try {
            $user = new User;
            $user->user_email = $request->user_email;
            $user->user_name = $request->user_name;
            $user->role_id = $request->role_id;
            $user->user_password = bcrypt($request->user_password);
            $user->save();

            $userdetail = new UserDetail();
            $userdetail->userdetail_fullname = $request->userdetail_fullname;
            $userdetail->user_id = $user->id;
            $userdetail->save();
            return redirect()->route('user.index')->with('success', 'Add user successfully!');
        } catch (\Exception $e) {
            return redirect()->route('user.create')->with('failed', 'Add user failed!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admins.users.edit',compact('users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_email'         =>  'required|email',
            'user_name'          =>  'required',
        ]);
        
        $user = User::findOrFail($id);

    
    if ($request->filled('user_password')) {
        $user->user_password = bcrypt($request->user_password);
    }


    try {
        $user->user_email = $request->user_email;
        $user->user_name = $request->user_name;
        $user->role_id = $request->role_id;
    
        $user->save();
        return redirect()->route('user.index')->with('success', 'Update user successfully!');
    } catch (\Exception $e) {
        return redirect()->route('user.edit')->with('failed', 'Update user failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

    return redirect()->route('user.index')->with('success','Delete user successfully');
    }

   

}
