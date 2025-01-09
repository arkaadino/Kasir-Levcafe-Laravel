<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Merek;
use Illuminate\Http\Request;
use App\Models\Jenis;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view("home.produk.index", compact("produk"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::all();
        return view("home.produk.tambah", compact("jenis", ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_produk' => 'required|min:5',
        //     'id_jenis' => 'required',
        //     'id_merek' => 'required',
        //     'harga' => 'required|string',
        //     'stok' => 'required|numeric'
        // ]);

        $harga = preg_replace('/[^\d]/', '', $request->harga); // Mengambil hanya angka

        Produk::create([
            'nama_produk'=> $request->nama_produk,
            'id_jenis'=> $request->id_jenis,
            'harga'=> (int)$harga,
            'stok'=> $request->stok
        ]);

        return redirect("/produk")->with("success","Produk berhasil ditambahkan");
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::find($id);
        $jenis = Jenis::all();
        return view("home.produk.edit", compact("produk", 'jenis',));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::find($id);

        // $request->validate([
        //     'nama_produk' => 'required|min:5',
        //     'id_jenis' => 'required',
        //     'id_merek' => 'required',
        //     'harga' => 'required|numeric',
        //     'stok' => 'required|numeric'
        // ]);

        $harga = preg_replace('/[^\d]/', '', $request->harga); // Mengambil hanya angka

        $produk->update([
            "produk"=> $request->produk,
            "id_jenis"=> $request->id_jenis,
            "id_merek"=> $request->id_merek,
            "harga"=> (int)$harga,
            "stok"=> $request->stok
        ]);

        return redirect("/produk")->with("success","Produk berhasil ditambahkan");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        $produk -> delete();
        return redirect("/produk")->with("success","Data Berhasil Dihapus");
    }

}
