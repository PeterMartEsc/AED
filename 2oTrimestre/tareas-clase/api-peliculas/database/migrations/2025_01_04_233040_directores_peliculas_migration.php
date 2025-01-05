<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('directores_peliculas', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('pelicula_id')->references('id')->on('peliculas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('director_id')->references('id')->on('directores')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['director_id', 'pelicula_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directores_peliculas');
    }
};
