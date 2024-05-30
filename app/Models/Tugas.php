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
        'ID_Perjalanan',
        'Sopir_1',
        'Sopir_2',
        'Kernet',
        'Tanggal_dan_Waktu_Tugas_Dimulai',
        'Tanggal_dan_Waktu_Tugas_Berakhir'
    ];


    public function getIDTugasAttribute()
    {
        return $this->attributes['ID_Tugas'];
    }
}
