<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GajiKomisi;
use App\Models\KomisiAgen;
use App\Models\PesananTicket;
use App\Models\User;
use Carbon\Carbon;

class AdminKomisiAgenController extends Controller
{
    public function index()
    {
        $komisi = GajiKomisi::all();
        $komisiAgen = KomisiAgen::all();
        $pesanan = PesananTicket::all();
        $user = User::all();
        return view('admin.Komisi_Agen.KomisiAgen', ['komisi' => $komisi, 'komisiAgen' => $komisiAgen, 'pesananTiket' => $pesanan, 'user' => $user]);
    }

    public function bayar($ID_Komisi)
    {
        $komisiAgen = KomisiAgen::findOrFail($ID_Komisi);
        $komisiAgen->Status_Pembayaran = "Sudah Dibayar";
        $komisiAgen->Tanggal_Pembayaran = Carbon::now();
        $komisiAgen->save();

        return redirect('admin/komisi-agen');
    }

    public function UbahKomisi(Request $request, $ID_GajiKomisi)
    {
        $komisi = GajiKomisi::findOrFail($ID_GajiKomisi);
        $komisi->Komisi_Agen = $request->komisi;
        $komisi->save();

        return redirect('admin/komisi-agen');
    }
}
