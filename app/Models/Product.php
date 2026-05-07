<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['product_name', 'stock', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
