<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductVariationSeeder;
use Database\Seeders\DiscountCodeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([CategorySeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([ProductVariationSeeder::class]);
        $this->call([DiscountCodeSeeder::class]);
    }
}
