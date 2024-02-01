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
        Schema::table('orders', function (Blueprint $table) {
            //* Foreign key for address-id to link the order to the address
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            //* Foreign key for address-id to link the order to the address
            $table->foreign('address_id')
            ->references('id')
            ->on('addresses')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('orders', function (Blueprint $table) {
            // Reverse the changes made in the up method
            $table->dropForeign('orders_address_id_foreign');
            $table->dropForeign('orders_user_id_foreign');
        });
    }
};
