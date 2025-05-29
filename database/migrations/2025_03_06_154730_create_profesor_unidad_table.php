<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('profesor_unidad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesor_id')->constrained('profesores')->onDelete('cascade');
            $table->foreignId('unidad_id')->constrained('unidades')->onDelete('cascade');
            $table->timestamps();
        });

        // Eliminar la columna profesor_id de unidades
        Schema::table('unidades', function (Blueprint $table) {
            $table->dropForeign(['profesor_id']);
            $table->dropColumn('profesor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        // Restaurar la columna profesor_id si se hace rollback
        Schema::table('unidades', function (Blueprint $table) {
            $table->foreignId('profesor_id')->nullable()->constrained('profesores')->onDelete('set null');
        });

        Schema::dropIfExists('profesor_unidad');
    }
};

