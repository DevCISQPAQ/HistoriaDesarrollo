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
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->integer('seccion2_id')->nullable()->constrained('seccion2s')->onDelete('set null');
            $table->integer('seccion3_id')->nullable()->constrained('seccion3s')->onDelete('set null');
            $table->integer('seccion4_id')->nullable()->constrained('seccion4s')->onDelete('set null');
            $table->integer('seccion5_id')->nullable()->constrained('seccion5s')->onDelete('set null');
            $table->integer('seccion6_id')->nullable()->constrained('seccion6s')->onDelete('set null');
            $table->integer('seccion7_id')->nullable()->constrained('seccion7s')->onDelete('set null');
            $table->integer('seccion8_id')->nullable()->constrained('seccion8s')->onDelete('set null');
            $table->integer('seccion9_id')->nullable()->constrained('seccion9s')->onDelete('set null');
            $table->integer('seccion10_id')->nullable()->constrained('seccion10s')->onDelete('set null');
            $table->integer('seccion11_id')->nullable()->constrained('seccion11s')->onDelete('set null');
            $table->integer('seccion12_id')->nullable()->constrained('seccion12s')->onDelete('set null');
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
