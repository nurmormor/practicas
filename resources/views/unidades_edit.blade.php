<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Unidad</h1>

        <form action="{{ route('unidades_update', $unidad->id) }}" method="POST">
            @csrf @method('PUT')

            <label class="block">Nombre del Grado:</label>
            <input type="text" name="nombre_grado" value="{{ $unidad->nombre_grado }}" required class="border p-2 w-full">

            <label class="block mt-2">Turno:</label>
            <select name="turno" class="border p-2 w-full">
                <option value="diurno" {{ $unidad->turno == 'diurno' ? 'selected' : '' }}>Diurno</option>
                <option value="tarde" {{ $unidad->turno == 'tarde' ? 'selected' : '' }}>Tarde</option>
            </select>

            <label class="block mt-2">Curso:</label>
            <input type="number" name="curso" value="{{ $unidad->curso }}" required class="border p-2 w-full">

            <label class="block mt-2">Aula Bilingüe:</label>
            <select name="aula_bilingue" class="border p-2 w-full">
                <option value="1" {{ $unidad->aula_bilingue ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$unidad->aula_bilingue ? 'selected' : '' }}>No</option>
            </select>

            <label class="block mt-2">Alias:</label>
            <input type="text" name="alias" value="{{ $unidad->alias }}" required class="border p-2 w-full">

            <!-- Selección de múltiples profesores -->
            <label class="block mt-2">Profesores Asignados:</label>
            <select name="profesor_ids[]" class="border p-2 w-full" multiple>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}"
                        {{ $unidad->profesores->contains($profesor->id) ? 'selected' : '' }}>
                        {{ $profesor->nombre }} {{ $profesor->apellidos }}
                    </option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500">Puedes seleccionar varios profesores manteniendo presionada la tecla Ctrl (Cmd en Mac).</p>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Actualizar</button>
        </form>
    </div>
</x-app-layout>
