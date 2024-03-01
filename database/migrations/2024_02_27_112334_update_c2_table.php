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
            Schema::table('category2', function (Blueprint $table) {
                // Drop the 'popular' column
                $table->dropColumn('popular');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category2', function (Blueprint $table) {
            // Add back the 'popular' column
            $table->tinyInteger('popular')->default('0');
        });
    }
};
