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
        Schema::create('respuestas_historia_desarrollo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('historia_desarrollo_id')->constrained('historia_desarrollo')->onDelete('cascade');
            $table->string('seccion', 50);
            $table->text('pregunta');
            $table->text('respuesta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas_historia_desarrollo');
    }
};
