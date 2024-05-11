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

            if (Auth::check()) {
                $role = strtolower($user->Role); // Merubah role menjadi huruf kecil
                $user = User::all();
                switch ($role) {
                    case 'admin':
                        return redirect('/admin');
                        break;
                    case 'agen':
                        return redirect('/agen');
                        break;
                    case 'sopir':
                        return redirect('/sopir');
                        break;
                    case 'kernet':
                        return redirect('/kernet');
                        break;
                    default:
                        return redirect('/'); // Atau lokasi default jika role tidak dikenali
                        break;
                }
            }
        } else {
            return view('login')->with('error', 'Login gagal. Username atau Password salah.');
        }
    }

    public function logout()
    {
        Auth::logout(); // This will log out the user
        return redirect('/login'); // Redirect to the login page after logout
    }
}
