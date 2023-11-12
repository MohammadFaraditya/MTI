<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);

        // $userdata = [
        //     'username' => $request->username,
        //     'password' => $request->password
        // ];

        // Get the user from the database
        $user = User::where('Username', '=', $request->username)->first();

        
        if ($user && Hash::check($request->password, $user->Password)) {
            Auth::login($user);
            // dd(Hash::check($request->password, $user->Password), Auth::login($user), Auth::check());
            if(Auth::check()) {
                return redirect('/admin');
                // return "Success";
            }
            
        }else {
            Session::flash('status', 'error');
            Session::flash('message', 'Username atau Password salah.');
            return redirect('/login');
            // return "Fail";
        }

        // If the user exists and the password is correct, log them in
        // if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/admin');
        // } else {
        //     Session::flash('status', 'error');
        //     Session::flash('message', 'Username atau Password salah.');
        //     return redirect('/login');
        // }

        

    }
}