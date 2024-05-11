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
    public function Data()
    {
        $jadwal = Jadwal::all();
        $bus = Bus::all();
        $akun = User::all();
        $perjalanan = DataPerjalanan::all();

        // Array untuk melacak ID bus yang sudah diproses
        $processedBuses = [];

        foreach ($perjalanan as $dataperjalanan) {
            foreach ($bus as $databus) {
                foreach ($akun as $dataakun) {
                    if ($dataperjalanan->ID_Bus == $databus->ID_Bus && $databus->ID_Bus == $dataakun->ID_Bus) {
                        if (!in_array($databus->ID_Bus, $processedBuses)) {
                            Tugas::create([
                                'ID_Tugas' => 'TA' . rand(1, 1000),
                                'ID_Jadwal' => $dataperjalanan->ID_Jadwal,
                                'ID_Perjalanan' => $dataperjalanan->ID_Perjalanan,
                                'ID_Bus' => $dataperjalanan->ID_Bus,
                                // DATA SEAT
                                'Tanggal_dan_Waktu_Tugas_Dimulai' => $dataperjalanan->Tanggal,
                                // Tanggal Tugas Selesai
                                // ID_Laporan_Biaya_Perjalanan
                            ]);

                            // Tandai ID bus sebagai sudah diproses
                            $processedBuses[] = $databus->ID_Bus;
                        }
                    }
                }
            }
        }
    }

    public function index()
    {
        $tugas = Tugas::all();
    }
}
