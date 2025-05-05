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
        Schema::create('hermanos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_hermano', 150); 
            $table->string('edad_hermano');
            $table->string('escolar_ocupacion');
            $table->string('escuela_hermano');
            $table->string('salud_hermano');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hermanos');
    }
};
