<?php

namespace App\Http\Controllers;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        // Obtener todos los profesores con sus unidades asociadas
        $profesores = Profesor::with('unidades')->get();

        // Pasar los datos a la vista
        return view('profesores', compact('profesores'));
    }
    // Mostrar el formulario para crear un nuevo profesor
    public function create()
    {
        return view('profesores_create'); // Vista para crear un profesor
    }

    // Almacenar un nuevo profesor en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:profesores,email',
            'telefono' => 'nullable|string',
        ]);

        // Crear un nuevo profesor
        Profesor::create($request->all());

        return redirect()->route('profesores.index')->with('success', 'Profesor creado correctamente.');
    }

    // Mostrar el formulario para editar un profesor
    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id); // Obtener el profesor por ID
        return view('profesores_edit', compact('profesor')); // Vista para editar el profesor
    }

    // Actualizar un profesor en la base de datos
    public function update(Request $request, $id)
    {
        $profesor = Profesor::findOrFail($id); // Obtener el profesor por ID

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:profesores,email,' . $profesor->id,
            'telefono' => 'nullable|string',
        ]);

        // Actualizar los datos del profesor
        $profesor->update($request->all());

        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado correctamente.');
    }

    // Eliminar un profesor de la base de datos
    public function destroy($id)
    {
        $profesor = Profesor::findOrFail($id); // Obtener el profesor por ID
        $profesor->delete(); // Eliminar el profesor

        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado correctamente.');
    }
}
