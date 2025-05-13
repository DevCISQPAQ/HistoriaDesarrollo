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
        Schema::create('seccion3s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            // $table->foreignId('hermano_id')->constrained('hermanos')->nullable()->onDelete('cascade');
            $table->string('idioma_casa');
            $table->string('personas_casa');
            $table->string('quienes_casa')->nullable();
            $table->string('siadopcion');
            $table->integer('padre_edadadopt')->nullable();
            $table->integer('madre_edadadopt')->nullable();
            $table->string('hijo_edadadopt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion3s');
    }
};
