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
        Schema::create('menu_levels', function (Blueprint $table) {
            $table->string('id_level', 30)->primary();
            $table->string('level', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_levels');
    }
};
