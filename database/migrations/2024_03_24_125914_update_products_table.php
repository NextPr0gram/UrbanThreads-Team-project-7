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
        //? The products table is the table that contains all the products
        Schema::table('products', function (Blueprint $table) {
            // Change original price and selling price from string to decimal
            $table->decimal('original_price', 8, 2)->change();
            $table->decimal('selling_price', 8, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Change original price and selling price from decimal to string
        Schema::table('products', function (Blueprint $table) {
            $table->string('original_price')->change();
            $table->string('selling_price')->change();
        });
    }
};
