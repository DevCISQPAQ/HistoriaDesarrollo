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
        Schema::create('seccion2s', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_padre', 150); 
            $table->integer('edad_padre');
            $table->string('empresa_padre');
            $table->string('puesto_padre');
            $table->string('ocupacion_padre');
            $table->string('correo_padre');
            $table->string('redessoc_padre')->nullable();
            $table->string('padre_lateralidad');
            $table->string('nombre_madre');
            $table->integer('edad_madre');
            $table->string('empresa_madre');
            $table->string('puesto_madre');
            $table->string('ocupacion_madre');
            $table->string('correo_madre');
            $table->string('redessoc_madre')->nullable();
            $table->string('madre_lateralidad');
            $table->string('estado_civil');
            $table->string('nombre_conyuge')->nullable();
            $table->integer('edad_conyuge')->nullable();
            $table->string('empresa_conyuge')->nullable();
            $table->string('puesto_conyuge')->nullable();
            $table->string('ocupacion_conyuge')->nullable();
            $table->string('correo_conyuge')->nullable();
            $table->string('redessoc_conyuge')->nullable();
            $table->string('conyuge_lateralidad')->nullable();
            $table->string('noviveconpadres_situtor')->nullable();
            $table->integer('anos_casados');
            $table->integer('numero_hijos');
            $table->string('moti_separa')->nullable();
            $table->string('vive_con')->nullable();
            $table->string('religion');
            $table->string('valores_familia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion2s');
    }
};
