<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthManager extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect('/');
        }
        return view('login');
    }

    function registration(){
        if (Auth::check()){
            return redirect('/');
        }
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        return redirect('login')->with("error", "Invalid login credentials");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect('registration')->with("error", "Invalid registration. Try Again!");
        }
        return redirect('login')->with("success", "Registration successful. Login to access the app");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
