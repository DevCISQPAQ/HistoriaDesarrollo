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
        Schema::create('seccion7s', function (Blueprint $table) {
            $table->id();
            $table->string('desarrollo_motor');
            $table->integer('edad_gate');
            $table->integer('edad_cami');
            $table->string('dies_zurdhijo');
            $table->string('prac_deporte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion7s');
    }
};
