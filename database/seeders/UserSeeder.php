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
    'ID_Akun' => 'A001',
    'Role' => 'Admin',
    'Username' => 'admin',
    'Password' => $hashedPassword,
    'Status' => 'Aktif',
];
DB::table('users')->insert($data);

    }
}
