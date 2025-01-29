<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pegawai')->insert([
            [
                'nama_pegawai' => 'Pangeran Diponegoro',
                'username' => 'admin',
                'password' => Hash::make('password'), 
                'id_level' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pegawai' => 'Budi Santoso',
                'username' => 'budi123',
                'password' => Hash::make('password'), 
                'id_level' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pegawai' => 'Citra Dewi',
                'username' => 'citra123',
                'password' => Hash::make('password'), 
                'id_level' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pegawai' => 'Dewi Lestari',
                'username' => 'dewi123',
                'password' => Hash::make('password'), 
                'id_level' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pegawai' => 'Eko Prabowo',
                'username' => 'eko123',
                'password' => Hash::make('password'), 
                'id_level' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
