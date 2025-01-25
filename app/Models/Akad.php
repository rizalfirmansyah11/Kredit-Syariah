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
        'email',
        'jenis_benda',
        'merek_benda',
        'tahun_pembuatan',
        'harga_benda',
        'foto_benda',
        'jumlah_kredit',
        'jangka_waktu',
        'tanggal_pembuatan', // Pastikan kolom ini dapat diisi
    ];
    

    protected $attributes = [
        'status' => 'pending',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   

    // public function benda()
    // {
    //     return $this->belongsTo(Benda::class);
    // }
}
