<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Bus',
        'Bus_Model',
        'Mesin_Bus',
        'Tahun_Bus',
        'Jadwal_Service',
        'Status_Bus',
        'Kelas_Bus',
        'Jumlah_Seat'

    ];

    protected $table = 'bus';

    protected $primaryKey = 'ID_Bus';

    public function getIdBusAttribute()
    {
        return $this->attributes['ID_Bus'];
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_bus', 'ID_Bus');
    }
}
