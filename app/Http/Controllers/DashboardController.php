<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historypenjualan = Penjualan::all();
        $produkcount = Produk::count();
        $usercount = User::count();
        $jeniscount = Jenis::count();
        $pelanggancount = Pelanggan::count();
        $produkstok = Produk::all();

        return view('dashboard', compact('historypenjualan', 'produkstok', 'usercount','produkcount', 'pelanggancount', 'jeniscount'));
    }

}
