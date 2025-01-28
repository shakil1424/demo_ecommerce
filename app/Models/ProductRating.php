<?php

// app/Models/ProductRating.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    protected $fillable = ['rate', 'count', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
