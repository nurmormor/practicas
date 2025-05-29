<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Unidad;
use App\Models\Empresa;
use App\Models\Acuerdo;
use App\Models\HistoricoEmpresaUnidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::with(['unidades', 'acuerdos.empresa'])->get();
        return view('alumnos', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Unidad $unidad)
    {
        $empresas = Empresa::all(); // Obtener todas las empresas disponibles
        return view('alumnos_create', compact('unidad', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Unidad $unidad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
            'telefono' => 'nullable|string|max:20',
        ]);

        $alumno = new Alumno($request->all());
        $alumno->save();

        // Asociar el alumno a la unidad
        $unidad->alumnos()->attach($alumno->id, [
            'anio_inicio' => now()->year,
            'anio_fin' => now()->year + 1
        ]);
        dd($request->all());

        return redirect()->route('unidades_alumnos', $unidad->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoricoEmpresaUnidad $historicoEmpresaUnidad, Request $request)
{
    $empresas = Empresa::all();
    $alumno = $historicoEmpresaUnidad->alumno;
    $unidad = $historicoEmpresaUnidad->unidad;

    return view('alumnos_edit', compact('historicoEmpresaUnidad','alumno', 'unidad','empresas'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistoricoEmpresaUnidad $historicoEmpresaUnidad)
{
    $alumno = $historicoEmpresaUnidad->alumno;
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'email' => 'required|email|unique:alumnos,email,' . $alumno->id,
        'telefono' => 'nullable|string|max:20',
        'empresa_relacion_id' => 'nullable|exists:empresas,id',
    ]);

    $alumno->update($request->only(['nombre', 'apellidos', 'email', 'telefono']));
    if ($request->has('empresa_relacion_id')){

        $historicoEmpresaUnidad->update(['empresa_id'=>$request->get('empresa_relacion_id')]);
    }

    return redirect()->route('unidades_alumnos', ['unidad' => $historicoEmpresaUnidad->unidad_id, 'anio_inicio' => $historicoEmpresaUnidad->anio_inicio, 'anio_fin'=> $historicoEmpresaUnidad->anio_fin])
        ->with('success', 'Alumno actualizado correctamente.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $unidad_id = $alumno->unidades->first()->id;
        $alumno->delete();

        return redirect()->route('unidades_alumnos', $unidad_id);
    }
}
