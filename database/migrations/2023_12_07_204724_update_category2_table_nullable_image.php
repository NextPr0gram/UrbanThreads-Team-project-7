<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategory2TableNullableImage extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('category2', function (Blueprint $table) {
            // Modify 'image' column to allow NULL
            $table->string('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category2', function (Blueprint $table) {
            // Reverse the change, making 'image' non-nullable again
            $table->string('image')->default("")->change();
        });
    }
}
