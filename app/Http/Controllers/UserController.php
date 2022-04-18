<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        return view('user.login');
    }
    public function loginUser(Request $request){
        $creds = $request->only(["email","password"]);
        if(Auth::attempt($creds,true))
            return redirect("/")->with("message","Successfully logged in!");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|regex:/^[a-z A-Z]+$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'
        ]);
        $creds = $request->only(['name','email','password','retype_password']);
        $user = new User();
        $user->password = Hash::make($creds["password"]);
        $user->email = $creds["email"];
        $user->name = $creds["name"];
        $user->save();
        return redirect("/login")->with('message',"Successfully registered Please login!");
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect("/login");
    }
    public function register(Request $request){
        return view('user.register');
    }
    public function dashboard(Request $request){
        return view("user.user");
    }
    public function edit(Request $request){
        $field = null;
        return redirect("/dashboard")->with("message","Successfully Changed $field");
    }
}
