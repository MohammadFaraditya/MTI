<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Rute;
use App\Models\DataPerjalanan;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class DataPerjalananController extends Controller
{
    public function DataPerjalanan()
    {
        $dataperjalanan = DataPerjalanan::all();

        return view("admin.Data_Perjalanan.DataPerjalanan", ['DataPerjalanan' => $dataperjalanan]);
    }

    // public function CekHari()
    // {
    //     $hariIni = Carbon::now();
    //     $hariIni->setTimezone('Asia/Jakarta');

    //     $today = $hariIni->format('Y-m-d');
    //     $jam = Carbon::parse($hariIni)->format('H:i');

    //     $id = Carbon::now()->format('mdy');

    //     $Jadwal = Jadwal::all();

    //     foreach ($Jadwal as $jadwal) {
    //         $Jam_Keberangkatan = Carbon::parse($jadwal->Jam_Keberangkatan)->subMinutes(15);
    //         $Jam_Close = Carbon::parse($Jam_Keberangkatan)->format('H:i');
    //         $Tanggal_Keberangkatan = $jadwal->Tanggal;

    //         if ($Tanggal_Keberangkatan == $today && $Jam_Close == $jam) {
    //             DataPerjalanan::create([
    //                 'ID_Perjalanan' => "DA" . $id . rand(1, 100) . rand(1, 10),
    //                 'Tanggal' => $jadwal->Tanggal,
    //                 'ID_Jadwal' => $jadwal->ID_Jadwal,
    //                 'Jumlah_Tiket_Yang_Terjual' => $jadwal->Seat_Terisi,
    //                 'Jumlah_Sisa_Tiket' => $jadwal->Jumlah_Seat - $jadwal->Seat_Terisi,
    //                 'ID_Bus' => $jadwal->ID_Bus,
    //                 'ID_Rute' => $jadwal->ID_Rute
    //             ]);
    //         } else {
    //             echo "false";
    //         }
    //     }
    // }

    public function EditDataPerjalanan($ID_DataPerjalanan)
    {
        $DataPerjalanan = DataPerjalanan::findOrFail($ID_DataPerjalanan);
        $DataPerjalanan->all();

        $bus = Bus::all();
        $rute = Rute::all();

        return view('admin.Data_Perjalanan.FormEditDataPerjalanan', ['DataPerjalanan' => $DataPerjalanan, 'bus' => $bus, 'rute' => $rute]);
    }

    public function UpdateDataPerjalanan(Request $request, $ID_Perjalanan)
    {
        $perjalanan = DataPerjalanan::findOrFail($ID_Perjalanan);
        $perjalanan->Tanggal = $request->Tanggal;
        $perjalanan->Jumlah_Tiket_Yang_Terjual = $request->Jumlah_Tiket_Terjual;
        $perjalanan->Jumlah_Sisa_Tiket = $request->Sisa_Tiket;
        $perjalanan->ID_Bus = $request->ID_Bus;
        $perjalanan->ID_Rute = $request->ID_Rute;
        $perjalanan->save();

        Alert::success("Berhasil Update Data");
        return redirect('/admin/data-perjalanan');
    }

    public function DeleteDataPerjalanan($ID_Perjalanan)
    {
        $perjalanan = DataPerjalanan::findOrFail($ID_Perjalanan);
        $perjalanan->delete();

        Alert::success('Berhasil Menghapus Data');
        return redirect('admin/data-perjalanan');
    }
}
