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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo', 150); // Aquí va nombre completo
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento');
            $table->enum('genero', ['masculino', 'femenino']);
            $table->integer('edad');
            $table->string('grado_escolar');
            $table->string('direccion');
            $table->string('cp', 5);
            $table->string('telefono');
            $table->string('escuela_procedencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
