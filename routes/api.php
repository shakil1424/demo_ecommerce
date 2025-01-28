<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('products/category/{category}', [ProductController::class, 'category']);

Route::get('products/categories', [CategoryController::class, 'index']);
Route::get('products/categories/{id}', [CategoryController::class, 'show']);