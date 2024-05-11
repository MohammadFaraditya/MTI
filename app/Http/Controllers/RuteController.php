<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\LintasanKeberangkatan;
use App\Models\LintasanTujuan;
use RealRashid\SweetAlert\Facades\Alert;
use DateTime;

class RuteController extends Controller
{
    public function index()
    {

        $DataRute = Rute::all();
        $keberangkatan = LintasanKeberangkatan::all();
        $tujuan = LintasanTujuan::all();

        // $hasil = [];
        // foreach ($DataRute as $datarute) {
        //     foreach ($keberangkatan as $datakeberangkatan) {
        //         if ($datarute->ID_Rute == $datakeberangkatan->ID_Rute) {
        //             $hasil[] = [$datakeberangkatan->Lintasan][$datakeberangkatan->Nama_Lintasan]    ;
        //         }
        //     }
        // }

        // ksort($hasil);
        // dd($hasil);


        return view("admin.Rute.Rute", ['DataRute' => $DataRute, 'Keberangkatan' => $keberangkatan, 'Tujuan' => $tujuan]);
    }

    public function addRute()
    {
        return view("admin.Rute.FormAddRute");
    }

    public function StoreRute(Request $request)
    {
        Rute::create([
            'ID_Rute' => $request->ID_Rute,
            'Kota_Keberangkatan' => $request->Kota_Keberangkatan,
            'Kota_Tujuan' => $request->Kota_Tujuan,
            'Jam_Keberangkatan' => $request->Jam_Keberangkatan,
            'Jam_Kedatangan' => $request->Jam_Kedatangan
        ]);

        $lintasankeberangkatan = $request->lintasankeberangkatan;
        $jamKeberangkatan = strtotime($request->Jam_Keberangkatan); // Mengonversi string ke waktu UNIX

        $lintasankeberangkatan = $request->lintasankeberangkatan;
        $jamKeberangkatan = new DateTime($request->Jam_Keberangkatan);

        foreach ($lintasankeberangkatan as $index => $lintasan) {
            $lintasanText = "lintasan-" . ($index + 1);

            // Tambahkan waktu 15 menit mulai dari data kedua
            if ($index > 0) {
                $jamKeberangkatan->modify('+15 minutes');
            }

            LintasanKeberangkatan::create([
                'ID_Lintasan' => rand(1, 1000),
                'ID_Rute' => $request->ID_Rute,
                'Lintasan' => $lintasanText,
                'Nama_Lintasan' => $lintasan,
                'Jam_Keberangkatan' => $jamKeberangkatan->format('H:i'), // Format waktu ke HH:mm
            ]);
        }



        $lintasantujuan = $request->lintasantujuan;
        $jamKedatangan = new DateTime($request->Jam_Kedatangan);

        // Mulai dari indeks terakhir dan mundur ke indeks pertama
        for ($i = count($lintasantujuan) - 1; $i >= 0; $i--) {
            $lintasanText = "lintasan-" . ($i + 1);

            // Kurangi waktu 15 menit setiap kali iterasi (kecuali untuk data pertama)
            if ($i < count($lintasantujuan) - 1) {
                $jamKedatangan->modify('-15 minutes');
            }

            LintasanTujuan::create([
                'ID_Lintasan' => rand(1, 1000),
                'ID_Rute' => $request->ID_Rute,
                'Lintasan' => $lintasanText,
                'Nama_Lintasan' => $lintasantujuan[$i],
                'Jam_Kedatangan' => $jamKedatangan->format('H:i'), // Format waktu ke HH:mm
            ]);
        }


        Alert::success("Berhasil Menambahkan Rute");
        return redirect('/admin');
    }



    public function EditRute(Request $request, $ID_Rute)

    {
        // dd($ID_Rute);
        $rute = Rute::find($ID_Rute);
        $keberangkatan = LintasanKeberangkatan::all();
        $tujuan = LintasanTujuan::all();
        return view('admin.Rute.FormEditRute', [
            'DataeditRute' => $rute, 'ID' => $ID_Rute, 'LintasanKeberangkatan' => $keberangkatan,
            'LintasanTujuan' => $tujuan
        ]);
    }

