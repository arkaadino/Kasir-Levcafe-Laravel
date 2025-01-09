<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('home.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $produk = Produk::all();
        $user = User::all(); // Mengambil daftar kasir (user)
        return view('home.penjualan.tambah', compact('pelanggan', 'produk', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id', // Validasi ID Pelanggan
            'id_user' => 'required|exists:users,id', // Validasi ID User
            'layanan' => 'required|string', // Layanan sebagai string
        ]);

        // Simpan data penjualan dengan default value 0 untuk total, diskon, bayar, dan kembali
        Penjualan::create([
            'id_pelanggan' => $request->id_pelanggan, // Ambil id_pelanggan dari request
            'id_user' => $request->id_user, // Ambil id_user dari request
            'total' => 0,  // Default 0
            'diskon' => 0, // Default 0
            'bayar' => 0,  // Default 0
            'kembali' => 0, // Default 0
            'layanan' => $request->layanan, // Ambil layanan dari request
        ]);

        return redirect("/penjualan")->with("success", "Penjualan berhasil ditambahkan");
    }


        public function detail(string $id)
    {
    $penjualan = Penjualan::find($id);


    // Ambil data produk untuk dropdown
    $produk = Produk::all();
    $detail = DetailPenjualan::all();

    // Tampilkan halaman detail penjualan untuk menambahkan produk
    return view('home.penjualan.detail', compact('penjualan', 'produk', 'detail'));
    }

    public function addDetail(Request $request, string $id)
    {
        // Ambil penjualan berdasarkan ID
        $penjualan = Penjualan::find($id);



        $total = 0; // Untuk menghitung total penjualan
        foreach ($request->products as $product) {
            // Simpan detail penjualan
            $detail = DetailPenjualan::create([
                'nobon' => $penjualan->id,
                'id_produk' => $product['id_produk'],
                'harga' => $product['harga'],
                'jumlah' => $product['jumlah'],
        'subtotal' => (int)$product['harga'] * (int)$product['jumlah'],

            ]);


            // Update stok produk
            $produk = Produk::find($product['id_produk']);
            $produk->decrement('stok', $product['jumlah']); // Decrement stok

            // Hitung total penjualan
            $total += $product['harga'] * $product['jumlah'];
        }

        // Update total, bayar, dan kembali di penjualan
        $penjualan->total += $total; // Tambahkan ke total
        $penjualan->bayar = $request->bayar; // Ambil dari input bayar
        $penjualan->kembali = $penjualan->bayar - $penjualan->total; // Hitung kembali
        $penjualan->save(); // Simpan perubahan

        // Jika total penjualan lebih dari 0, update jumlah pembelian pelanggan
        if ($penjualan->total > 0) {
            $pelanggan = Pelanggan::find($penjualan->id_pelanggan);
            $pelanggan->increment('jml', 1); // Increment jumlah pembelian
        }

        return redirect("/penjualan")->with("success", "Detail penjualan berhasil ditambahkan");
    }

    public function struk(string $id)
    {
        // Cari data penjualan berdasarkan ID
        $penjualan = Penjualan::find($id);

        // Ambil detail penjualan terkait (menggunakan relasi)
        $detailPenjualan = $penjualan->details; // Asumsi relasi 'details' di model Penjualan

        // Kirim data ke view
        return view('home.penjualan.struk', [
            'penjualan' => $penjualan,
            'detailPenjualan' => $detailPenjualan,
        ]);
    }

    public function laporan()
    {
        $penjualan = Penjualan::all();

        return view("home.penjualan.laporan", compact("penjualan"));
    }

}
