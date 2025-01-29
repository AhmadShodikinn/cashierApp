<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembayaran')->insert([
            [
                'id_pemesanan' => 1, 
                'id_pegawai' => 1, 
                'tanggal_pembayaran' => Carbon::today()->toDateString(),
                'total_pembayaran' => 30000, 
                'status' => 'Sudah Dibayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Pembayaran 2
            [
                'id_pemesanan' => 2, 
                'id_pegawai' => 2, 
                'tanggal_pembayaran' => Carbon::today()->toDateString(),
                'total_pembayaran' => 25000, 
                'status' => 'Sudah Dibayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Pembayaran 3
            [
                'id_pemesanan' => 3, 
                'id_pegawai' => 3, 
                'tanggal_pembayaran' => Carbon::today()->toDateString(),
                'total_pembayaran' => 36000, 
                'status' => 'Sudah Dibayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Pembayaran 4
            [
                'id_pemesanan' => 4, 
                'id_pegawai' => 4, 
                'tanggal_pembayaran' => Carbon::today()->toDateString(),
                'total_pembayaran' => 35000, 
                'status' => 'Belum Dibayar', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
