<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     *? Add foreign keys to the basket items table
     *? The foreign keys are:
     *? basket_id: The id of the basket the basket item belongs to
     *? product_id: The id of the product the basket item belongs to
     */
    public function up(): void
    {
        Schema::table('basket_items', function (Blueprint $table) {
            //* Foreign key for basket-id to link the items to the specific basket
            $table->foreign('basket_id')
                ->references('id')
                ->on('baskets')
                ->onDelete('cascade');

            //* Foreign key for product-id to link the product to the specific product in the products table
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('basket_items', function (Blueprint $table) {
            $table->dropForeign('basket_items_basket_id_foreign');
            $table->dropForeign('basket_items_product_id_foreign');
        });
    }
};
