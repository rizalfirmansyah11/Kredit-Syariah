<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddFotoBendaToAkadsTable extends Migration
{
    public function up()
    {
        Schema::table('akads', function (Blueprint $table) {
            $table->string('foto_benda')->nullable()->after('jangka_waktu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('akads', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    
    }
};
