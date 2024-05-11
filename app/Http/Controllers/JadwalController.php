<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Rute;
use App\Models\Jadwal;
use App\Models\DataPerjalanan;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function JadwalPerjalanan()
    {

        $Datajadwal = Jadwal::all();
        $tanggal = Jadwal::select('Tanggal')->distinct()->get();

        $options = [];
        foreach ($tanggal as $tgl) {
            // Cek apakah nilai Tanggal sudah ada di dalam array $options
            if (!in_array($tgl->Tanggal, $options)) {
                // Jika belum ada, tambahkan ke dalam array
                $options[] = $tgl->Tanggal;
            }
        }
        return view("admin.Jadwal.JadwalPerjalanan", ['DataJadwal' => $Datajadwal, 'tanggal' => $options]);
    }



    public function addJadwalPerjalanan()
    {
        $rute = Rute::all();
        $bus = Bus::all();
        return view("admin.Jadwal.FormAddJadwal", ['rute' => $rute], ['bus' => $bus]);
    }

    public function storeJadwal(Request $request)
    {
        function generateDateRange($startDate, $endDate)
        {
            $startTimestamp = strtotime($startDate);
            $endTimestamp = strtotime($endDate);

            $dateRange = [];

            while ($startTimestamp <= $endTimestamp) {
                $dateRange[] = date('Ymd', $startTimestamp); // Menggunakan 'dmy' untuk format ddmmYY
                $startTimestamp = strtotime('+1 day', $startTimestamp);
            }

            return $dateRange;
        }

        if ($request->Tanggal_Awal == $request->Tanggal_Akhir) {
            $jadwal = Carbon::parse($request->Tanggal_Awal)->format('dmy');
            $bus = Bus::findOrFail($request->ID_Bus);
            Jadwal::create([
                'ID_Jadwal' => "JLR" . $jadwal . rand(1, 10) + 1,
                'ID_Rute' => $request->ID_Rute,
                'Tanggal' => $request->Tanggal_Awal,
                'ID_Bus' => $request->ID_Bus,
                'Seat_Terisi' => 0,
                'Jumlah_Seat' => $bus->Jumlah_Seat,
                'Jam_Keberangkatan' => $request->Jam_Keberangkatan,
                'Kelas_Bus' => $request->Kelas_Bus,
                'Harga' => $request->Harga
            ]);
        } else {
            $range = generateDateRange($request->Tanggal_Awal, $request->Tanggal_Akhir);
            $dataJadwal = [];  // Inisialisasi array untuk menyimpan data


            for ($i = 0; $i < count($range); $i++) {
                $rawJadwal = Carbon::parse($range[$i])->format('dmy');
                $jadwal = "JLR" . $rawJadwal . rand(1, 10);
                $rute = $request->ID_Rute;
                $carbonDate = Carbon::createFromFormat('Ymd', $range[$i]);
                $formattedDate = $carbonDate->format('Y-m-d');
                $tanggal = $formattedDate;
                $bus = $request->ID_Bus;
                $seat_terisi = 0;
                $seat = $request->Jumlah_Seat;
                $kelas = $request->Kelas_Bus;
                $jam_keberangkatan = $request->Jam_Keberangkatan;
                $harga = $request->Harga;
                // Simpan set data ke dalam array
                $dataJadwal[] = [
                    'ID_Jadwal' => $jadwal,
                    'ID_Rute' => $rute,
                    'Tanggal' => $tanggal,
                    'ID_Bus' => $bus,
                    'Seat_Terisi' => $seat_terisi,
                    'Jumlah_Seat' => $seat,
                    'Kelas_Bus' => $kelas,
                    'Jam_Keberangkatan' => $jam_keberangkatan,
                    'Harga' => $harga,
                ];
            }

            foreach ($dataJadwal as $data) {
                Jadwal::create($data);
            }
        }



        return redirect("/admin/jadwal-perjalanan");
    }


    public function EditJadwal($ID_Jadwal)
    {

        $jadwal = Jadwal::find($ID_Jadwal);
        $rute = Rute::all();
        $bus = Bus::all();
        return view('admin.Jadwal.FormEditJadwal', ['jadwal' => $jadwal, 'rute' => $rute, 'bus' => $bus]);
    }

    public function updateJadwal(Request $request, $ID_Jadwal)
    {
        $jadwal = Jadwal::findOrFail($ID_Jadwal);
        $jadwal->ID_Rute = $request->ID_Rute;
        $jadwal->Tanggal = $request->Tanggal_Keberangkatan;
        $jadwal->ID_Bus = $request->ID_Bus;
        $jadwal->Jumlah_Seat = $request->Jumlah_Seat;
        $jadwal->Kelas_Bus = $request->Kelas_Bus;
        $jadwal->Jam_Keberangkatan = $request->Jam_Keberangkatan;
        $jadwal->Harga = $request->Harga;
        $jadwal->save();

        Alert::success("Berhasil Menyimpan Jadwal");
        return redirect('admin/jadwal-perjalanan');
    }

    public function deleteJadwal($ID_Jadwal)
    {
        $jadwal = Jadwal::findOrFail($ID_Jadwal);
        $jadwal->delete();

        Alert::success("Berhasil Menghapus Jadwal");
        return redirect('admin/jadwal-perjalanan');
    }

    public function search(Request $request)
    {
        $tanggal = Jadwal::select('Tanggal')->distinct()->get();

        $options = [];
        foreach ($tanggal as $tgl) {
            // Cek apakah nilai Tanggal sudah ada di dalam array $options
            if (!in_array($tgl->Tanggal, $options)) {
                // Jika belum ada, tambahkan ke dalam array
                $options[] = $tgl->Tanggal;
            }
        }

        if ($request->tanggal) {
            $DataJadwal = Jadwal::where('Tanggal', 'LIKE', '%' . $request->tanggal . '%')->get();
        } else {
            $DataJadwal = Jadwal::all();
        }

        return view("admin.Jadwal.JadwalPerjalanan", ['DataJadwal' => $DataJadwal, 'tanggal' => $options]);
    }
}
