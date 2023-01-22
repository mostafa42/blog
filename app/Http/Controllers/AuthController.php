<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login(Login $request)
    {
        $credentials = $request->only('email' , 'password');

        if(Auth::attempt($credentials)){
            return redirect('dashboard/user');
        }else{
            return redirect()->back()->withErrors(['errors' =>'invalid credentials']);
        }
    }

    public function create_account()
    {
        return view('new_account');
    }

    public function signUp(Register $request)
    {
        User::create([
            "name" => $request->name ,
            "email" => $request->email ,
            "password" => Hash::make($request->password)
        ]) ;

        return redirect("/")->with('message', 'registered successfully please login now');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
