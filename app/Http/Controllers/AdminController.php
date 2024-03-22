<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Jadwal;
use App\Models\Bus;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function LaporanOperasional()
    {
        return view("admin.LaporanOperasional");
    }

    public function DataTugas()
    {
        return view("admin.DataTugas");
    }

    public function Bus()
    {
        return view("admin.Bus");
    }
}
