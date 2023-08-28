<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(10);
        return view('admins.roles.table',compact('roles'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        
        $roles = Role::where('id', $query)
                     ->orWhere('role_name', 'LIKE', "%$query%")
                     ->get();
        return view('admins.roles.table',compact('roles'));
    }


    public function create()
    {
        return view('admins.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name'          =>  'required',
        ]);

        try {
            $role = new Role;
            $role->role_name = $request->role_name;
            $role->save();
            return redirect()->route('role.index')->with('success', 'Add role successfully!');
        } catch (\Exception $e) {
            return redirect()->route('role.create')->with('failed', 'Add role failed!');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        return view('admins.roles.edit',compact('roles'));
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
            'role_name'          =>  'required',
        ]);
        $role = Role::findOrFail($id);
    try {
        $role->role_name = $request->role_name;
        $role->save();
        return redirect()->route('role.index')->with('success', 'Update role successfully!');
    } catch (\Exception $e) {
        return redirect()->route('role.edit')->with('failed', 'Update role failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

    return redirect()->route('role.index')->with('success','Delete role successfully');
    }
}
