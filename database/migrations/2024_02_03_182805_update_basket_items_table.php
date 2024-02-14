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
        Schema::table('basket_items', function (Blueprint $table) {
            $table->foreignId('variation_id')->nullable()->constrained('product_variations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('basket_items', function (Blueprint $table) {
            $table->dropForeign(['variation_id']);
        });
    }
};
