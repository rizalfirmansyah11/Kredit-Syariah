<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElektronikImage extends Model
{
    use HasFactory;

    protected $table = 'elektronik_images';

    protected $fillable = [
        'elektroniks_id', // Pastikan ini ada
        'path'
    ];

    // Relasi ke tabel Elektronik
    public function elektronik()
    {
        return $this->belongsTo(Elektronik::class, 'elektroniks_id');
    }
    
}
