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
        $table->text('riwayat')->nullable()->after('status'); // Kolom untuk menyimpan riwayat
    });
}

public function down()
{
    Schema::table('akads', function (Blueprint $table) {
        $table->dropColumn('riwayat');
    });
}

};
