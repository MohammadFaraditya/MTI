<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Jadwal',
        'ID_Rute',
        'Tanggal',
        'ID_Bus',
        'Seat_Terisi',
        'Jumlah_Seat',
        'Kelas_Bus',
        'Jam_Keberangkatan',
        'Harga',
        'updated_at',
        'created_at'
    ];

    protected $table = "jadwal";
    protected $primaryKey = 'ID_Jadwal';

    public function getIDJadwalAttribute()
    {
        return $this->attributes['ID_Jadwal'];
    }
}
