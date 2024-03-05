<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Seeds the categories tables (category1 and category2)
     */
    public function run(): void
    {
        //* Insert gender categories into the category1 table
        DB::table('category1')->insert([
            [
                'name' => 'Men',
                'slug' => 'men',
                'description' => 'Made for men.',

                'meta_title' => 'Mens Collection',
                'meta_description' => 'Explore our trendy mens collection.',
                'meta_keywords' => 'man, men, adult, guy, male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women',
                'slug' => 'women',
                'description' => 'Made for women.',

                'meta_title' => 'Womens Collection',
                'meta_description' => 'Explore our collection for women',
                'meta_keywords' => 'women, woman, female, adult',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Children',
                'slug' => 'children',
                'description' => 'Made for children.',

                'meta_title' => 'childrens Collection',
                'meta_description' => 'Explore our collection for children',
                'meta_keywords' => 'children, child, kids, girl, girls, boy, boys',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //* Insert product categories into the category2 table
        DB::table('category2')->insert([
            [
                'name' => 'Hoodies',
                'slug' => 'hoodies',
                'description' => 'High-quality hoodies for all occasions.',
                'status' => 1,
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
                'meta_title' => 'Accessories Collection',
                'meta_description' => 'Complete your look with our stylish accessories.',
                'meta_keywords' => 'accessories, fashion, style',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shirts',
                'slug' => 'shirts',
                'description' => 'High-quality shirts for all occasions.',
                'status' => 1,
                'meta_title' => 'Shirts Collection',
                'meta_description' => 'Explore our trendy Shirts collection.',
                'meta_keywords' => 'top, shirts, shirt, hot, trendy, fashion, comfortable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hats',
                'slug' => 'hats',
                'description' => 'High-quality hats for all occasions.',
                'status' => 1,
                'meta_title' => 'Hats Collection',
                'meta_description' => 'Explore our trendy hat collection.',
                'meta_keywords' => 'hats, caps, fedora, cap, hat, headwear, head, beanie,
                    beanies, fashion, comfortable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
