<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'ID_Tiket';

    protected $fillable = [
        'ID_Tiket',
        'ID_Pesanan',
        'Nama_Penumpang',
        'No_Hp',
        'Tujuan',
        'ID_Jadwal',
        'ID_Bus',
        'Tanggal',
        'Waktu_Keberangkatan',
        'Lokasi_Keberangkatan',
        'No_Seat',
        'Tarif',
        'ID_Akun'
    ];

    public function getIDTiketAttribute()
    {
        return $this->attributes['ID_Tiket'];
    }
}
