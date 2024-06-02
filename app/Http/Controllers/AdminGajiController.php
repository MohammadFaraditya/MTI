<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GajiKomisi;
use App\Models\Gaji;
use App\Models\Tugas;
use Carbon\Carbon;

class AdminGajiController extends Controller
{
    public function index()
    {
        $komisiGaji = GajiKomisi::all();
        $gaji = Gaji::all();
        $tugas = Tugas::all();

        $tanggal = Tugas::select('Tanggal_dan_Waktu_Tugas_Dimulai')->distinct()->get();
        $options = [];
        foreach ($tanggal as $tgl) {
            // Cek apakah nilai Tanggal sudah ada di dalam array $options
            if (!in_array($tgl->Tanggal_dan_Waktu_Tugas_Dimulai, $options)) {
                // Jika belum ada, tambahkan ke dalam array
                $options[] = $tgl->Tanggal_dan_Waktu_Tugas_Dimulai;
            }
        }

        return view('admin.Gaji.Gaji', ['komisiGaji' => $komisiGaji, 'tanggal' => $options, 'gaji' => $gaji, 'DataTugas' => $tugas]);
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

    public function SearchGaji(Request $request)
    {
        $komisiGaji = GajiKomisi::all();
        $tugas = Tugas::all();

        $tanggal = Tugas::select('Tanggal_dan_Waktu_Tugas_Dimulai')->distinct()->get();
        $options = [];
        foreach ($tanggal as $tgl) {
            // Cek apakah nilai Tanggal sudah ada di dalam array $options
            if (!in_array($tgl->Tanggal_dan_Waktu_Tugas_Dimulai, $options)) {
                // Jika belum ada, tambahkan ke dalam array
                $options[] = $tgl->Tanggal_dan_Waktu_Tugas_Dimulai;
            }
        }

        if ($request->tanggal) {
            $gaji = Tugas::join('Gaji', 'tugas.ID_Tugas', '=', 'gaji.ID_Tugas')
                ->where('Tanggal_dan_Waktu_Tugas_Dimulai', 'LIKE', '%' . $request->tanggal . '%')->get();
        } else {
            $gaji = Gaji::all();
        }

        return view('admin.Gaji.Gaji', ['komisiGaji' => $komisiGaji, 'tanggal' => $options, 'gaji' => $gaji, 'DataTugas' => $tugas]);
    }
}
