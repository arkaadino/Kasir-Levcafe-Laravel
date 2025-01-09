<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nama_pelanggan',
        'notelp',
        'alamat',
        'level',
        'jml'
    ];

    public function penjualan(){
        return $this->hasMany( Penjualan::class , 'id_pelanggan', 'id');
    }

    use HasFactory;
}
