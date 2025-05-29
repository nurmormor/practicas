<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidad;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Carbon;

class UnidadController extends Controller
{
    // Mostrar todas las unidades con sus profesores
    public function index(Request $request)
    {
        $request->validate([
            'anio_inicio' => 'sometimes|string',
            'anio_fin' => 'sometimes|string',
        ]);

        if(!$request->has('anio_inicio') || !$request->has('anio_fin')){
            list($anio_inicio, $anio_fin)=$this->getFechas();

        }else{
            $anio_inicio=$request->get('anio_inicio');
            $anio_fin=$request->get('anio_fin');
        }

        $unidades = Unidad::with('profesores')->whereHas('historicoEmpresaUnidad', function (EloquentBuilder $query) use($anio_inicio, $anio_fin){
            $query->where('anio_inicio','>=', $anio_inicio)->where('anio_fin','<=', $anio_fin);
        })->get();

        return view('dashboard', [
            'unidades' => $unidades,
            'anio_inicio'=>$anio_inicio,
            'anio_fin'=>$anio_fin
        ]);

    }

    // Mostrar los alumnos de una unidad específica
    public function mostrarAlumnos(Request $request, $unidadId)
    {
        $unidad = Unidad::with('alumnos')->findOrFail($unidadId);

        // Obtener los años desde la URL o request
        $anio_inicio = $request->input('anio_inicio');
        $anio_fin = $request->input('anio_fin');
        return view('unidades_alumnos', compact('unidad', 'anio_inicio', 'anio_fin'));
    }

    // Formulario de creación
    public function create()
    {
        $profesores = Profesor::all();
        return view('unidades_create', compact('profesores'));
    }

    // Guardar una nueva unidad con múltiples profesores
    public function store(Request $request)
    {
        $request->validate([
            'nombre_grado' => 'required|string|max:255',
            'turno' => 'required|in:diurno,tarde',
            'curso' => 'required|integer',
            'aula_bilingue' => 'required|boolean',
            'alias' => 'required|string|unique:unidades,alias',
            'profesor_ids' => 'nullable|array', // Se espera un array de IDs
            'profesor_ids.*' => 'exists:profesores,id', // Validar cada ID
        ]);

        // Crear la unidad sin profesor_id (porque ya no existe en la tabla unidades)
        $unidad = Unidad::create($request->only(['nombre_grado', 'turno', 'curso', 'aula_bilingue', 'alias']));

        // Asignar profesores si se seleccionaron
        $unidad->profesores()->sync($request->profesor_ids ?? []);

        return redirect()->route('dashboard')->with('success', 'Unidad creada correctamente.');
    }

    // Formulario de edición
    public function edit($id)
    {
        $unidad = Unidad::with('profesores')->findOrFail($id);
        $profesores = Profesor::all();
        return view('unidades_edit', compact('unidad', 'profesores'));
    }

    // Actualizar una unidad y sus profesores
    public function update(Request $request, $id)
    {
        $unidad = Unidad::findOrFail($id);

        $request->validate([
            'nombre_grado' => 'required|string|max:255',
            'turno' => 'required|in:diurno,tarde',
            'curso' => 'required|integer',
            'aula_bilingue' => 'required|boolean',
            'alias' => 'required|string|unique:unidades,alias,' . $id,
            'profesor_ids' => 'nullable|array', // Se espera un array de IDs
            'profesor_ids.*' => 'exists:profesores,id', // Validar cada ID
        ]);

        // Actualizar los datos básicos de la unidad
        $unidad->update($request->only(['nombre_grado', 'turno', 'curso', 'aula_bilingue', 'alias']));

        // Sincronizar los profesores asignados a la unidad
        $unidad->profesores()->sync($request->profesor_ids ?? []);

        return redirect()->route('dashboard')->with('success', 'Unidad actualizada correctamente.');
    }

    // Eliminar unidad y relaciones
    public function destroy(Unidad $unidad)
    {
        $unidad->profesores()->detach(); // Eliminar la relación con profesores
        $unidad->alumnos()->detach(); // Eliminar la relación con alumnos
        $unidad->delete(); // Eliminar la unidad

        return redirect()->route('dashboard')->with('success', 'Unidad eliminada correctamente.');
    }

    private function getFechas():array{

        $fechaHoy = Carbon::now();
        $anio_inicio = $fechaHoy->month<9 ? $fechaHoy->year-1: $fechaHoy->year;
        $anio_fin=$anio_inicio+1;

        return[$anio_inicio, $anio_fin];
    }
}
