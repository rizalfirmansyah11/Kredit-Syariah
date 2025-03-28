<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elektronik extends Model
{
    use HasFactory;

    protected $table = 'elektroniks'; // Sesuai dengan nama tabel di database

    protected $fillable = [
        'nama_produk', // Menggunakan 'nama_produk' sesuai dengan database
        'harga',
        'merek',
        'garansi',
        'lokasi',
        'deskripsi',
       
    ];
     // Relasi ke ProductImage
     public function gambar()
     {
         return $this->hasMany(ElektronikImage::class, 'elektroniks_id');
     }
     
 }

