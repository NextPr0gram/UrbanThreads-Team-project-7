<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *? Table info:
     *? id: The id of the order
     *? user_id: The id of the user the order belongs to
     *? total: The total price of the order
     *? status: The status of the order, set to "placed" by default
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total', 8, 2)->default(0);
            $table->enum('status', ['placed', 'processing', 'dispatched', 'delivered'])->default('placed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
