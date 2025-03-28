<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Pastikan nama tabel benar

    protected $fillable = [
        'nama_produk',
        'harga',
        'tahun',
        'warna',
        'transmisi',
        'bahan_bakar',
        'kapasitas',
        'lokasi',
        'kilometer',
        'deskripsi',
        'cicilan',
        'gambar', // Kolom gambar utama
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    // Jika tidak ada kolom created_at dan updated_at
    public $timestamps = true;
}
