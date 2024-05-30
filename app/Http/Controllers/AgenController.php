<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rute;
use App\Models\Jadwal;
use App\Models\LintasanKeberangkatan;
use App\Models\Seat;
use App\Models\Ticket;
use App\Models\PesananTicket;
use App\Models\KomisiAgen;
use App\Models\GajiKomisi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
            $LintasanTujuan = LintasanTujuan::all();
            $DataJadwal = null;
            return view('Agen.JadwalAgen', [
                'rute' => $rute, 'jadwal' => $jadwal, 'user_nama' => $nama_user, 'DataJadwal' => $DataJadwal,
                'LintasanTujuan' => $LintasanTujuan
            ]);
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

            // Mendapatkan data lintasan tujuan
            $LintasanTujuan = LintasanTujuan::all();

            // Mendapatkan nama agen tanpa awalan "Agen"
            $agen = str_replace("Agen", "", $user->Username);

            // Mendapatkan ID Rute yang sesuai dengan agen
            $jamkeberangkatan = LintasanKeberangkatan::join('rute', 'lintasan_keberangkatan.ID_Rute', '=', 'rute.ID_Rute')
                ->where('lintasan_keberangkatan.Nama_Lintasan', 'like', '%' . $agen . '%')
                ->select('lintasan_keberangkatan.Jam_Keberangkatan', 'lintasan_keberangkatan.ID_Rute')
                ->first();

            // Jika terdapat tanggal dan kota tujuan yang dipilih
            if ($request->tanggal && $request->Tujuan) {
                $DataJadwal = Jadwal::join('rute', 'jadwal.ID_Rute', '=', 'rute.ID_Rute')
                    ->join('lintasan_tujuan', 'rute.ID_Rute', '=', 'lintasan_tujuan.ID_Rute')
                    ->where('jadwal.Tanggal', $request->tanggal)
                    ->where('lintasan_tujuan.Nama_Lintasan', $request->Tujuan)
                    ->where('jadwal.ID_Rute', $jamkeberangkatan->ID_Rute) // Tambahkan filter berdasarkan ID_Rute
                    ->get();

                return view('Agen.JadwalAgen', [
                    'rute' => $rute,
                    'jadwal' => $jadwal,
                    'user_nama' => $nama_user,
                    'DataJadwal' => $DataJadwal,
                    'jamkeberangkatan' => $jamkeberangkatan,
                    'LintasanTujuan' => $LintasanTujuan,
                    'Tujuan' => $request->Tujuan // Pastikan variabel ini dikirimkan ke view
                ]);
            }

            return view('Agen.JadwalAgen', [
                'rute' => $rute,
                'jadwal' => $jadwal,
                'user_nama' => $nama_user,
                'LintasanTujuan' => $LintasanTujuan // Pastikan variabel ini dikirimkan ke view
            ]);
        } else {
            // Handle jika pengguna belum login
            return redirect()->route('login');
        }
    }



    public function viewBooking(Request $request, $ID_Jadwal, $Tujuan)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $DataJadwal = Jadwal::findOrFail($ID_Jadwal);
            $Rute = rute::all();
            $seat = Seat::where('ID_Jadwal', $ID_Jadwal)->get();

            return view('Agen.BookingTicket', [
                'user_nama' => $nama_user, 'DataJadwal' => $DataJadwal, 'Rute' => $Rute,
                'seat' => $seat, 'Tujuan' => $Tujuan
            ]);
        }
    }

    public function dataPenumpang(Request $request, $ID_Jadwal, $Seat, $Tujuan)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;

            // Decode string JSON menjadi array PHP
            $seatArray = json_decode($Seat, true);

            // Periksa apakah dekode berhasil
            if ($seatArray === null && json_last_error() !== JSON_ERROR_NONE) {
                // Penanganan kesalahan jika dekode gagal
                // Misalnya, jika string yang diterima bukan merupakan JSON yang valid
                // Anda bisa mengembalikan respon dengan pesan kesalahan atau melakukan tindakan yang sesuai
                return response()->json(['error' => 'Invalid JSON string'], 400);
            }

            // Kembalikan view dengan data yang diperlukan
            return view('Agen.DataPenumpang', [
                'user_nama' => $nama_user,
                'dataseat' => $seatArray, // Menggunakan camelCase untuk nama variabel
                'ID_Jadwal' => $ID_Jadwal,
                'Tujuan' => $Tujuan
            ]);
        }
    }

    // Order Tiket Bus
    public function OrderTicket(Request $request, $ID_Jadwal, $Tujuan)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;

            // Generate ID pesanan
            $ID_Pesanan = 'PSN' . rand(1, 10000);

            // Retrieve data jadwal
            $datajadwal = Jadwal::findOrFail($ID_Jadwal);
            $rute = rute::findOrFail($datajadwal->ID_Rute);

            // Retrieve jam keberangkatan dan lokasi keberangkatan
            $agen = str_replace("Agen", "", $user->Username);
            $jamkeberangkatan = LintasanKeberangkatan::join('rute', 'lintasan_keberangkatan.ID_Rute', '=', 'rute.ID_Rute')
                ->where('lintasan_keberangkatan.Nama_Lintasan', 'like', '%' . $agen . '%')
                ->where('lintasan_keberangkatan.ID_Rute', $datajadwal->ID_Rute)
                ->select('lintasan_keberangkatan.Jam_Keberangkatan')
                ->first();
            $lokasi = LintasanKeberangkatan::join('rute', 'lintasan_keberangkatan.ID_Rute', '=', 'rute.ID_Rute')
                ->where('lintasan_keberangkatan.Nama_Lintasan', 'like', '%' . $agen . '%')
                ->where('lintasan_keberangkatan.ID_Rute', $datajadwal->ID_Rute)
                ->select('lintasan_keberangkatan.Nama_Lintasan')
                ->first();

            $komisi = GajiKomisi::findOrFail('GK01');


            $ID_Komisi = 'IK' . $user->ID_Akun . rand(1, 1000);
            // Determine payment status
            if ($request->DP == null) {
                $bayar = count($request->seat) * $datajadwal->Harga;
                $status = 'Lunas';
                // Create order
                PesananTicket::create([
                    'ID_Pesanan' => $ID_Pesanan,
                    'ID_Jadwal' => $ID_Jadwal,
                    'Tanggal_Pesanan' => Carbon::now()->toDateTimeString(),
                    'Jumlah_Tiket_Pesanan' => count($request->seat),
                    'Jumlah_Pembayaran' => $bayar,
                    'Status_Pembayaran' => $status,
                    'ID_Akun' => $user->ID_Akun
                ]);
                KomisiAgen::create([
                    'ID_Komisi' => $ID_Komisi,
                    'ID_Akun' => $user->ID_Akun,
                    'ID_Pesanan' => $ID_Pesanan,
                    'Jumlah_Tiket' => count($request->seat),
                    'Jumlah_Komisi' => $bayar * $komisi->Komisi_Agen / 100,
                    'Status_Pembayaran' => 'Belum Dibayar',
                    'Tanggal_Pembayaran' => null
                ]);
            } else {
                $bayar = $request->DP;
                $status = 'DP Rp. ' . number_format($request->DP, 0, ',', '.');
                // Create order
                PesananTicket::create([
                    'ID_Pesanan' => $ID_Pesanan,
                    'ID_Jadwal' => $ID_Jadwal,
                    'Tanggal_Pesanan' => Carbon::now()->toDateTimeString(),
                    'Jumlah_Tiket_Pesanan' => count($request->seat),
                    'Jumlah_Pembayaran' => $bayar,
                    'Status_Pembayaran' => $status,
                    'ID_Akun' => $user->ID_Akun
                ]);
            }



            // Process each ticket
            for ($i = 0; $i < count($request->seat); $i++) {
                Ticket::create([
                    'ID_Tiket' => 'TCKT' . rand(1, 1000),
                    'ID_Pesanan' => $ID_Pesanan,
                    'Nama_Penumpang' => $request->Nama_Penumpang[$i],
                    'No_Hp' => $request->No_Penumpang[$i],
                    'Tujuan' => $Tujuan,
                    'ID_Jadwal' => $ID_Jadwal,
                    'ID_Bus' => $datajadwal->ID_Bus,
                    'Tanggal' => $datajadwal->Tanggal,
                    'Waktu_Keberangkatan' => $jamkeberangkatan->Jam_Keberangkatan,
                    'Lokasi_Keberangkatan' => $lokasi->Nama_Lintasan,
                    'No_Seat' => $request->seat[$i],
                    'Tarif' => $datajadwal->Harga,
                    'ID_Akun' => $user->ID_Akun
                ]);

                // Update seat availability
                $seat = Seat::where('ID_Jadwal', $ID_Jadwal)
                    ->where('No_Seat', $request->seat[$i])->first();

                if ($seat) {
                    $seat->Available = true;
                    $seat->save();
                }
            }

            $seatTerisi = Jadwal::findOrFail($ID_Jadwal);
            $seatTerisi->Seat_Terisi += count($request->seat);
            $seatTerisi->save();



            return redirect('/agen');
        }
    }

    // Show view pesanan tiket
    public function PesananTiket()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $user_id = $user->ID_Akun;
            $pesanan = PesananTicket::all();
            $tanggal = PesananTicket::select('Tanggal_Pesanan')->distinct()->get();

            $options = [];
            foreach ($tanggal as $tgl) {
                // Cek apakah nilai Tanggal sudah ada di dalam array $options
                if (!in_array($tgl->Tanggal_Pesanan, $options)) {
                    // Jika belum ada, tambahkan ke dalam array
                    $options[] = $tgl->Tanggal_Pesanan;
                }
            }
            return view('agen.DataPesanan', ['user_nama' => $nama_user, 'pesanan' => $pesanan, 'tanggal' => $options, 'user_id' => $user_id]);
        }
    }

    // Funtion Pelunasan DP
    public function LunasDP($ID_Pesanan)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $pesanan = PesananTicket::findOrFail($ID_Pesanan);
            $jadwal = Jadwal::join('pesanan_tiket', 'jadwal.ID_Jadwal', '=', 'pesanan_tiket.ID_Jadwal')
                ->where('ID_Pesanan', $pesanan->ID_Pesanan)
                ->get();

            $tiket = Ticket::join('pesanan_tiket', 'tiket.ID_Pesanan', '=', 'pesanan_tiket.ID_Pesanan')
                ->where('tiket.ID_Pesanan', $pesanan->ID_Pesanan)
                ->get();

            $harga = '';
            foreach ($jadwal as $datajadwal) {
                if ($datajadwal->ID_Jadwal == $pesanan->ID_Jadwal) {
                    $harga = $datajadwal->Harga;
                }
            }

            $pesanan->Status_Pembayaran = 'Lunas';
            $pesanan->Jumlah_Pembayaran = $harga * count($tiket);
            $pesanan->save();

            $komisi = GajiKomisi::findOrFail('GK01');
            $ID_Komisi = 'IK' . $user->ID_Akun . rand(1, 1000);

            KomisiAgen::create([
                'ID_Komisi' => $ID_Komisi,
                'ID_Akun' => $user->ID_Akun,
                'ID_Pesanan' => $ID_Pesanan,
                'Jumlah_Tiket' => count($tiket),
                'Jumlah_Komisi' => ($harga * count($tiket)) * $komisi->Komisi_Agen / 100,
                'Status_Pembayaran' => 'Belum Dibayar',
                'Tanggal_Pembayaran' => null
            ]);
        }

        return redirect('/agen/pesanan-tiket');
    }

    //Function Cancel Pesanan
    public function CancelPesanan($ID_Pesanan)
    {

        $tiket = Ticket::where('ID_Pesanan', $ID_Pesanan)->get();
        $seats = collect();

        foreach ($tiket as $ticket) {
            $result = Seat::where('ID_Jadwal', $ticket->ID_Jadwal)
                ->where('No_Seat', $ticket->No_Seat)
                ->get();
            $seats = $seats->merge($result);
        }

        $id_jadwals = $seats->pluck('ID_Jadwal');
        $id_jadwal = $id_jadwals->unique()->first();

        $jadwal = Jadwal::findOrFail($id_jadwal);
        $jadwal->Seat_Terisi -= count($seats);
        $jadwal->save();

        foreach ($seats as $seat) {
            $updateseat = Seat::findOrFail($seat->ID_Seat);
            $updateseat->Available = false;
            $updateseat->save();
        }

        Ticket::where('ID_Pesanan', $ID_Pesanan)->delete();

        $pesanan = PesananTicket::findOrFail(($ID_Pesanan));
        $pesanan->delete();

        return redirect('/agen/pesanan-tiket');
    }

    public function StatusBus()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $jadwal = Jadwal::all();
            return view('agen.StatusBus', ['user_nama' => $nama_user, 'jadwal' => $jadwal]);
        }
    }

    public function PendapatanAgen()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $komisi = KomisiAgen::where('ID_Akun', $user->ID_Akun)->get();
            $pesanan = PesananTicket::join('komisi_agen', 'pesanan_tiket.ID_Pesanan', '=', 'komisi_agen.ID_Pesanan')
                ->get()
                ->unique('Tanggal_Pesanan');


            return view('agen.PendapatanAgen', ['user_nama' => $nama_user, 'komisi_agen' => $komisi, 'pesanan' => $pesanan]);
        }
    }

    public function SearchPendapatan(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $komisi = KomisiAgen::join('pesanan_tiket', 'komisi_agen.ID_Pesanan', '=', 'pesanan_tiket.ID_Pesanan')
                ->where('pesanan_tiket.Tanggal_Pesanan', $request->tanggal)
                ->get();


            $pesanan = PesananTicket::join('komisi_agen', 'pesanan_tiket.ID_Pesanan', '=', 'komisi_agen.ID_Pesanan')
                ->get()
                ->unique('Tanggal_Pesanan');

            return view('agen.PendapatanAgen', ['user_nama' => $nama_user, 'komisi_agen' => $komisi, 'pesanan' => $pesanan]);
        }
    }

    public function searchPesanan(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $nama_user = $user->Nama;
            $user_id = $user->ID_Akun;
            $pesanan = PesananTicket::all();
            $tanggal = PesananTicket::select('Tanggal_Pesanan')->distinct()->get();

            $options = [];
            foreach ($tanggal as $tgl) {
                // Cek apakah nilai Tanggal sudah ada di dalam array $options
                if (!in_array($tgl->Tanggal_Pesanan, $options)) {
                    // Jika belum ada, tambahkan ke dalam array
                    $options[] = $tgl->Tanggal_Pesanan;
                }
            }

            if ($request->tanggal) {
                $pesanan = PesananTicket::where('Tanggal_Pesanan', 'LIKE', '%' . $request->tanggal . '%')->get();
            } else {
                $pesanan = PesananTicket::all();
            }
        }
        return view("agen.DataPesanan", ['pesanan' => $pesanan, 'tanggal' => $options, 'user_nama' => $nama_user, 'user_id' => $user_id]);
    }
}
