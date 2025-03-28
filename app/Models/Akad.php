<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akad extends Model
{
    use HasFactory;

    protected $table = 'akads'; // Pastikan nama tabel sesuai

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'alamat',
        'telepon',
        'foto_benda',
        'uang_muka',
        'tenor',
        'slip_gaji',
        'ktp',
        'kartu_keluarga',
        'harga_benda',
        'harga_akad',
        'status',
        'user_id'
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
