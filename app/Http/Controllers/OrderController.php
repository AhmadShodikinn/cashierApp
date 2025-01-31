<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $menu = menu::all();
        return view('transaksi', compact('menu'));
    }
}
