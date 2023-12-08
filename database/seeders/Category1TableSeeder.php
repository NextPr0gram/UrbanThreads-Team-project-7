<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
