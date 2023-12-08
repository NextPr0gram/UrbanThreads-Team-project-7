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
        Schema::create('category1', function (Blueprint $table) {
            /**
             * * Category 1 is the table that contains these categories:
             * * - Men
             * * - Women
             * * - Kids
             * ? These could be linked to a product in the products table for filtering purposes
            */

            $table->id();
            $table->string('name'); //? Category name
            $table->string('slug');
            $table->longText('description'); //? Category description
            $table->string('image')->default(""); //? Category image
            $table->string('meta_title'); //? Category meta title
            $table->string('meta_description'); //? Category meta description
            $table->string('meta_keywords'); //? Category meta keywords
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category1');
    }
};
