<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'id_jenis',
        'harga',
        'stok',
    ];

    public function jenis(){
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id');
    }


}
