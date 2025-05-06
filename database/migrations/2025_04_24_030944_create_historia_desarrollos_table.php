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
        Schema::create('historia_desarrollos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->nullable()->onDelete('cascade');
            $table->integer('seccion2_id')->nullable();
            $table->integer('seccion3_id')->nullable();
            $table->integer('seccion4_id')->nullable();
            $table->integer('seccion5_id')->nullable();
            $table->integer('seccion6_id')->nullable();
            $table->integer('seccion7_id')->nullable();
            $table->integer('seccion8_id')->nullable();
            $table->integer('seccion9_id')->nullable();
            $table->integer('seccion10_id')->nullable();
            $table->integer('seccion11_id')->nullable();
            $table->integer('seccion12_id')->nullable();
            $table->string('acepto_terminos')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('historia_desarrollos');
    }
};
