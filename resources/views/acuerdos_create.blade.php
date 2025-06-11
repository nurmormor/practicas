<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center mt-20">
            {{ isset($acuerdo) ? 'Editar Acuerdo de Formación' : 'Nuevo Acuerdo de Formación' }}
        </h1>

        <!-- Mostrar datos: ancho completo -->
        <div class="mb-6 bg-gray-100 p-6 rounded-lg shadow w-full">
            <p class="text-gray-800"><strong>Alumno:</strong> {{ $historial->alumno->nombre }} {{ $historial->alumno->apellidos }}</p>
            <p class="text-gray-800"><strong>Unidad:</strong> {{ $historial->unidad->nombre_grado }} - {{ $historial->unidad->curso }}º ({{ ucfirst($historial->unidad->turno) }})</p>
            <p class="text-gray-800"><strong>Empresa:</strong> {{ $historial->empresa->nombre }}</p>
        </div>

        <!-- Formulario centrado y con ancho máximo definido -->
        <form action="{{ isset($acuerdo) ? route('acuerdo_update', $acuerdo->id) : route('acuerdo_store') }}"
              method="POST" class="bg-white p-6 rounded-lg shadow mx-auto max-w-2xl space-y-4">
            @csrf
            @if (isset($acuerdo))
                @method('PUT')
            @endif

            <!-- Ocultos -->
            <input type="hidden" name="alumno_id" value="{{ $historial->alumno_id }}">
            <input type="hidden" name="unidad_id" value="{{ $historial->unidad_id }}">
            <input type="hidden" name="empresa_id" value="{{ $historial->empresa_id }}">
            <input type="hidden" name="historico_id" value="{{ $historial->id }}">

            <!-- Campos del acuerdo -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Objetivo:</label>
                <input type="text" name="objetivo" class="w-full border rounded p-2" required
                       value="{{ old('objetivo', $acuerdo->objetivo ?? '') }}">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Tutor de Empresa:</label>
                <input type="text" name="tutor" class="w-full border rounded p-2" required
                       value="{{ old('tutor', $acuerdo->tutor ?? '') }}">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Observaciones:</label>
                <textarea name="observaciones" class="w-full border rounded p-2" rows="4">{{ old('observaciones', $acuerdo->observaciones ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Fecha de Inicio:</label>
                <input type="date" name="fecha_inicio" class="w-full border rounded p-2" required
                       value="{{ old('fecha_inicio', $acuerdo->fecha_inicio ?? '') }}">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Fecha de Fin:</label>
                <input type="date" name="fecha_fin" class="w-full border rounded p-2" required
                       value="{{ old('fecha_fin', $acuerdo->fecha_fin ?? '') }}">
            </div>

            <div class="text-center pt-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-200">
                    {{ isset($acuerdo) ? 'Actualizar Acuerdo' : 'Guardar Acuerdo' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
