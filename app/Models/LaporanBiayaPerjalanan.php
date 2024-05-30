<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBiayaPerjalanan extends Model
{
    protected $table = 'laporan_biaya_perjalanan';
    protected $primaryKey = 'ID_Laporan_Biaya_Perjalanan';
    protected $fillable = [
        'ID_Laporan_Biaya_Perjalanan',
        'ID_Akun',
        'ID_Tugas',
        'Tanggal',
        'Biaya_Tol',
        'Biaya_Bahan_Bakar',
        'Bukti_Biaya_Tol',
        'Bukti_Biaya_Bahan_Bakar'
    ];

    public function getIDLaporanBiayaOperasionalAttribute()
    {
        return $this->attributes['ID_Laporan_Biaya_Perjalanan'];
    }
}
