<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewC2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category2')->insert([
            [
                'name' => 'Shirts',
                'slug' => 'shirts',
                'description' => 'High-quality shirts for all occasions.',
                'status' => 1,
                'popular' => 0,
                //'image' => assets,
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
                    'popular' => 0,
                    //'image' => assets,
                    'meta_title' => 'Hats Collection',
                    'meta_description' => 'Explore our trendy hat collection.',
                    'meta_keywords' => 'hats, caps, fedora, cap, hat, headwear, head, beanie,
                    beanies, fashion, comfortable',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        ]);
        //
    }
}
