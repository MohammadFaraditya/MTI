<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use RealRashid\SweetAlert\Facades\Alert;

class RuteController extends Controller
{
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

    public function destroy($ID_Rute)
    {
        $destroy = Rute::findOrFail($ID_Rute);
        $destroy->delete();

        return redirect('/admin');
    }
}
