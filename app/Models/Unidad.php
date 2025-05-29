<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidades';

    protected $fillable = [
        'nombre_grado',
        'turno',
        'curso',
        'aula_bilingue',
        'alias'
    ];

    /**
     * Relación muchos a muchos con Alumnos
     */
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'empresas_alumnos_unidades', 'unidad_id', 'alumno_id');
    }

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'empresas_alumnos_unidades', 'unidad_id', 'empresa_id');
    }

    /**
     * Relación uno a muchos con Profesores
     */
    public function profesores(): BelongsToMany {
        return $this->belongsToMany(Profesor::class, 'profesor_unidad')->withTimestamps();
    }

    public function historicoEmpresaUnidad(): HasMany {
        return $this->hasMany(HistoricoEmpresaUnidad::class);
    }

}
