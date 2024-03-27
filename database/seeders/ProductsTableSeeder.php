<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Ingredient;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'product_name' => 'Product 1',
            'price' => 10.99,
            'product_code' => 'PRD001',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Add more product data as needed.
    }
}
