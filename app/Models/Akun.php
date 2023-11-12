<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Akun extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'akun';

    protected $fillable = [
        'Username',
        'Password',
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];
}