<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akad extends Model
{
    use HasFactory;

    // Kolom-kolom yang bisa diisi secara langsung
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'alamat',
        'telepon',
        'jumlah_kredit',
        'jangka_waktu',
    ];
}
