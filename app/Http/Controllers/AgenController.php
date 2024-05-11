<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rute;
use App\Models\Jadwal;

class AgenController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $rute = Rute::all();
            $jadwal = Jadwal::all();
            $DataJadwal = null;
            return view('Agen.JadwalAgen', ['rute' => $rute, 'jadwal' => $jadwal, 'user_nama' => $nama_user, 'DataJadwal' => $DataJadwal]);
        } else {
            // Handle jika pengguna belum login
            return redirect()->route('login');
        }
    }

    public function cariJadwal(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $rute = Rute::all();
            $jadwal = Jadwal::all();

            // Ambil semua tanggal yang unik dari tabel Jadwal
            $tanggal = Jadwal::select('Tanggal')->distinct()->get();

            $options = [];
            foreach ($tanggal as $tgl) {
                // Cek apakah nilai Tanggal sudah ada di dalam array $options
                if (!in_array($tgl->Tanggal, $options)) {
                    // Jika belum ada, tambahkan ke dalam array
                    $options[] = $tgl->Tanggal;
                }
            }

            // Jika terdapat tanggal dan kota tujuan yang dipilih
            if ($request->tanggal && $request->Tujuan) {
                $DataJadwal = Jadwal::join('rute', 'jadwal.ID_Rute', '=', 'rute.ID_Rute')
                    ->where('jadwal.Tanggal', $request->tanggal)
                    ->where('rute.Kota_Tujuan', $request->Tujuan)
                    ->get();
                return view('Agen.JadwalAgen', ['rute' => $rute, 'jadwal' => $jadwal, 'user_nama' => $nama_user, 'DataJadwal' => $DataJadwal]);
            } else {
                // Jika tidak ada tanggal atau kota tujuan yang dipilih, ambil semua data jadwal
                $DataJadwal = Jadwal::all();
                return view('Agen.JadwalAgen', ['rute' => $rute, 'jadwal' => $jadwal, 'user_nama' => $nama_user, 'DataJadwal' => $DataJadwal]);
            }


            // foreach ($rute as $datarute) {
            //     if ($request->Tujuan == $datarute->Kota_Tujuan && $request->tanggal) {
            //         // $DataJadwal = Jadwal::where('Tanggal', 'LIKE', '%' . $request->tanggal . '%')
            //         //     ->where('Tujuan', $request->Tujuan)
            //         //     ->get();
            //         dd('HOLA');
            //         return view('Agen.JadwalAgen', ['rute' => $rute, 'jadwal' => $jadwal, 'user_nama' => $nama_user, 'DataJadwal' => $DataJadwal]);
            //     } else {
            //         dd('cok');
            //     }
            // }
        } else {
            // Handle jika pengguna belum login
            return redirect()->route('login');
        }
    }
}
