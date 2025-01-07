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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nombre', 30); // nombre VARCHAR(30) NOT NULL
            $table->string('email', 100)->unique(); // email VARCHAR(100) NOT NULL
            $table->string('password', 100); // password VARCHAR(100) NOT NULL
            $table->string('rol', 20); // rol VARCHAR(20) NOT NULL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
