<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->timestamps();

            // No tenemos la relacion con unidad_id proque esto ya lo manejamos con la migracion de alumno_unidad_table
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};



