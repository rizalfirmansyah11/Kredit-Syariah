<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->decimal('margin_percentage', 8, 2)->default(0); // Menambahkan kolom margin
            $table->integer('tenor')->default(12); // Menambahkan kolom tenor
        });

        // Hapus tabel margins
        Schema::dropIfExists('margins');
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('margin_percentage');
            $table->dropColumn('tenor');
        });

        Schema::create('margins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->integer('tenor');
            $table->decimal('margin_percentage', 8, 2);
            $table->timestamps();
        });
    }
};
