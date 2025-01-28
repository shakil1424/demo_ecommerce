<?php

namespace Database\Seeders;

use App\Models\ProductRating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/ProductSeeder.php


    public function run()
    {
        // Fetch all categories
        $categories = Category::all();

        foreach ($categories as $category) {
            // Create 5 products per category
            for ($i = 1; $i <= 5; $i++) {
                // Generate product data
                $rating = [
                    'rate' => round(rand(1, 5) + rand(0, 9) / 10, 1),  // Random rate between 1.0 and 5.0 with 1 decimal
                    'count' => rand(50, 500)  // Random count between 50 and 500
                ];

                // Create the product
                $product = Product::create([
                    'title' => "Product " . $i . " in " . $category->name,
                    'price' => rand(20, 500),  // Random price between 20 and 500
                    'description' => "Description for product " . $i . " in " . $category->name,
                    'category' => $category->name,
                    'image' => "https://via.placeholder.com/150?text=Product" . $i,
                    'rating' => json_encode($rating),  // Encode rating as JSON
                ]);

                // Create rating record, decode JSON to array
                $decodedRating = json_decode($product->rating, true); // Decoding JSON to array

                ProductRating::create([
                    'product_id' => $product->id,
                    'rate' => $decodedRating['rate'],  // Access 'rate' from decoded array
                    'count' => $decodedRating['count'],  // Access 'count' from decoded array
                ]);
            }
        }
    }

}
