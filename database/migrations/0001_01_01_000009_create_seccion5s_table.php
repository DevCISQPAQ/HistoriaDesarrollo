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
        Schema::create('seccion5s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->integer('total_embarazo');
            $table->string('experi_embarazo');
            $table->string('mencione_embaenfe');
            $table->string('tiempo_gestacion');
            $table->string('tipo_parto');
            $table->string('lloro');
            $table->string('incubadora');
            $table->string('apgar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion5s');
    }
};
