<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
        {
            // Insert sample data into the products table
            DB::table('products')->insert([
                'c1_id' => 1,
                'c2_id' => 1,
                'name' => 'Cool Hoodie',
                'description' => 'This is a sample product description.',
                'original_price' => '50.00',
                'selling_price' => '40.00',
                'image' => 'public/assets/uploads/Hoodies/Hoodie 1.jpeg',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => 'Sample Product 1',
                'meta_description' => 'Sample meta description for Product 1',
                'meta_keywords' => 'sample, product, keyword',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
