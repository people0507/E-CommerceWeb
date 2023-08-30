<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    #User
    public function register(){
        return view('clients.authentications.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_email'         =>  'required|email|',
            'user_name'          =>  'required|',
            'user_fullname'     => ['required', 'regex:/^[A-Za-zÀ-Ỹà-ỹ\s]+$/u'],
            'user_password'      =>  'required|min:8|max:256|',
            'user_confirm'  => 'required|same:user_password|min:8|max:256|',
        ]);

        try {
            $user = new User;
            $user->user_email = $request->user_email;
            $user->user_name = $request->user_name;
            $user->role_id = 2;
            $user->user_password = bcrypt($request->user_password);
            $user->save();

            $userdetail = new UserDetail();
            $userdetail->userdetail_fullname = $request->userdetail_fullname;
            $userdetail->user_id = $user->id;
            $userdetail->save();
            return redirect()->route('auth.loginuser')->with('success','Register succesfully');
        } catch (\Exception $e) {
            return redirect()->route('auth.register');
        }
    }

    public function loginuser(){
        return view('clients.authentications.login');
    }

    public function checkloginuser(Request $request){
        
        if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            return redirect()->route('client.homepage')->with('success','Login succesfully');
        } else {
            return redirect()->route('auth.loginuser')->with('failed','Login failed,please check your username or password and try again.');
        }
    }

    public function logoutuser()
    {
        Auth::logout();
        return redirect()->route('auth.loginuser');
    }


    #Admin
    public function login(){
        return view('admins.authentications.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function checklogin(Request $request){
        
        if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            return redirect()->route('dashboard.index')->with('success','Login succesfully');
        } else {
            return redirect()->route('auth.login')->with('failed','Login failed,please check your username or password and try again.');
        }
    }
}
