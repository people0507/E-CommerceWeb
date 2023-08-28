<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDetailController extends Controller
{

    public function index()
    {
        $user_details = UserDetail::paginate(5);
        return view('admins.userdetails.table',compact('user_details'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        
        $user_details = UserDetail::where('id', $query)
                     ->orWhere('userdetail_birth', 'LIKE', "%$query%")
                     ->orWhere('userdetail_phonenumber', 'LIKE', "%$query%")
                     ->orWhere('userdetail_address', 'LIKE', "%$query%")
                     ->orWhere('userdetail_fullname', 'LIKE', "%$query%")
                     ->get();
        return view('admins.userdetails.table',compact('user_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit()
    {
        return view('admins.authentications.detail');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'userdetail_birth'          =>  'required',
            'userdetail_phonenumber'          =>  'required',
            'userdetail_address'          =>  'required',
            'userdetail_fullname'          =>  'required',
        ]);    

        try {
            $userdetail = UserDetail::findOrFail($id);

            if ($request->hasFile('userdetail_avatar')) {
                $image = $request->file('userdetail_avatar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/users'), $imageName);
                $userdetail->userdetail_avatar= $imageName;
            }
            $userdetail->userdetail_birth = $request->userdetail_birth;
            $userdetail->userdetail_phonenumber = $request->userdetail_phonenumber;
            $userdetail->userdetail_address = $request->userdetail_address;
            $userdetail->userdetail_fullname = $request->userdetail_fullname;
            $userdetail->save();
            
            return redirect()->route('userdetail.index');
        } catch (\Exception $e) {
            return redirect()->route('userdetail.edit');
        }
    }

  
}
