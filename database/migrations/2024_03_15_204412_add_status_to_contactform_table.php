<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contactform', function (Blueprint $table) {
            $table->enum('status', ['New', 'In Process', 'Processed'])->default('New');
        });
    }

    public function down()
    {
        Schema::table('contactform', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
