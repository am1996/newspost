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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|required_with:confirm_password',
        ]);
        if(Auth::attempt($creds,true))
            return redirect("/")->with("message","Successfully logged in!");
        else
            return redirect("/login")->withErrors(['msg'=>"E-mail and password don't match"]);
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
        $user = User::find(Auth::user()->id);
        if(isset($request->name)){
            $field="Fullname";
            $request->validate([
                "name" => "required|regex:/^[a-z A-Z]+$/u"
            ]);
            $user->name = $request->name;
        }else if(isset($request->email)){
            $field="E-mail";
            $request->validate([
                "email" => 'required|email|unique:users',
            ]);
            $user->email = $request->email;
        }else if(isset($request->password)){
            $field="Password";
            $request->validate([
                'password' => 'required|min:8|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'required'
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect("/user")->with("message","Successfully Changed $field");
    }
}
