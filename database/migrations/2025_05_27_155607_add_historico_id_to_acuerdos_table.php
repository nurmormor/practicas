<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('acuerdos', function (Blueprint $table) {
            $table->unsignedBigInteger('historico_id')->nullable()->after('unidad_id');
            $table->foreign('historico_id')->references('id')->on('empresas_alumnos_unidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acuerdos', function (Blueprint $table) {
            //
        });
    }
};
