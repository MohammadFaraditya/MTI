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

    public function Sopir()
    {
        return view("admin.Sopir");
    }

    public function Kernet()
    {
        return view("admin.Kernet");
    }

    public function Agen()
    {
        return view("admin.Agen");
    }

    public function Gaji()
    {
        return view("admin.Gaji");
    }

    public function KomisiAgen()
    {
        return view("admin.KomisiAgen");
    }
}
