<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomisiAgen extends Model
{
    use HasFactory;

    protected $table = 'komisi_agen';

    protected $fillable = [
        'ID_Komisi',
        'ID_Akun',
        'ID_Pesanan',
        'Jumlah_Tiket',
        'Jumlah_Komisi',
        'Status_Pembayaran',
        'Tanggal_Pembayaran'
    ];

    protected $primaryKey = 'ID_Komisi';

    public function getIDKomisiAttribute()
    {
        return $this->attributes['ID_Komisi'];
    }
}
