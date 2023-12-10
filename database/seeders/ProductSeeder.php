<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the seeder for the products table
     * ? 5 categories
     * ? 5 products per category
     */
    public function run(): void
    {
        DB::table('products')->insert([
            //* Hoodies
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 1, //Hoodie
                'name' => 'Cool Hoodie',
                'slug' => 'cool-hoodie',
                'description' => 'This is a cool hoodie.',
                'original_price' => '50.00',
                'selling_price' => '40.00',
                'image' => '/images/product-images/hoodies/comfy-hoodie.png',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => 'Sample Product 1',
                'meta_description' => 'Sample meta description for Product 1',
                'meta_keywords' => 'sample, product, keyword',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 1, //Hoodie
                'name' => 'Comfy Hoodie',
                'image' => '',
                'slug' => 'comfy-hoodie',
                'description' => 'This is a comfy hoodie with fleece.',
                'original_price' => '75.00',
                'selling_price' => '55.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 1, //Hoodie
                'name' => 'Sporty Hoodie',
                'image' => '',
                'slug' => 'sporty-hoodie',
                'description' => 'This is a sporty hoodie.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 1, //Hoodie
                'name' => 'Oversized Hoodie',
                'image' => '',
                'slug' => 'oversized-hoodie',
                'description' => 'This is a oversized hoodie.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 1, //Hoodie
                'name' => 'Slim-fit Hoodie',
                'image' => '',
                'slug' => 'slim-fit-hoodie',
                'description' => 'This is a slim-fit hoodie.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 1, //Hoodie
                'name' => 'Winter Hoodie',
                'image' => '',
                'slug' => 'winter-hoodie',
                'description' => 'This is a winter hoodie.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //* T-shirts
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 2, //T-shirt
                'name' => 'Normal T-shirt',
                'image' => '',
                'slug' => 'normal-t-shirt',
                'description' => 'This is a normal-t-shirt.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 2, //T-shirt
                'name' => 'Boxy T-shirt',
                'image' => '',
                'slug' => 'boxy-t-shirt',
                'description' => 'This is a boxy-t-shirt.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 2, //T-shirt
                'name' => 'Slim-fit T-shirt',
                'image' => '',
                'slug' => 'slim-fit-t-shirt',
                'description' => 'This is a slim-fit t-shirt.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 2, //T-shirt
                'name' => 'Oversized T-shirt',
                'image' => '',
                'slug' => 'oversized-t-shirt',
                'description' => 'This is a oversized t-shirt.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 2, //T-shirt
                'name' => 'Baggy T-shirt',
                'image' => '',
                'slug' => 'baggy-t-shirt',
                'description' => 'This is a baggy t-shirt.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 2, //T-shirt
                'name' => 'V-neck T-shirt',
                'image' => '',
                'slug' => 'v-neck-t-shirt',
                'description' => 'This is a V-neck t-shirt.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 2, //T-shirt
                'name' => 'Sports T-shirt',
                'image' => '',
                'slug' => 'sports-t-shirt',
                'description' => 'This is a sports t-shirt.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //* Jackets
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 3, //Jackets
                'name' => 'Denim Jacket',
                'image' => '',
                'slug' => 'demin-jacket',
                'description' => 'This is a Denim Jacket.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 3, //Jackets
                'name' => 'Leather Jacket',
                'image' => '',
                'slug' => 'leather-jacket',
                'description' => 'This is a Leather Jacket.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 3, //Jackets
                'name' => 'Gilet',
                'image' => '',
                'slug' => 'gilet',
                'description' => 'This is a gilet.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 3, //Jackets
                'name' => 'Puffer Jacket',
                'image' => '',
                'slug' => 'puffer-jacket',
                'description' => 'This is a Puffer Jacket.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 2, //FEMALE PRODUCT
                'c2_id' => 3, //Jackets
                'name' => 'Cropped Jacket',
                'image' => '',
                'slug' => 'cropped-jacket',
                'description' => 'This is a Cropped Jacket.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //* Trousers
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 4, //Trousers
                'name' => 'Straight-leg Trousers',
                'image' => '',
                'slug' => 'straight-leg-trousers',
                'description' => 'These are Straight-leg Trousers.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 4, //Trousers
                'name' => 'Joggers',
                'image' => '',
                'slug' => 'joggers',
                'description' => 'These are Joggers.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 4, //Trousers
                'name' => 'Jeans',
                'image' => '',
                'slug' => 'jeans',
                'description' => 'These are Jeans.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 4, //Trousers
                'name' => 'Shorts',
                'image' => '',
                'slug' => 'shorts',
                'description' => 'These are shorts.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 4, //Trousers
                'name' => 'Cargos',
                'image' => '',
                'slug' => 'cargos',
                'description' => 'These are Cargos.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 4, //Trousers
                'name' => 'Chinos',
                'image' => '',
                'slug' => 'chinos',
                'description' => 'These are Chinos.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 4, //Trousers
                'name' => 'Khakis',
                'image' => '',
                'slug' => 'khakis',
                'description' => 'These are Khakis.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //* Accessories
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 5, //Accessories
                'name' => 'Beanie Hat',
                'image' => '',
                'slug' => 'beanie-hat',
                'description' => 'This is a beanie hat.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 5, //Accessories
                'name' => 'Scarf',
                'image' => '',
                'slug' => 'scarf',
                'description' => 'This is a scarf.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 5, //Accessories
                'name' => 'Baseball Cap',
                'image' => '',
                'slug' => 'baseball-cap',
                'description' => 'This is a baseball cap.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 5, //Accessories
                'name' => 'Aviator Sunglasses',
                'image' => '',
                'slug' => 'aviator-sunglasses',
                'description' => 'These are Aviator Sunglasses.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c1_id' => 1, //MALE PRODUCT
                'c2_id' => 5, //Accessories
                'name' => 'Socks',
                'image' => '',
                'slug' => 'socks',
                'description' => 'Pair of socks.',
                'original_price' => '45.00',
                'selling_price' => '30.00',
                'image' => '',
                'qty' => 100,
                'status' => 1,
                'trending' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
