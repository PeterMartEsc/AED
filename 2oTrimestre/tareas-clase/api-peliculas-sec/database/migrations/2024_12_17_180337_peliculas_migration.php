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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('titulo', 50)->unique(); // titulo VARCHAR(50) UNIQUE NOT NULL
            $table->year('year'); // year YEAR NOT NULL
            $table->string('descripcion', 255); // descripcion VARCHAR(255) NOT NULL
            $table->string('trailer', 255)->nullable(); // trailer VARCHAR(255), nullable
            $table->string('caratula', 255)->nullable(); // caratula VARCHAR(255), nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
