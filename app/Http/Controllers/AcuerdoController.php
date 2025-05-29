<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Unidad;
use App\Models\Empresa;
use App\Models\Acuerdo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\HistoricoEmpresaUnidad;


class AcuerdoController extends Controller
{
    public function create($historicoId)
    {
        $historial = HistoricoEmpresaUnidad::with(['alumno', 'empresa', 'unidad'])->findOrFail($historicoId);

        // Buscar si ya existe un acuerdo para este historial
        $acuerdo = Acuerdo::where('alumno_id', $historial->alumno_id)
            ->where('empresa_id', $historial->empresa_id)
            ->where('unidad_id', $historial->unidad_id)
            ->first();

        return view('acuerdos_create', compact('historial', 'acuerdo'));
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'alumno_id' => 'required|integer|exists:alumnos,id',
            'empresa_id' => 'required|integer|exists:empresas,id',
            'unidad_id' => 'required|integer|exists:unidades,id',
            'historico_id' => 'required|integer|exists:empresas_alumnos_unidades,id',
            'objetivo' => 'required|string|max:255',
            'tutor' => 'required|string|max:255',
            'observaciones' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        // Crear el nuevo acuerdo
        Acuerdo::create($validated);

        // Redirigir con mensaje de éxito (puedes ajustar la ruta según tu flujo)
        return redirect()->route('dashboard')->with('success', 'Acuerdo creado correctamente.');
    }
    public function edit(Acuerdo $acuerdo)
    {
        // Obtener el historial correspondiente (para mostrar los datos de alumno, empresa, unidad)
        $historial = HistoricoEmpresaUnidad::where('alumno_id', $acuerdo->alumno_id)
            ->where('empresa_id', $acuerdo->empresa_id)
            ->where('unidad_id', $acuerdo->unidad_id)
            ->firstOrFail();

        return view('acuerdos_create', compact('acuerdo', 'historial'));
    }

    public function update(Request $request, Acuerdo $acuerdo)
    {
        $validated = $request->validate([
            'alumno_id' => 'required|integer|exists:alumnos,id',
            'empresa_id' => 'required|integer|exists:empresas,id',
            'unidad_id' => 'required|integer|exists:unidades,id',
            'objetivo' => 'required|string|max:255',
            'tutor' => 'required|string|max:255',
            'observaciones' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $acuerdo->update($validated);

        return redirect()->route('dashboard')->with('success', 'Acuerdo actualizado correctamente.');
    }
}
