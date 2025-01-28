<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = ["electronics", "jewelery", "men's clothing", "women's clothing"];
        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
