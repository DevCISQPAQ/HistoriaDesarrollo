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
        Schema::create('seccion9s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->text('suenonino');
            $table->string('horadecama');
            $table->string('horadespierta');
            $table->string('dusiesta');
            $table->string('horasiesta')->nullable();
            $table->string('cohabitacion');
            $table->string('conquien')->nullable();
            $table->string('cocama');
            $table->string('edad_dupapa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion9s');
    }
};
