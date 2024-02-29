<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Delete children from category1
        \DB::table('category1')->whereIn('name', ['children'])->delete();
        
        // Add 'unisex' category
        \DB::table('category1')->insert([
            'name' => 'unisex',
            'slug' => 'unisex',
            'description' => 'Made for men and women',
            'meta_title' => 'Unisex Collection',
            'meta_description' => 'Unisex ',
            'meta_keywords' => 'unisex, gender-neutral, men, women, all, everyone',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category1', function (Blueprint $table) {

        // Remove 'unisex' category
        \DB::table('category1')->where('name', 'unisex')->delete();
        });
    }
};
