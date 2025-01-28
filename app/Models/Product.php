<?php

// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'price', 'description', 'category', 'image', 'rating'
    ];

    protected $casts = [
        'rating' => 'array' // Decode rating JSON field into array
    ];

    public function ratings()
    {
        return $this->hasOne(ProductRating::class);
    }
}

