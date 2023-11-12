<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hashedPassword = Hash::make('admin123');

$data = [
    [
    'ID_Akun' => 'AG01',
    'Role' => 'agen',
    'Username' => 'agen',
    'Password' => Hash::make('agen'),
    'Status' => 'Aktif',
    ],
    [
    'ID_Akun' => 'SPR01',
    'Role' => 'sopir',
    'Username' => 'sopir',
    'Password' => Hash::make('sopir'),
    'Status' => 'Aktif',
    ],
    [
    'ID_Akun' => 'KRT01',
    'Role' => 'kernet',
    'Username' => 'kernet',
    'Password' => Hash::make('kernet'),
    'Status' => 'Aktif',
    ]
];
DB::table('users')->insert($data);

    }
}
