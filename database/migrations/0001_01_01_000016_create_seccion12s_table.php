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
        Schema::create('seccion12s', function (Blueprint $table) {
            $table->id();
            $table->string('reaccprimer');
            $table->string('dificumateria');
            $table->string('nivel_lectura')->nullable();
            $table->string('nivel_escritura')->nullable();
            $table->string('ha_repetido');
            $table->string('cual_escuela')->nullable();
            $table->string('porque_escuela')->nullable();
            $table->string('puedeperiodolarg');
            $table->string('conductaambito');
            $table->string('hay_dific');
            $table->string('cual_letra')->nullable();
            $table->string('maneingles');
            $table->string('cali_desemp');
            $table->string('porq_desemp');
            $table->string('motivoscamb');
            $table->string('razoning');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion12s');
    }
};
