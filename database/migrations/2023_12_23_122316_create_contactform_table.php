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
        Schema::create('contactform', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('order_id')->nullable(); // Keep nullable if needed
            $table->string('subject')->nullable();
            $table->text('message');
            $table->timestamps();
        
            // Foreign key
            //did not add
           // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactform');
    }
};
