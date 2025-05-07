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
            $table->text('nombre_hermano', 150); 
            $table->text('edad_hermano');
            $table->text('escolar_ocupacion');
            $table->text('escuela_hermano');
            $table->text('salud_hermano');
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
