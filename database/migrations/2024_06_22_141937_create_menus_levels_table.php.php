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
            $table->id(); // Auto-increment ID
            $table->string('level', 50); // Level name
            $table->string('create_by', 30); // Creator
            $table->timestamps(); // Create & update timestamps
            $table->boolean('delete_mark')->default(false); // Soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('menu_levels');
    }
};
