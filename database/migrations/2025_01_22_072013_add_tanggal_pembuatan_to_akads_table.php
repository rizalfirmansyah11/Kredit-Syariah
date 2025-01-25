<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalPembuatanToAkadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('akads', function (Blueprint $table) {
            $table->date('tanggal_pembuatan')->after('id')->nullable(); // Tambahkan kolom tanggal_pembuatan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('akads', function (Blueprint $table) {
            $table->dropColumn('tanggal_pembuatan'); // Menghapus kolom jika rollback
        });
    }
}
