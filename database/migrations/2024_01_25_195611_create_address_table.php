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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); //simplyfied FK added
            //instead of FK for users address is linked to
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address1');
            $table->string('address2')-> nullable();
            $table->string('city');
            $table->string('County');
            $table->string('post_code');
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
