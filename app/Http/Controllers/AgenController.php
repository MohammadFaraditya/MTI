<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgenController extends Controller
{
    public function index() {
        return view("agen.MainAgen");
    }
}
