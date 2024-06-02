<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Jadwal;
use App\Models\DataPerjalanan;
use App\Models\Bus;
use App\Models\Tugas;
use App\Models\User;
use Carbon\Carbon;

class PerjalananInsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Perjalanan:Insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Data Perjalanan dari jadwal';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        while (true) {

            // Data Perjalanan
            $hariIni = Carbon::now();
            $hariIni->setTimezone('Asia/Jakarta');

            $today = $hariIni->format('Y-m-d');
            $jam = Carbon::parse($hariIni)->format('H:i');

            $id = Carbon::now()->format('mdy');

            $Jadwal = Jadwal::all();

            foreach ($Jadwal as $jadwal) {
                $Jam_Keberangkatan = Carbon::parse($jadwal->Jam_Keberangkatan)->subMinutes(15);
                $Jam_Close = Carbon::parse($Jam_Keberangkatan)->format('H:i');
                $Tanggal_Keberangkatan = $jadwal->Tanggal;
                $id_perjalanan = "DA" . $id . rand(1, 10000);

                if (
                    $Tanggal_Keberangkatan == $today && $Jam_Close == $jam
                ) {
                    DataPerjalanan::create([
                        'ID_Perjalanan' => $id_perjalanan,
                        'Tanggal' => $jadwal->Tanggal,
                        'ID_Jadwal' => $jadwal->ID_Jadwal,
                        'Jumlah_Tiket_Yang_Terjual' => $jadwal->Seat_Terisi,
                        'Jumlah_Sisa_Tiket' => $jadwal->Jumlah_Seat - $jadwal->Seat_Terisi,
                        'ID_Bus' => $jadwal->ID_Bus,
                        'ID_Rute' => $jadwal->ID_Rute
                    ]);

                    $users = User::join('jadwal', 'users.ID_Bus', '=', 'jadwal.ID_Bus')
                        ->where('jadwal.ID_Jadwal', $jadwal->ID_Jadwal)
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

                    if (!$sopir1 || strtolower($sopir1->Status) != 'aktif') {
                        Tugas::create([
                            'ID_Tugas' => 'TGS' . $id . rand(1, 10000),
                            'ID_Jadwal' => $jadwal->ID_Jadwal,
                            'ID_Perjalanan' => $id_perjalanan,
                            'Sopir_1' => null,
                            'Sopir_2' => $sopir2 && $sopir2->Status == 'Aktif' ? $sopir2->ID_Akun . '-' . $sopir2->Nama : null,
                            'Kernet' => $kernet && $kernet->Status == 'Aktif' ? $kernet->ID_Akun . '-' . $kernet->Nama : null,
                            'Tanggal_dan_Waktu_Tugas_Dimulai' => $jadwal->Tanggal . ' ' . $jadwal->Jam_Keberangkatan,
                            'Tanggal_dan_Waktu_Tugas_Berakhir' => null
                        ]);
                    } elseif (!$sopir2 || strtolower($sopir2->Status) != 'aktif') {
                        Tugas::create([
                            'ID_Tugas' => 'TGS' . $id . rand(1, 10000),
                            'ID_Jadwal' => $jadwal->ID_Jadwal,
                            'ID_Perjalanan' => $id_perjalanan,
                            'Sopir_1' => $sopir1 && $sopir1->Status == 'Aktif' ? $sopir1->ID_Akun . '-' . $sopir1->Nama : null,
                            'Sopir_2' => null,
                            'Kernet' => $kernet && $kernet->Status == 'Aktif' ? $kernet->ID_Akun . '-' . $kernet->Nama : null,
                            'Tanggal_dan_Waktu_Tugas_Dimulai' => $jadwal->Tanggal . ' ' . $jadwal->Jam_Keberangkatan,
                            'Tanggal_dan_Waktu_Tugas_Berakhir' => null
                        ]);
                    } elseif (!$kernet || strtolower($kernet->Status) != 'aktif') {
                        Tugas::create([
                            'ID_Tugas' => 'TGS' . $id . rand(1, 10000),
                            'ID_Jadwal' => $jadwal->ID_Jadwal,
                            'ID_Perjalanan' => $id_perjalanan,
                            'Sopir_1' => $sopir1 && $sopir1->Status == 'Aktif' ? $sopir1->ID_Akun . '-' . $sopir1->Nama : null,
                            'Sopir_2' => $sopir2 && $sopir2->Status == 'Aktif' ? $sopir2->ID_Akun . '-' . $sopir2->Nama : null,
                            'Kernet' => null,
                            'Tanggal_dan_Waktu_Tugas_Dimulai' => $jadwal->Tanggal . ' ' . $jadwal->Jam_Keberangkatan,
                            'Tanggal_dan_Waktu_Tugas_Berakhir' => null
                        ]);
                    } else {
                        Tugas::create([
                            'ID_Tugas' => 'TGS' . $id . rand(1, 10000),
                            'ID_Jadwal' => $jadwal->ID_Jadwal,
                            'ID_Perjalanan' => $id_perjalanan,
                            'Sopir_1' => $sopir1->ID_Akun . '-' . $sopir1->Nama,
                            'Sopir_2' => $sopir2->ID_Akun . '-' . $sopir2->Nama,
                            'Kernet' => $kernet->ID_Akun . '-' . $kernet->Nama,
                            'Tanggal_dan_Waktu_Tugas_Dimulai' => $jadwal->Tanggal . ' ' . $jadwal->Jam_Keberangkatan,
                            'Tanggal_dan_Waktu_Tugas_Berakhir' => null
                        ]);
                    }
                }
            }

            // Tugas
            $bus = Bus::all();


            // Jeda selama 60 detik (1 menit)
            sleep(60);

            $command = 'php artisan Perjalanan:Insert > /dev/null 2>&1 &';
            exec($command);
        }
    }
}
