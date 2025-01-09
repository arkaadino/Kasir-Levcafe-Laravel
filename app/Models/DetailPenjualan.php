<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $fillable = [
        'nobon',
        'id_produk',
        'harga',
        'jumlah',
        'subtotal',
    ];

    public function penjualan(){
        return $this->belongsTo(Penjualan::class, 'nobon', 'id');
    }
    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    use HasFactory;
}
