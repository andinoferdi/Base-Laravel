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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string(column: 'link_menu');
            $table->string(column: 'icon_menu')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('create_by');
            $table->timestamps();
            $table->boolean('delete_mark')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
