<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'profesores'; // Aquí indicamos que la tabla es 'profesores', no 'professors'
    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono', 'direccion'];

    public function unidades(): BelongsToMany {
        return $this->belongsToMany(Unidad::class, 'profesor_unidad')->withTimestamps();
    }
}
