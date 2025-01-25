<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToAkadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Periksa jika kolom 'status' belum ada
        if (!Schema::hasColumn('akads', 'status')) {
            Schema::table('akads', function (Blueprint $table) {
                $table->string('status')->default('pending'); // Menambahkan kolom status
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('akads', function (Blueprint $table) {
            $table->dropColumn('status'); // Menghapus kolom status saat rollback
        });
    }
}
