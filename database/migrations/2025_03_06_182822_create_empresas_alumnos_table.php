<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasAlumnosTable extends Migration
{
    public function up(): void
    {
        Schema::create('empresas_alumnos_unidades', function (Blueprint $table) {
            $table->id();
            //forma de hacer la foreign key correcta (no constrained):
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')->on('alumnos')->references('id');
            //al principio cuando cree ele alumno, estara sin empresa hasta que se lo asigne
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->on('empresas')->references('id');
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->on('unidades')->references('id');
            $table->year('anio_inicio');
            $table->year('anio_fin');
            // Evitar duplicados: Un mismo alumno no puede estar en la misma unidad en el mismo curso
            //poner nombre a la columna de unicidad para evitar problemas con el tope de caracteres. Unique recibe el array, el nombre.
            $table->unique(['alumno_id', 'unidad_id', 'empresa_id', 'anio_inicio', 'anio_fin'],'alumno_unidad_empresa');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas_alumnos_unidades');
    }
}

