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
        Schema::table('users', function (Blueprint $table) {
        //added to users as we do not anticipate users to have more than one contact details
        $table->string('mobile_number')->nullable();
        //contact option added for updates option + should put tick box option on site
        $table->boolean('contact_email')->default(0);//0 is false
        $table->boolean('contact_text')->default(0);
        //if admin, please change on database manually
        $table->boolean('admin')->default(0);
        //* Foreign key for address-id to link the user to the address
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
        Schema::table('users', function (Blueprint $table) {
            // Reverse the changes made in the up method
            $table->dropColumn('mobile_number');
            $table->dropColumn('contact_email');
            $table->dropColumn('contact_text');
            $table->dropColumn('admin');
            $table->dropForeign('users_address_id_foreign');
        });
    }
};
