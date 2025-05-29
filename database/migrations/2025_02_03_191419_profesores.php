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
        Schema::create('profesores', function (Blueprint $table) {
            $table->id(); // Esto crea una columna 'id' que es la clave primaria
            $table->string('nombre'); // Nombre del profesor
            $table->string('apellidos'); // Apellidos del profesor
            $table->string('email')->unique(); // Email del profesor, único
            $table->string('telefono')->nullable(); // Teléfono del profesor (opcional)
            $table->text('direccion')->nullable(); // Dirección del profesor (opcional)
            $table->timestamps(); // timestamps: created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
