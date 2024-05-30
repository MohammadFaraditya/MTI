<?php

namespace App\Http\Controllers;

use App\Models\GajiKomisi;
use App\Models\LaporanOperasional;
use App\Models\LintasanKeberangkatan;
use App\Models\LintasanTujuan;
use App\Models\PesananTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Jadwal;
use App\Models\Rute;
use App\Models\Gaji;
use App\Models\Seat;
use App\Models\LaporanBiayaPerjalanan;
use App\Models\Ticket;

use Illuminate\Support\Facades\Auth;

class KernetController extends Controller
{
    public function TugasKernet()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id_akun = $user->ID_Akun;
            $today = Carbon::now()->format('Y-m-d');
            $tugas = Tugas::where(function ($query) use ($id_akun) {
                $query->where('Kernet', 'like', $id_akun . '%');
            })
                ->whereDate('Tanggal_dan_Waktu_Tugas_Dimulai', $today)
                ->where('Tanggal_dan_Waktu_Tugas_Berakhir', null)
                ->get();

            if ($tugas->isEmpty()) {
                return view('kernet.TugasKernet', [
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

            return view('kernet.TugasKernet', [
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
            $tugas = Tugas::where('Kernet', null)
                ->get();

            return view('kernet.TambahTugas', ['user' => $user, 'tugas' => $tugas]);
        }
    }

    public function TambahTugas($ID_Tugas)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $tugas = Tugas::findOrFail($ID_Tugas);

            if (is_null($tugas->Kernet)) {
                $tugas->Kernet = $user->ID_Akun . '-' . $user->ID_Nama;
                $tugas->save();
                return redirect(route('TugasKernet'));
            }
        }
    }

    public function DataSeat($ID_Jadwal)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $dataseat = Seat::where('ID_Jadwal', $ID_Jadwal)->get();
            $tiket = Ticket::where('ID_Jadwal', $ID_Jadwal)->get();

            return view('kernet.DataSeat', ['ID_Jadwal' => $ID_Jadwal]);
        }
    }

    public function ShowReportKernet($ID_Jadwal, $ID_Tugas)
    {

        return view('kernet.LaporanOperasional', ['ID_Jadwal' => $ID_Jadwal, 'ID_Tugas' => $ID_Tugas]);
    }

    public function StoreLaporan(Request $request, $ID_Jadwal, $ID_Tugas)
    {
        $request->validate([
            'Biaya_Tol' => 'required|numeric',
            'Struk_Biaya_Tol' => 'file|mimes:jpeg,png,pdf|max:2048',
            'Biaya_Bahan_Bakar' => 'required|numeric',
            'Struk_Bahan_Bakar' => 'file|mimes:jpeg,png,pdf|max:2048',
        ]);

        if (Auth::check()) {
            $user = Auth::user();
            $id_laporan = 'LPRN' . rand(1, 10000); // Buat ID unik untuk laporan
            $tanggal = Carbon::now();

            $tolFilePath = null;
            if ($request->hasFile('Struk_Biaya_Tol')) {
                $tolFilePath = $request->file('Struk_Biaya_Tol')->store('struk_tol', 'public');
            }

            $bahanBakarFilePath = null;
            if ($request->hasFile('Struk_Bahan_Bakar')) {
                $bahanBakarFilePath = $request->file('Struk_Bahan_Bakar')->store('struk_bahan_bakar', 'public');
            }

            // Buat instance LaporanBiayaPerjalanan dengan semua nilai yang diperlukan
            $laporan = new LaporanBiayaPerjalanan([
                'ID_Laporan_Biaya_Perjalanan' => $id_laporan,
                'ID_Akun' => $user->ID_Akun,
                'ID_Tugas' => $ID_Tugas,
                'Tanggal' => $tanggal,
                'Biaya_Tol' => $request->Biaya_Tol,
                'Biaya_Bahan_Bakar' => $request->Biaya_Bahan_Bakar,
                'Bukti_Biaya_Tol' => $tolFilePath,
                'Bukti_Biaya_Bahan_Bakar' => $bahanBakarFilePath
            ]);

            // Simpan entitas laporan
            $laporan->save();

            $tugas = Tugas::findOrFail($ID_Tugas);
            $tugas->Tanggal_dan_Waktu_Tugas_Berakhir = $tanggal;
            $tugas->save();

            $gajikomisi = GajiKomisi::findOrFail('GK01');

            $sopir1 = explode('-', $tugas->Sopir_1)[0];
            $sopir2 = explode('-', $tugas->Sopir_2)[0];
            $kernet = explode('-', $tugas->Kernet)[0];

            Gaji::create([
                'ID_Gaji' => 'GJR' . $sopir1 . rand(1, 1000),
                'ID_Tugas' => $ID_Tugas,
                'ID_Akun' => $sopir1,
                'Jumlah_Gaji' => $gajikomisi->Gaji_Sopir,
                'Status_Pembayaran' => 'Belum Dibayar',
                'Tanggal_Pembayaran' => null
            ]);

            Gaji::create([
                'ID_Gaji' => 'GJR' . $sopir2 . rand(1, 1000),
                'ID_Tugas' => $ID_Tugas,
                'ID_Akun' => $sopir2,
                'Jumlah_Gaji' => $gajikomisi->Gaji_Sopir,
                'Status_Pembayaran' => 'Belum Dibayar',
                'Tanggal_Pembayaran' => null
            ]);

            Gaji::create([
                'ID_Gaji' => 'GJR' . $kernet . rand(1, 1000),
                'ID_Tugas' => $ID_Tugas,
                'ID_Akun' => $kernet,
                'Jumlah_Gaji' => $gajikomisi->Gaji_Kernet,
                'Status_Pembayaran' => 'Belum Dibayar',
                'Tanggal_Pembayaran' => null
            ]);

            $today = Carbon::now();
            $jadwal = Carbon::parse($today)->format('dmy');
            $jumlahPesanan = count(PesananTicket::where('ID_Jadwal', $ID_Jadwal)->get());
            $jumlahTiket = count(Ticket::where('ID_Jadwal', $ID_Jadwal)->get());
            $hargaTiket = Jadwal::findOrFail($ID_Jadwal);
            $biayaGajiSopir = 2 * $gajikomisi->Gaji_Sopir;
            $biayaGajiKernet = $gajikomisi->Gaji_Kernet;

            LaporanOperasional::create([
                'ID_Laporan_Operasional' => 'LPRNOP' . $jadwal . rand(1, 1000),
                'Tanggal' => Carbon::now(),
                'ID_Tugas' => $ID_Tugas,
                'Jumlah_Pesanan' => $jumlahPesanan,
                'Jumlah_Tiket' => $jumlahTiket,
                'Jumlah_Pendapatan_Tiket' => $jumlahTiket * $hargaTiket->Harga,
                'Biaya_Perjalanan' => $request->Biaya_Tol + $request->Biaya_Bahan_Bakar,
                'Biaya_Gaji' => $biayaGajiSopir + $biayaGajiKernet,
                'Total_Pendapatan' => ($jumlahTiket * $hargaTiket->Harga) - (($request->Biaya_Tol + $request->Biaya_Bahan_Bakar) + ($biayaGajiSopir + $biayaGajiKernet))

            ]);


            return redirect()->route('TugasKernet')->with('success', 'Laporan berhasil disimpan');
        }

        return redirect()->route('TugasKernet')->with('error', 'Gagal menyimpan laporan');
    }
}
