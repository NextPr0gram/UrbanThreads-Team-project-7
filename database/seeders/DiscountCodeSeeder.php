<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discount_codes')->insert([
            [
                'code' => 'WELCOME',
                'type' => 'fixed',
                'value' => 10,
                'percentage' => 0,
                'uses' => 0,
                'max_uses' => 100,
                'valid_from' => now(),
                'valid_to' => now()->addDays(7),
            ],
            [
                'code' => 'SUMMER',
                'type' => 'percentage',
                'value' => 0,
                'percentage' => 0.1, // 10%
                'uses' => 0,
                'max_uses' => 100,
                'valid_from' => now(),
                'valid_to' => now()->addMonths(3),
            ],
            [
                'code' => 'WINTER',
                'type' => 'percentage',
                'value' => 0,
                'percentage' => 0.2, // 20%
                'uses' => 0,
                'max_uses' => 100,
                'valid_from' => now(),
                'valid_to' => now()->addMonths(3),
            ]
        ]);
    }
}
