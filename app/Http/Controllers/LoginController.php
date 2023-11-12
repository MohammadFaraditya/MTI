<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        

        // Get the user from the database
        $user = User::where('Username', '=', $request->username)->first();

        
        if ($user && Hash::check($request->password, $user->Password)) {
            Auth::login($user);
            // dd(Hash::check($request->password, $user->Password), Auth::login($user), Auth::check());
            if(Auth::check()) {
            
                if($user->Role == 'admin'){
                    return redirect('/admin');
                }else if($user->Role == 'agen'){
                    return redirect('/agen');
                }else if($user->Role == 'sopir'){
                    return redirect('/sopir');
                }else if($user->Role == 'kernet'){
                    return redirect('/kernet');
                }
            }
            
        }else {
            Session::flash('status', 'error');
            Session::flash('message', 'Username atau Password salah.');
            return redirect('/login');
            // return "Fail";
        }

    }
    public function logout()
    {
        Auth::logout(); // This will log out the user
        return redirect('/login'); // Redirect to the login page after logout
    }
    
}