    public function update(Request $request, $ID_Rute)
    {

        // Update Lintasan Keberangkatan
        $inputKeberangkatan = $request->all();
        $nilaiKeberangkatan = [];

        // Mengambil Nilai ID lintasan & Nama Lintasan
        foreach ($inputKeberangkatan as $key => $value) {
            if (strpos($key, 'keberangkatan') === 0) {
                // Menghilangkan bagian "keberangkatan" dari kunci
                $kunciTanpaKata = str_replace('keberangkatan', '', $key);

                // Menambahkan ke array hasil dengan kunci yang telah diubah
                $nilaiKeberangkatan[$kunciTanpaKata] = $value;
            }
        }

        // Update Lintasan Keberangkatan Jika tidak ada input data tambahan
        if (!$request->keberangkatan) {
            foreach ($nilaiKeberangkatan as $key => $value) {
                if ($value === null) {
                    $keberangkatan = LintasanKeberangkatan::findOrFail($key);
                    $keberangkatan->delete();
                } else {
                    // Hanya perbarui data jika elemen dengan ID unik tersebut masih ada di formulir
                    if ($request->has("keberangkatan[$key]")) {
                        $keberangkatan = LintasanKeberangkatan::findOrFail($key);
                        $keberangkatan->Nama_Lintasan = $value;
                        $keberangkatan->Jam_Keberangkatan = $request->Jam_Keberangkatan;
                        $keberangkatan->save();
                    }
                }
            }
        } else {
            //Update Data Lintasan Keberangkatan Tambahan
            foreach ($request->keberangkatan as $key => $value) {
                LintasanKeberangkatan::create([
                    'ID_Lintasan' => rand(1, 1000),
                    'ID_Rute' => $request->ID_Rute,
                    'Lintasan' => 'lintasan-' . $key + 1,
                    'Nama_Lintasan' => $value
                ]);
            }
        }

        // Update Lintasan Tujuan
        $inputTujuan = $request->all();
        $nilaiTujuan = [];

        // Mengambil Nilai ID lintasan & Nama Lintasan
        foreach ($inputTujuan as $key => $value) {
            if (strpos($key, 'tujuan') === 0) {
                // Menghilangkan bagian "keberangkatan" dari kunci
                $kunciTanpaKata = str_replace('tujuan', '', $key);

                // Menambahkan ke array hasil dengan kunci yang telah diubah
                $nilaiTujuan[$kunciTanpaKata] = $value;
            }
        }
        if (!$request->tujuan) {
            foreach ($nilaiTujuan as $key => $value) {
                if ($key && $value === null) {
                    $tujuan = LintasanTujuan::findOrFail($key);
                    $tujuan->delete();
                } else {
                    $tujuan = LintasanTujuan::findOrFail($key);
                    $tujuan->Nama_Lintasan = $value;
                    $tujuan->save();
                }
            }
        } else {
            //Update Data Lintasan Keberangkatan Tambahan
            foreach ($request->tujuan as $key => $value) {
                LintasanTujuan::create([
                    'ID_Lintasan' => rand(1, 1000),
                    'ID_Rute' => $request->ID_Rute,
                    'Lintasan' => 'lintasan-' . $key + 1,
                    'Nama_Lintasan' => $value
                ]);
            }
        }

        $rute = Rute::findOrFail($ID_Rute);
        $rute->Kota_Keberangkatan = $request->Kota_Keberangkatan;
        $rute->Kota_Tujuan = $request->Kota_Tujuan;
        $rute->Jam_Keberangkatan = $request->Jam_Keberangkatan;
        $rute->Jam_Kedatangan = $request->Jam_Kedatangan;
        $rute->save();

        return redirect('/admin');
    }





    public function destroy($ID_Rute)
    {
        $destroy = Rute::findOrFail($ID_Rute);
        $destroy->delete();

        return redirect('/admin');
    }

    public function Search(Request $request)
    {

        if ($request->has('search')) {
            $DataRute = Rute::where('ID_Rute', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $DataRute = Rute::all();
        }

        return view("admin.Rute.Rute", ['DataRute' => $DataRute]);
    }

    public function lintar()
    {
        return view('admin.lintar');
    }
}
