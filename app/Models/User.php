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
        'Kota_Kelahiran',
        'Username',
        'Password',
        'ID_Gaji',
        'ID_Bus',
        'ID_Komisi',
        'No_Sim',
        'Status',
        'create_at',
        'update_at'
    ];

    protected $hidden = [
        'Password'
    ];
}
