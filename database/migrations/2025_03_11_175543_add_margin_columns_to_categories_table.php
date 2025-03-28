<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->decimal('margin_1', 5, 2)->nullable();
            $table->decimal('margin_2', 5, 2)->nullable();
            $table->decimal('margin_3', 5, 2)->nullable();
            $table->decimal('margin_4', 5, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['margin_1', 'margin_2', 'margin_3', 'margin_4']);
        });
    }
};
