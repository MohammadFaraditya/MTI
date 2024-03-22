<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GajiKomisi;
use App\Models\Gaji;
use Carbon\Carbon;

class AdminGajiController extends Controller
{
    public function index()
    {
        $komisiGaji = GajiKomisi::all();
        $gaji = Gaji::all();
        return view('admin.Gaji.Gaji', ['komisiGaji' => $komisiGaji, 'gaji' => $gaji]);
    }

    public function bayar($ID_Gaji)
    {
        $gaji = Gaji::findOrFail($ID_Gaji);
        $gaji->Status_Pembayaran = "Sudah Dibayar";
        $gaji->Tanggal_Pembayaran = Carbon::now();
        $gaji->save();

        return redirect('admin/gaji');
    }

    public function UbahGajiSopir(Request $request, $ID_Gaji)
    {

        $gajiSopir = GajiKomisi::findOrFail($ID_Gaji);
        $gajiSopir->Gaji_Sopir = $request->Gaji_Sopir;
        $gajiSopir->save();

        return redirect('admin/gaji');
    }

    public function UbahGajiKernet(Request $request, $ID_Gaji)
    {

        $gajiKernet = GajiKomisi::findOrFail($ID_Gaji);
        $gajiKernet->Gaji_Kernet = $request->Gaji_Kernet;
        $gajiKernet->save();

        return redirect('admin/gaji');
    }
}
