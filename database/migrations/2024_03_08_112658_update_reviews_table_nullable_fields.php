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
        //Update username and title to be nullable as not in use in this version
        //May be scrapped in final
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('user_name')->nullable()->change(); // Making user_name nullable
            $table->string('title')->nullable()->change(); // Making title nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //just to reverse
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('user_name')->nullable(false)->change(); // Revert user_name to not nullable
            $table->string('title')->nullable(false)->change(); // Revert title to not nullable
        });
    }
};
