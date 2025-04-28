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
        Schema::create('seccion4s', function (Blueprint $table) {
            $table->id();
            $table->string('califica_adaptacion');
            $table->string('califica_adaptacion_porq');
            $table->string('relacion_familia_madre');
            $table->string('relacion_familia_padre');
            $table->string('relacion_familia_hermanos');
            $table->string('diferencia_estilos');
            $table->string('responde_desobede');
            $table->string('sanciones_casa');
            $table->string('sanciones_conductas');
            $table->string('docil_desafiante');
            $table->string('evento_traumatico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion4s');
    }
};
