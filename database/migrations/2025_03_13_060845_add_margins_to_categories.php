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
        Schema::table('categories', function (Blueprint $table) {
            $table->decimal('margin_1', 10, 2)->default(0);
            $table->decimal('margin_2', 10, 2)->default(0);
            $table->decimal('margin_3', 10, 2)->default(0);
            $table->decimal('margin_4', 10, 2)->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['margin_1', 'margin_2', 'margin_3', 'margin_4']);
        });
    }
    
};
