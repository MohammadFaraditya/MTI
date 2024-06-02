<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanOperasional extends Model
{
    use HasFactory;

    protected $table = 'laporan_operasional';
    protected $primaryKey = 'ID_Laporan_Operasional';

    protected $fillable = [
        'ID_Laporan_Operasional',
        'Tanggal',
        'ID_Tugas',
        'Jumlah_Pesanan',
        'Jumlah_Tiket',
        'Jumlah_Pendapatan_Tiket',
        'Biaya_Perjalanan',
        'Biaya_Gaji',
        'Total_Pendapatan'
    ];

    public function getIDLaporanOperasionalAttribute()
    {
        return $this->attributes['ID_Laporan_Operasional'];
    }
}
