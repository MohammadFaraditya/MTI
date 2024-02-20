<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Jadwal;
use App\Models\Bus;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // ========================================= Function untuk rute =====================================
    public function index()
    {
        $DataRute = Rute::all();
        return view("admin.Rute.Rute", ['DataRute' => $DataRute]);
    }

    public function addRute()
    {
        return view("admin.Rute.FormAddRute");
    }

    public function StoreRute(Request $request)
    {
        $Rute = Rute::create($request->all());

        Alert::success("Berhasil Menambahkan Rute");
        return redirect('/admin');
    }

    public function EditRute(Request $request, $ID_Rute)

    {
        // dd($ID_Rute);
        $rute = Rute::find($ID_Rute);
        return view('admin.Rute.FormEditRute', ['DataeditRute' => $rute], ['ID' => $ID_Rute]);
    }

    public function update(Request $request, $ID_Rute)
    {


        $Rute = Rute::findOrFail($ID_Rute);

        $Rute->Kota_Keberangkatan = $request->Kota_Keberangkatan;
        $Rute->Kota_Tujuan = $request->Kota_Tujuan;
        $Rute->Lintasan_Keberangkatan = $request->Lintasan_Keberangkatan;
        $Rute->Lintasan_Tujuan = $request->Lintasan_Tujuan;
        $Rute->Jam_Keberangkatan = $request->Jam_Keberangkatan;
        $Rute->save();

        Alert::success("Berhasil Menambahkan Rute");

        return redirect('/admin');
    }

    public function destroy($ID_Rute)
    {
        $destroy = Rute::findOrFail($ID_Rute);
        $destroy->delete();

        return redirect('/admin');
    }


    // =============================================== Akhir function rute ====================


    // =============================================== Function Jadwal Perjalanan =============
    public function JadwalPerjalanan()
    {
        $Datajadwal = Jadwal::all();
        return view("admin.Jadwal.JadwalPerjalanan", ['DataJadwal' => $Datajadwal]);
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
                $dateRange[] = date('dmy', $startTimestamp); // Menggunakan 'dmy' untuk format ddmmYY
                $startTimestamp = strtotime('+1 day', $startTimestamp);
            }

            return $dateRange;
        }

        $range = generateDateRange($request->Tanggal_Awal, $request->Tanggal_Akhir);


        $dataJadwal = [];  // Inisialisasi array untuk menyimpan data


        for ($i = 0; $i < count($range); $i++) {
            $jadwal = "JLR" . $range[$i];
            $rute = $request->ID_Rute;
            $newDate = substr($range[$i], 0, 2) . '-' . substr($range[$i], 2, 2) . '-' . substr($range[$i], 4, 2);
            $tanggal = $newDate;
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

    // ================================ Akhir Function Jadwal Perjalanan ========================

    public function DataPerjalanan()
    {
        return view("admin.DataPerjalanan");
    }

    public function LaporanOperasional()
    {
        return view("admin.LaporanOperasional");
    }

    public function DataTugas()
    {
        return view("admin.DataTugas");
    }

    public function Bus()
    {
        return view("admin.Bus");
    }

    public function Sopir()
    {
        return view("admin.Sopir");
    }

    public function Kernet()
    {
        return view("admin.Kernet");
    }

    public function Agen()
    {
        return view("admin.Agen");
    }

    public function Gaji()
    {
        return view("admin.Gaji");
    }

    public function KomisiAgen()
    {
        return view("admin.KomisiAgen");
    }
}
