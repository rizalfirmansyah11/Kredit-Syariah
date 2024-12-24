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
        Schema::table('akads', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change(); // Membuat kolom user_id boleh null
        });
    }
    
    public function down()
    {
        Schema::table('akads', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Kembalikan ke kondisi awal
        });
    }
};
