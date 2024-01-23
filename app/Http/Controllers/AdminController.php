<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;
use App\Models\Rute;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    // Function untuk rute
    public function index()
    {
        $DataRute = Rute::all();
        return view("admin.Rute.Rute", ['DataRute' => $DataRute]);
    }

    public function addRute()
    {
        return view("admin.Rute.FormAddRute");
    }

    public function StoreRute(Request $request)
    {
        $Rute = Rute::create($request->all());

        Alert::success("Berhasil Menambahkan Rute");
        return redirect('/admin');
    }

    public function EditRute(Request $request, $ID_Rute)

    {
        // dd($ID_Rute);
        $rute = Rute::find($ID_Rute);
        return view('admin.Rute.FormEditRute', ['DataeditRute' => $rute], ['ID' => $ID_Rute]);
    }

    public function update(Request $request, $ID_Rute)
    {


        $Rute = Rute::findOrFail($ID_Rute);

        $Rute->Kota_Keberangkatan = $request->Kota_Keberangkatan;
        $Rute->Kota_Tujuan = $request->Kota_Tujuan;
        $Rute->Lintasan_Keberangkatan = $request->Lintasan_Keberangkatan;
        $Rute->Lintasan_Tujuan = $request->Lintasan_Tujuan;
        $Rute->Jam_Keberangkatan = $request->Jam_Keberangkatan;
        $Rute->save();

        Alert::success("Berhasil Menambahkan Rute");

        return redirect('/admin');
    }


    // Akhir function rute

    public function JadwalPerjalanan()
    {
        return view("admin.JadwalPerjalanan");
    }

    public function DataPerjalanan()
    {
        return view("admin.DataPerjalanan");
    }

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
