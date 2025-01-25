<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultValueToStatusInAkadsTable extends Migration
{
    public function up()
    {
        Schema::table('akads', function (Blueprint $table) {
            $table->string('status')->default('pending')->change();
        });
    }

    public function down()
    {
        Schema::table('akads', function (Blueprint $table) {
            $table->string('status')->nullable(false)->change(); // Atur kembali ke kondisi awal
        });
    }
};
