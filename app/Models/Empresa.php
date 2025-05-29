<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'sector', 'direccion', 'telefono', 'email_contacto'
    ];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'empresas_alumnos_unidades', 'empresa_id', 'alumno_id');
    }

    public function unidades()
    {
        return $this->belongsToMany(Unidad::class, 'empresas_alumnos_unidades', 'empresa_id', 'unidad_id');
    }

    public function acuerdos()
    {
        return $this->hasMany(Acuerdo::class);
    }
}
