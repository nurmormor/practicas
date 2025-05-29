<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all(); // Obtiene todas las empresas
        return view('empresas', compact('empresas'));
    }

    public function create()
    {
        // Mostrar el formulario para agregar una nueva empresa
        return view('empresas_create');
    }

     public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'sector' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email_contacto' => 'nullable|email|max:255',
        ]);

        // Crear la empresa
        Empresa::create($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('empresas')->with('success', 'Empresa añadida correctamente.');
    }

    public function edit(Empresa $empresa)
    {
        // Mostrar el formulario para editar una empresa
        return view('empresas_edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        // Validación de los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'sector' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email_contacto' => 'nullable|email|max:255',
        ]);

        // Actualizar los datos de la empresa
        $empresa->update($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('empresas')->with('success', 'Empresa actualizada correctamente.');
    }

    public function destroy($id)
{
    $empresa = Empresa::findOrFail($id);

    // Verificar si tiene acuerdos asociados
    if ($empresa->acuerdos()->count() > 0) {
        return redirect()->back()->with('error', 'No se puede eliminar la empresa porque tiene acuerdos asociados.');
    }

    // Verificar si está asociada a algún alumno (tabla intermedia)
    if ($empresa->alumnos()->count() > 0) {
        return redirect()->back()->with('error', 'No se puede eliminar la empresa porque está asociada a uno o más alumnos.');
    }

    $empresa->delete();

    return redirect()->route('empresas')->with('success', 'Empresa eliminada correctamente.');
}
}
