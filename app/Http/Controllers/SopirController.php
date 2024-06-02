<?php

namespace App\Http\Controllers;

use App\Models\LintasanKeberangkatan;
use App\Models\LintasanTujuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Jadwal;
use App\Models\Rute;
use App\Models\Gaji;
use Illuminate\Support\Facades\Auth;

class SopirController extends Controller
{
    public function TugasSopir()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id_akun = $user->ID_Akun;
            $today = Carbon::now()->format('Y-m-d');
            $tugas = Tugas::where(function ($query) use ($id_akun) {
                $query->where('Sopir_1', 'like', $id_akun . '%')
                    ->orWhere('Sopir_2', 'like', $id_akun . '%');
            })
                ->whereDate('Tanggal_dan_Waktu_Tugas_Dimulai', $today)
                ->where('Tanggal_dan_Waktu_Tugas_Berakhir', null)
                ->get();

            if ($tugas->isEmpty()) {
                return view('sopir.TugasSopir', [
                    'dataUser' => $user, 'dataTugas' => null,
                    'dataRute' => null,
                    'lintasanKeberangkatan' => null,
                    'lintasanTujuan' => null
                ]);
            }

            $id_tugas = $tugas->first()->ID_Jadwal;

            $jadwal = Jadwal::findOrFail($id_tugas);
            $rute = Rute::findOrFail($jadwal->ID_Rute);
            $lintasan_keberangkatan = LintasanKeberangkatan::where('ID_Rute', $rute->ID_Rute)->get();
            $lintasan_tujuan = LintasanTujuan::where('ID_Rute', $rute->ID_Rute)->get();

            return view('sopir.TugasSopir', [
                'dataUser' => $user,
                'dataTugas' => $tugas,
                'dataRute' => $rute,
                'lintasanKeberangkatan' => $lintasan_keberangkatan,
                'lintasanTujuan' => $lintasan_tujuan
            ]);
        }

        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    public function ShowTambahTugas()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $tugas = Tugas::where('Sopir_1', null)
                ->orWhere('Sopir_2', null)
                ->get();

            return view('sopir.TambahTugas', ['user' => $user, 'tugas' => $tugas]);
        }
    }

    public function TambahTugas($ID_Tugas)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $tugas = Tugas::findOrFail($ID_Tugas);

            if (is_null($tugas->Sopir_1)) {
                $tugas->Sopir_1 = $user->ID_Akun . '-' . $user->Nama;
                $tugas->save();
                return redirect(route('TugasSopir'));
            } elseif (is_null($tugas->Sopir_2)) {
                $tugas->Sopir_2 = $user->ID_Akun . '-' . $user->Nama;
                $tugas->save();
                return redirect(route('TugasSopir'));
            }
        }
    }

    public function ShowPendapatan()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $gaji = Gaji::where('ID_Akun', $user->ID_Akun)->get();
            $tugas = Tugas::all();
            $tanggalTugas = Tugas::where('Sopir_1', 'LIKE', $user->ID_Akun . '-%')
                ->orWhere('Sopir_2', 'LIKE', $user->ID_Akun . '-%')
                ->get();


            return view('kernet.PendapatanKernet', ['GajiKernet' => $gaji, 'DataTugas' => $tugas, 'Tanggal' => $tanggalTugas]);
        }
    }

    public function SearchPendapatan(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $gaji = Gaji::join('tugas', 'gaji.ID_Tugas', '=', 'tugas.ID_Tugas')
                ->whereDate('tugas.Tanggal_dan_Waktu_Tugas_Dimulai', '=', $request->tanggal)
                ->where('tugas.Kernet', 'LIKE', $user->ID_Akun . '-%')
                ->where('gaji.ID_Akun', $user->ID_Akun)
                ->select('gaji.*')
                ->get();

            $tugas = Tugas::all();
            $tanggalTugas = Tugas::where('Sopir_1', 'LIKE', $user->ID_Akun . '-%')
                ->orWhere('Sopir_2', 'LIKE', $user->ID_Akun . '-%')
                ->get();

            return view('kernet.PendapatanKernet', ['GajiKernet' => $gaji, 'DataTugas' => $tugas, 'Tanggal' => $tanggalTugas]);
        }
    }
}
