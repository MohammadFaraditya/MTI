<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\DataPerjalanan;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\Tugas;

class TugasController extends Controller
{
    public function DataTugas()
    {
        $tugas = Tugas::all();
        $users = User::join('jadwal', 'users.ID_Bus', '=', 'jadwal.ID_Bus')
            ->where('jadwal.ID_Jadwal', 'JLR2805246372')
            ->select('users.*')
            ->get();

        // Ambil data sopir dan kernet
        $sopirs = $users->filter(function ($user) {
            return strtolower($user->Role) == 'sopir';
        });
        $kernet = $users->first(function ($user) {
            return strtolower($user->Role) == 'kernet';
        });

        // Ambil sopir pertama dan kedua dari koleksi sopirs
        $sopir1 = $sopirs->first();
        $sopir2 = $sopirs->count() > 1 ? $sopirs->skip(1)->first() : null;

        $sopir_1 = '';
        $sopir_2 = '';
        $kernet_t = '';

        if (!$sopir1 || $sopir1->Status != 'Aktif') {
            $sopir_1 = null;
            $sopir_2 = $sopir2;
            $kernet_t = $kernet;
        } elseif (!$sopir2 || $sopir2->Status != 'Aktif') {
            $sopir_1 = $sopir1;
            $sopir_2 = null;
            $kernet_t = $kernet;
        } elseif (!$kernet || $kernet->Status != 'Aktif') {
            $sopir_1 = $sopir1;
            $sopir_2 = $sopir2;
            $kernet_t = null;
        } else {
            $sopir_1 = $sopir1;
            $sopir_2 = $sopir2;
            $kernet_t = $kernet;
        }

        // dd($sopir_1, $sopir_2, $kernet_t);
        return view('admin.DataTugas', ['DataTugas' => $tugas]);
    }
}
