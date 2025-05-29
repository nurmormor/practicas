<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono'];

    /**
     * Relación muchos a muchos con Unidades
     */
    public function unidades()
    {
        return $this->belongsToMany(Unidad::class, 'empresas_alumnos_unidades','alumno_id', 'unidad_id')
        ->withPivot(['anio_inicio', 'anio_fin']);
    }

    /**
     * Relación uno a muchos con Acuerdos
     */
    public function acuerdos()
    {
        return $this->hasMany(Acuerdo::class);
    }

    /**
     * Relación muchos a muchos con Empresas a través de Acuerdos
     */
    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'empresas_alumnos_unidades','alumno_id', 'empresa_id');

    }

    public function historicoEmpresaUnidad()
    {
        return $this->HasMany(HistoricoEmpresaUnidad::class);
    }

}
