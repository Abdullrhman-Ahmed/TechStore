<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'brand',        
        'description',
        'price',
        'stock',        
        'image',
        'is_featured'   
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }
}