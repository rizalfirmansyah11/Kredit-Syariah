<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Pastikan tabel sesuai dengan database
    protected $fillable = ['name', 'margin_1', 'margin_2', 'margin_3', 'margin_4', 'is_applied', 'updated_by'];

    public $timestamps = true; // Aktifkan timestamps agar updated_at otomatis diperbarui

    protected $casts = [
        'margin_1' => 'float',
        'margin_2' => 'float',
        'margin_3' => 'float',
        'margin_4' => 'float',
    ];
}
