<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $primaryKey = 'ID_Tugas';

    protected $fillable = [
        'ID_Tugas',
        'ID_Jadwal',
        'ID_Bus',
        'ID_Data_Seat',
        'ID_Perjalanan',
        'Tanggal_dan_Waktu_Tugas_Dimulai',
        'Tanggal_dan_Waktu_Tugas_Berakhir',
        'ID_Laporan_Biaya_Perjalanan'
    ];


    public function getIDTugasAttribute()
    {
        return $this->attributes['ID_Tugas'];
    }
}
