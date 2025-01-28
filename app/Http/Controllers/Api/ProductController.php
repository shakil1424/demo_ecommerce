<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('ratings')->get(), 200);
    }

    public function show($id)
    {
        $product = Product::with('ratings')->findOrFail($id);
        return response()->json($product, 200);
    }

    public function category($category)
    {
        $category = Category::where('name', $category)->firstOrFail();
        return response()->json($category->products()->with('ratings')->get(), 200);
    }
}