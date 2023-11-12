<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopirController extends Controller
{
    public function index() {
        return view("sopir.MainSopir");
    }
}
