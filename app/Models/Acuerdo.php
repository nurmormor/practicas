<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{
    use HasFactory;

    protected $fillable = ['alumno_id', 'empresa_id', 'unidad_id','historico_id', 'objetivo', 'tutor', 'observaciones', 'fecha_inicio', 'fecha_fin'];

    // Relación con el alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    // Relación con la empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    // Relación con la unidad
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function historicoEmpresaUnidad()
{
    return $this->belongsTo(HistoricoEmpresaUnidad::class, 'historico_id');
}
}
