<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjanjian extends Model
{
    use HasFactory;

    protected $table = 'perjanjian'; // Nama tabel di database

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'gambar_produk',
        'tenor',
        'uang_muka',
        'kartu_pendukung',
    ];
}
