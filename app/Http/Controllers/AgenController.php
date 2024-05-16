<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rute;
use App\Models\Jadwal;
use App\Models\LintasanKeberangkatan;
use App\Models\Seat;
use App\Models\LintasanTujuan;

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

                $agen = str_replace("Agen", "", $user->Username);

                $jamkeberangkatan = LintasanKeberangkatan::join('rute', 'lintasan_keberangkatan.ID_Rute', '=', 'rute.ID_Rute')
                    ->where('lintasan_keberangkatan.Nama_Lintasan', 'like', '%' . $agen . '%')
                    ->select('lintasan_keberangkatan.Jam_Keberangkatan') // Memberikan alias untuk kolom Jam_Keberangkatan
                    ->first();


                return view('Agen.JadwalAgen', ['rute' => $rute, 'jadwal' => $jadwal, 'user_nama' => $nama_user, 'DataJadwal' => $DataJadwal, 'jamkeberangkatan' => $jamkeberangkatan],);
            }
        } else {
            // Handle jika pengguna belum login
            return redirect()->route('login');
        }
    }

    public function viewBooking(Request $request, $ID_Jadwal)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $DataJadwal = Jadwal::findOrFail($ID_Jadwal);
            $Rute = rute::all();
            $seat = Seat::where('ID_Jadwal', $ID_Jadwal)->get();
            return view('Agen.BookingTicket', [
                'user_nama' => $nama_user, 'DataJadwal' => $DataJadwal, 'Rute' => $Rute,
                'seat' => $seat
            ]);
        }
    }
}
