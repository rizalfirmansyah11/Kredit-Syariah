<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Margin extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'tenor', 'margin_percentage'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
