<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variations')->insert([
            [
                'product_id' => 1,
                'size' => 'S',
                'stock' => 10,
            ],
            [
                'product_id' => 1,
                'size' => 'M',
                'stock' => 10,
            ],
            [
                'product_id' => 1,
                'size' => 'L',
                'stock' => 10,
            ],
            [
                'product_id' => 1,
                'size' => 'XL',
                'stock' => 10,
            ],
            [
                'product_id' => 2,
                'size' => 'S',
                'stock' => 10,
            ],
            [
                'product_id' => 2,
                'size' => 'M',
                'stock' => 10,
            ],
            [
                'product_id' => 2,
                'size' => 'L',
                'stock' => 10,
            ],
            [
                'product_id' => 2,
                'size' => 'XL',
                'stock' => 10,
            ],
            [
                'product_id' => 3,
                'size' => 'S',
                'stock' => 10,
            ],
            [
                'product_id' => 3,
                'size' => 'M',
                'stock' => 10,
            ],
            [
                'product_id' => 3,
                'size' => 'L',
                'stock' => 10,
            ],
            [
                'product_id' => 3,
                'size' => 'XL',
                'stock' => 10,
            ],
        ]);
    }
}
