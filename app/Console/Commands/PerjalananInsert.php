<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Jadwal;
use App\Models\DataPerjalanan;
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

                if ($Tanggal_Keberangkatan == $today && $Jam_Close == $jam) {

                    DataPerjalanan::create([
                        'ID_Perjalanan' => "DA" . $id . rand(1, 100),
                        'Tanggal' => $jadwal->Tanggal,
                        'ID_Jadwal' => $jadwal->ID_Jadwal,
                        'Jumlah_Tiket_Yang_Terjual' => $jadwal->Seat_Terisi,
                        'Jumlah_Sisa_Tiket' => $jadwal->Jumlah_Seat - $jadwal->Seat_Terisi,
                        'ID_Bus' => $jadwal->ID_Bus,
                        'ID_Rute' => $jadwal->ID_Rute
                    ]);
                }
            }

            // Jeda selama 60 detik (1 menit)
            sleep(60);

            $command = 'php artisan Perjalanan:Insert > /dev/null 2>&1 &';
            exec($command);
        }
    }
}
