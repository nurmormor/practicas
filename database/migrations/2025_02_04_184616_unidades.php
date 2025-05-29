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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental
            $table->string('nombre_grado');
            $table->enum('turno', ['diurno', 'tarde']);
            $table->integer('curso');
            $table->boolean('aula_bilingue');
            $table->string('alias')->unique(); // Nuevo campo alias
            $table->foreignId('profesor_id')->nullable()->constrained('profesores')->onDelete('set null');
            $table->timestamps();

            // Evita duplicados en la combinación de estas columnas
            $table->unique(['nombre_grado', 'turno', 'curso', 'aula_bilingue']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');

    }
};
