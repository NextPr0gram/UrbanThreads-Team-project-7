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
        Schema::create('category2', function (Blueprint $table) {

            /**
             * * Category 2 is the table that contains these categories:
             * * - Hoodies
             * * - T-shirts
             * * - Jackets
             * * - Trousers
             * * - Accessories
             * ? These would be linked to a product in the products table for showing certain products in certain category pages
            */

            $table->id(); // The primary key of the table and the id of the category
            $table->string('name'); // The name of the category
            $table->string('slug'); // The slug is the alternate name
            $table->longText('description'); // The description of the category
            $table->tinyInteger('status')->default('0'); // The status of the category
            $table->tinyInteger('popular')->default('0'); // The popularity of the category
            $table->string('image')->default(""); // The image of the category
            $table->string('meta_title'); // The title that appears in the browser
            $table->string('meta_description'); // The meta description of the category
            $table->string('meta_keywords'); // The meta keywords of the category

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category2');
    }
};
