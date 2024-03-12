<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerjalanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Perjalanan',
        'Tanggal',
        'ID_Jadwal',
        'Jumlah_Tiket_Yang_Terjual',
        'Jumlah_Sisa_Tiket',
        'ID_Bus',
        'ID_Rute'
    ];

    protected $table = 'data_perjalanan';
    protected $primaryKey = 'ID_Perjalanan';

    public function getIDPerjalananAttribute()
    {
        return $this->attributes['ID_Perjalanan'];
    }
}
