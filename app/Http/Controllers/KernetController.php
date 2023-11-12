<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KernetController extends Controller
{
    public function index() {
        return view("kernet.MainKernet");
    }
}
