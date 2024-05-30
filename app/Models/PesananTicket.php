<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananTicket extends Model
{
    protected $table = 'pesanan_tiket';
    protected $primaryKey = 'ID_Pesanan';

    protected $fillable = [
        'ID_Pesanan',
        'ID_Jadwal',
        'Tanggal_Pesanan',
        'Jumlah_Tiket_Pesanan',
        'Jumlah_Pembayaran',
        'Status_Pembayaran',
        'ID_Akun'
    ];

    public function getIDPesananAttribute()
    {
        return $this->attributes['ID_Pesanan'];
    }
}
