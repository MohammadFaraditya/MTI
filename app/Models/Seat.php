<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $table = 'seat';
    protected $primaryKey = 'ID_Seat';

    protected $fillable = [
        'ID_Seat',
        'No_Seat',
        'ID_Bus',
        'ID_Jadwal',
        'Available'
    ];

    public function getIDSeatAttribute()
    {
        return $this->attributes['ID_Seat'];
    }
}
