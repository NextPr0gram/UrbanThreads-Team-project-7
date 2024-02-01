<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     *? Add foreign keys to the order items table
     *? The foreign keys are:
     *? order_id: The id of the order the order item belongs to
     *? product_id: The id of the product the order item belongs to
     */
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            //* Foreign key for order-id to link the items to the specific order
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
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
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign('order_items_order_id_foreign');
            $table->dropForeign('order_items_product_id_foreign');
        });
    }
};
