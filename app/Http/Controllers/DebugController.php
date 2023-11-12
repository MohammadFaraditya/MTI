<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    public function index(){
        $user = Akun::all();
        dd($user);
    }
}
