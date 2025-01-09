<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{

    protected $fillable = [
        'id_pelanggan',
        'id_user',
        'total',
        'diskon',
        'bayar',
        'kembali',
        'layanan',
    ];


    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function detailpenjualan(){
        return $this->hasMany(DetailPenjualan::class, 'nobon', 'id');
    }


    use HasFactory;
}
