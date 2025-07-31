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
        Schema::create('escolaridad', function (Blueprint $table) {
          $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->text('escolaridades_nivel'); // preescolar, primaria, secundaria
            $table->text('escolaridades_colegio')->nullable();
            $table->text('escolaridades_anios')->nullable();
            $table->text('escolaridades_desempeno')->nullable();
            $table->text('escolaridades_adaptacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escolaridad');
    }
};
