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
        Schema::create('products', function (Blueprint $table) {

            //? The products table is the table that contains all the products

            $table->id(); //? The primary key of the table and the id of the product
            $table->string('name'); //? The name of the product
            $table->longText('description'); //? The description of the product
            $table->string('original_price'); //? The original price of the product
            $table->string('selling_price'); //? The selling price of the product (discounted price)
            $table->string('image'); //? The link to the image of the product
            $table->string('qty'); //? The quantity of the product available
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('trending')->default('0'); //? Flag to indicate if the product is trending
            $table->mediumText('meta_title'); //? The title that appears in the browser (for the page of the specific product)
            $table->mediumText('meta_description');
            $table->mediumText('meta_keywords');
            $table->timestamps();

            // $table->foreign('c1_id')->references('id')->on('category1'); //* The foreign key of the category1 table
           // $table->foreign('c2_id')->references('id')->on('category2'); //* The foreign key of the category2 table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
