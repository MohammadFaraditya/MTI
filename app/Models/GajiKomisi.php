<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiKomisi extends Model
{
    use HasFactory;

    protected $table = 'gaji_komisi';

    protected $fillable = [
        'ID_GajiKomisi',
        'Komisi_Agen',
        'Gaji_Sopir',
        'Gaji_Kernet'
    ];

    protected $primaryKey = 'ID_GajiKomisi';

    public function getIDGajiKomisiAttribute()
    {
        return $this->attributes['ID_GajiKomisi'];
    }
}
