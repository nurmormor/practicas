<?php


namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $alumno_id
 * @property int $empresa_id
 * @property int $unidad_id
 * @property string $anio_inicio
 * @property string $anio_fin
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Alumno $alumno
 * @property Empresa $empresa
 * @property Unidad $unidad
 */

class HistoricoEmpresaUnidad extends Model
{
    use HasFactory;
    protected $table = "empresas_alumnos_unidades";
    protected $fillable = ['alumno_id', 'empresa_id', 'unidad_id', 'anio_inicio', 'anio_fin', 'created_at', 'updated_at'];
    protected $casts = [
        'alumno_id' => "integer",
        'empresa_id' => "integer",
        'unidad_id' => "integer",
        'anio_inicio' => "string",
        'anio_fin' => "string",
        'created_at' => "timestamp",
        'updated_at' => "timestamp"
    ];

    // definimos las relaciones con los modelos de Alumno, Empresa, Unidad y Acuerdo
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }
    public function acuerdos()
    {
        return $this->hasMany(Acuerdo::class, 'historico_id');
    }
}
