<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LintasanKeberangkatan extends Model
{
    protected $table = 'lintasan_keberangkatan';

    protected $fillable = [
        'ID_Lintasan',
        'ID_Rute',
        'Lintasan',
        'Nama_Lintasan',
        'Jam_Keberangkatan'
    ];

    protected $primaryKey = 'ID_Lintasan';

    public function getIDLintasanAttribute()
    {
        return $this->attributes['ID_Lintasan'];
    }
}
