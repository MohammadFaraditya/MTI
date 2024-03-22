<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';

    protected $fillable = [
        'ID_Gaji',
        'ID_Tugas',
        'ID_Akun',
        'Jumlah_Gaji',
        'Status_Pembayaran',
        'Tanggal_Pembayaran'
    ];

    protected $primaryKey = 'ID_Gaji';

    public function getIDGajiAttribute()
    {
        return $this->attributes['ID_Gaji'];
    }
}
