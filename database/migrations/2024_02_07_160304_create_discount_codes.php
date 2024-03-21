<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * ? Discount codes table
     * code: unique code
     * type: fixed or percentage
     * value: fixed value
     * percentage: percentage value (as a decimal)
     * uses: number of times the code has been used
     * max_uses: maximum number of times the code can be used
     * valid_from: start date
     * valid_to: end date
     */
    public function up(): void
    {
        Schema::create('discount_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type', ['fixed', 'percentage']);
            $table->decimal('value')->nullable();
            $table->integer('uses')->default(0);
            $table->integer('max_uses')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_codes');
    }
};
