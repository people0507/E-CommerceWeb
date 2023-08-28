<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPassword extends Controller
{
    public function forgotpassword(){
        return view('clients.authentications.forgotpassword');
    }

    public function checkToken(){
        return view('clients.authentications.check');
    }

    public function tokenEmail(Request $request){
        $user_email = $request->user_email;
        $detail = User::where('user_email', $user_email)->first();
        $randomNumber = Str::random(6);
        session()->put('token', $randomNumber);
        if($detail == null){
            return redirect()->route('client.forgotpassword')->with('failed','Email does not exist,please try again !!!');
        }
        else
        {
            Mail::send('clients.authentications.email',compact('randomNumber'),function($email) use($user_email){
                $email->subject('REQUEST TOKEN FORM USER');
                $email->to($user_email);
            });
            return view('clients.authentications.check',compact('user_email'));
        }
    }

    public function handleToken(Request $request){
        $user_email = $request->user_email;
        $detail = User::where('user_email', $user_email)->first();
        session()->put('user_email', $user_email);
        $token = session()->get('token');
        if($token == $request->user_token && $detail != null){
            return view('clients.authentications.changePassword');
        }
        else{
            return redirect()->route('client.forgotpassword');
        }
    }

    public function changePassword(Request $request){
        $user_email = session()->get('user_email');
        $detail = User::where('user_email', $user_email)->first();
        if($request->user_password == $request->confirm_password){
            $detail->user_password = bcrypt($request->user_password);
            $detail->save();
            return redirect()->route('auth.loginuser')->with('success','Change Password Successful');
        }
        else{
            return redirect()->route('client.forgotpassword');
        }
    }
}
