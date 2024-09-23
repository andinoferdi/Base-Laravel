<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menu', callback: function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('link_menu');
            $table->string('icon_menu')->nullable();
            $table->boolean('status_menu')->default(1); // 1 for active, 0 for inactive
            $table->integer('urutan_menu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
