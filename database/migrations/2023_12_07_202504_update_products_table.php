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
        // 1. Add 'c1_id' after 'id'
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('c1_id')->nullable()->after('id');
            $table->foreign('c1_id')->references('id')->on('category1');
        });

        // 2. Add 'c2_id' before 'name'
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('c2_id')->nullable()->before('c1_id');
            $table->foreign('c2_id')->references('id')->on('category2');
        });

        // 3. Add slug column after 'name
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Remove 'c1_id' column
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['c1_id']);
            $table->dropColumn('c1_id');
        });

        // 2. Remove 'c2_id' column
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['c2_id']);
            $table->dropColumn('c2_id');
        });

        // 3. Remove 'slug' column
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
