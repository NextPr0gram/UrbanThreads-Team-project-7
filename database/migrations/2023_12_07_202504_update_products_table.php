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
        // Foreign key for c1_id to link the product to the specific category1 in the category1 table
        // Foreign key for c2_id to link the product to the specific category2 in the category2 table
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('c1_id')->references('id')->on('category1')->onDelete('cascade');
            $table->foreign('c2_id')->references('id')->on('category2')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Remove 'c1_id' column
        // 2. Remove 'c2_id' column
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['c1_id']);
            $table->dropForeign(['c2_id']);
        });
    }
};
