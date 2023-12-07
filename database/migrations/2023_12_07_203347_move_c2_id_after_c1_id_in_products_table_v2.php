<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoveC2IdAfterC1IdInProductsTableV2 extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove the existing 'c2_id' column
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['c2_id']);
            $table->dropColumn('c2_id');
        });

        // Add 'c2_id' column after 'c1_id' column
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('c2_id')->nullable()->after('c1_id');
            $table->foreign('c2_id')->references('id')->on('category2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse the operations in the 'up' method
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['c2_id']);
            $table->dropColumn('c2_id');
        });
    }
}
