<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Rute',
        'Kota_Keberangkatan',
        'Kota_Tujuan',
        'Lintasan_Keberangkatan',
        'Lintasan_Tujuan',
        'Jam_Keberangkatan',
        'Jam_Kedatangan',
        'updated_at',
        'created_at'
    ];

    protected $table = "rute";
    protected $primaryKey = 'ID_Rute';

    public function getIDRuteAttribute()
    {
        return $this->attributes['ID_Rute'];
    }
}
