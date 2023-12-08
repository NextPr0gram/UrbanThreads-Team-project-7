<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * T-shirts to shirts
     */
    public function up(): void
    {
        // Update existing records in the categories table
        DB::table('category2')->where('slug', 't-shirts')->update([
            'name' => 'Shirts',
            'slug' => 'shirts',
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 
    }
};
