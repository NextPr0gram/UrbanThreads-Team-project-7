<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *? Table info:
     *? id: The id of the basket item
     *? basket_id: The id of the basket the basket item belongs to
     *? product_id: The id of the product the basket item belongs to
     *? quantity: The quantity of the product in the basket
     */
    public function up(): void
    {
        Schema::create('basket_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('basket_id')->constrained('baskets')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer ("quantity")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket_items');
        Schema::table('basket_items', function (Blueprint $table) {
            $table->dropForeign(['basket_id']);
            $table->dropForeign(['product_id']);
        });
    }
};
