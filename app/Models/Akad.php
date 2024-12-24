<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'alamat',
        'telepon',
        'jumlah_kredit',
        'jangka_waktu',
        'user_id', // Tambahkan user_id
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
