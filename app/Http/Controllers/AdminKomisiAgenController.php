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

        $tanggal = PesananTicket::select('Tanggal_Pesanan')->distinct()->get();
        $options = [];
        foreach ($tanggal as $tgl) {
            // Cek apakah nilai Tanggal sudah ada di dalam array $options
            if (!in_array($tgl->Tanggal_Pesanan, $options)) {
                // Jika belum ada, tambahkan ke dalam array
                $options[] = $tgl->Tanggal_Pesanan;
            }
        }

        return view('admin.Komisi_Agen.KomisiAgen', [
            'komisi' => $komisi, 'komisiAgen' => $komisiAgen,
            'pesananTiket' => $pesanan, 'user' => $user, 'tanggal' => $options
        ]);
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

    public function SearchKomisi(Request $request)
    {
        $komisi = GajiKomisi::all();
        $pesanan = PesananTicket::all();
        $user = User::all();

        $tanggal = PesananTicket::select('Tanggal_Pesanan')->distinct()->get();
        $options = [];
        foreach ($tanggal as $tgl) {
            // Cek apakah nilai Tanggal sudah ada di dalam array $options
            if (!in_array($tgl->Tanggal_Pesanan, $options)) {
                // Jika belum ada, tambahkan ke dalam array
                $options[] = $tgl->Tanggal_Pesanan;
            }
        }

        if ($request->tanggal) {
            $komisiAgen = PesananTicket::join('komisi_agen', 'komisi_agen.ID_Pesanan', '=', 'pesanan_tiket.ID_Pesanan')
                ->where('Tanggal_Pesanan', 'LIKE', '%' . $request->tanggal . '%')->get();
        } else {
            $komisiAgen = KomisiAgen::all();
        }

        return view('admin.Komisi_Agen.KomisiAgen', [
            'komisi' => $komisi, 'komisiAgen' => $komisiAgen,
            'pesananTiket' => $pesanan, 'user' => $user, 'tanggal' => $options
        ]);
    }
}
