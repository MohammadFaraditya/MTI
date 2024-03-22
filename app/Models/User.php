<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = 'ID_Akun';

    protected $fillable = [
        'ID_Akun',
        'Role',
        'Nama',
        'Alamat',
        'Tanggal_Lahir',
        'No_SIM',
        'Username',
        'Password',
        'No_Telepon',
        'ID_Bus',
        'ID_Komisi',
        'Kota_Kelahiran',
        'Status'
    ];

    protected $hidden = [
        'Password'
    ];

    public function getIDAkunAttribute()
    {
        return $this->attributes['ID_Akun'];
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'ID_Bus');
    }
}
