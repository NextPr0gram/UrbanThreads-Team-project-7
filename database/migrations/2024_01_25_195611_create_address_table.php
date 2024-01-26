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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            //! Removed foreign key as an address can be linked to both a user and an order
            // $table->foreignId('user_id')->constrained();
            $table->string('address_line_1');
            $table->string('address_line_2')-> nullable();
            $table->string('city');
            $table->string('county');
            $table->string('postcode');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
