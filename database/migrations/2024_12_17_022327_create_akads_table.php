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
    Schema::create('akads', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('nik');
        $table->text('alamat');
        $table->string('telepon');
        $table->decimal('jumlah_kredit', 15, 2);
        $table->integer('jangka_waktu');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akads');
    }
};
