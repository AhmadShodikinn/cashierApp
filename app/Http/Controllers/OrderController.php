<?php

namespace App\Http\Controllers;

use App\Models\detail_pemesanan;
use App\Models\menu;
use App\Models\pembayaran;
use App\Models\pemesanan;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function index(){
        $menu = menu::all();
        return view('transaksi', compact('menu'));
    }

    public function store(request $request){
        
        $validate = $request->validate([
            'menu' => 'required|array',
            'menu.*.id_menu' => 'required|exists:menu,id_menu',
            'menu.*.quantity' => 'required|integer|min:1',
        ]);

        $menuItems = array_values($validate['menu']);

        $totalHarga = 0;
            foreach ($menuItems as $item) {
            $menu = menu::find($item['id_menu']);
            $totalHarga += $menu->harga * $item['quantity'];
        }
 
        $pesanan = pemesanan::create([
            'jumlah' => count($menuItems),
            'total_harga' => $totalHarga,
            'tanggal_pemesanan' => now(),
            'nomor_meja' => 1,
            'id_member' => 1,
            'diskon' => "false",
        ]);

        foreach ($menuItems as $item) {
            detail_pemesanan::create([
                'id_pemesanan' => $pesanan->id_pemesanan,
                'id_menu' => $item['id_menu'],
                'jumlah' => $item['quantity'],
            ]);
        }

        pembayaran::create([
            'id_pemesanan' => $pesanan->id_pemesanan,
            'id_pegawai' => session('user')['user_id'],
            'tanggal_pembayaran' => now(),
            'total_pembayaran' => $totalHarga,
            'status' => "Sudah Dibayar",
        ]);

        return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
