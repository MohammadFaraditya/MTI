<?php

namespace App\Http\Controllers;

use App\Models\LaporanOperasional;
use App\Models\Tugas;
use Illuminate\Http\Request;

class LaporanOperasionalController extends Controller
{
    public function ShowLaporan()
    {
        $laporan = LaporanOperasional::all();
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
        return view('admin.LaporanOperasional', ['LaporanOperasional' => $laporan, 'tanggal' => $options, 'DataTugas' => $tugas]);
    }

    // LaporanOperasionalController
    public function ShowLaporanRincian($ID_Laporan)
    {
        $rincian = LaporanOperasional::findOrFail($ID_Laporan);

        // Convert $rincian to an array
        $rincianArray = $rincian->toArray();

        // Replace the ID_Laporan_Operasional value with the accessor value
        $rincianArray['ID_Laporan_Operasional'] = $rincian->getIDLaporanOperasionalAttribute();

        // Return the modified array as JSON
        return response()->json($rincianArray);
    }

    public function SearchLaporan(Request $request)
    {
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
            $laporan = Tugas::join('laporan_operasional', 'tugas.ID_Tugas', '=', 'laporan_operasional.ID_Tugas')
                ->where('Tanggal_dan_Waktu_Tugas_Dimulai', 'LIKE', '%' . $request->tanggal . '%')->get();
        } else {
            $laporan = LaporanOperasional::all();
        }

        return view('admin.LaporanOperasional', ['LaporanOperasional' => $laporan, 'tanggal' => $options, 'DataTugas' => $tugas]);
    }
}
