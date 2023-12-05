<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
        {
            // Insert sample data into the categories table
            DB::table('category2')->insert([
                [
                    'name' => 'Hoodies',
                    'slug' => 'hoodies',
                    'description' => 'High-quality hoodies for all occasions.',
                    'status' => 1,
                    'popular' => 1,
                    //'image' => 
                    'meta_title' => 'Hoodies Collection',
                    'meta_description' => 'Explore our trendy hoodie collection.',
                    'meta_keywords' => 'hoodies, fashion, comfortable',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'T-shirts',
                    'slug' => 't-shirts',
                    'description' => 'Stylish and comfortable T-shirts for every style.',
                    'status' => 1,
                    'popular' => 1,
                    //'image' => 
                    'meta_title' => 'T-shirts Collection',
                    'meta_description' => 'Discover our diverse T-shirt collection.',
                    'meta_keywords' => 't-shirts, casual, fashion',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Jackets',
                    'slug' => 'jackets',
                    'description' => 'Stay warm and stylish with our jacket collection.',
                    'status' => 1,
                    'popular' => 1,
                    //'image' => 
                    'meta_title' => 'Jackets Collection',
                    'meta_description' => 'Explore our latest jacket styles.',
                    'meta_keywords' => 'jackets, outerwear, fashion',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Trousers',
                    'slug' => 'trousers',
                    'description' => 'Comfortable and trendy trousers for any occasion.',
                    'status' => 1,
                    'popular' => 0,
                    //'image' => 
                    'meta_title' => 'Trousers Collection',
                    'meta_description' => 'Discover our stylish trouser options.',
                    'meta_keywords' => 'trousers, pants, fashion',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Accessories',
                    'slug' => 'accessories',
                    'description' => 'Enhance your style with our fashionable accessories.',
                    'status' => 1,
                    'popular' => 0,
                    //'image' => 
                    'meta_title' => 'Accessories Collection',
                    'meta_description' => 'Complete your look with our stylish accessories.',
                    'meta_keywords' => 'accessories, fashion, style',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ]);
            }
            
}
