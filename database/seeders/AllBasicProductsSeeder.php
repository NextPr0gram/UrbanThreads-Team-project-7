<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllBasicProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * To add all basic products for MVP
     * made by @Neha - to be finished by @KJ
     *
     */

     // TODO - add 5 products for each category (hoodies, tshirts, jackets, trousers, accessories)
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
            'c1_id' => 1, //MALE PRODUCT
            'c2_id' => 1, //Hoodie
            'name' => 'Cool Hoodie 2',
            'description' => 'This is a sample product description.',
            'original_price' => '50.00',
            'selling_price' => '40.00',
            'image' => '',
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
            'name' => '',
            'description' => '',
            'original_price' => '50.00',
            'selling_price' => '40.00',
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
            'name' => '',
            'description' => '',
            'original_price' => '50.00',
            'selling_price' => '40.00',
            'image' => '',
            'qty' => 100,
            'status' => 1,
            'trending' => 1,
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'created_at' => now(),
            'updated_at' => now(),
    ]]);
    }
}
