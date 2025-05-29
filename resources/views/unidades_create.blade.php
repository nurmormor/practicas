<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Crear Nueva Unidad</h1>

        <form action="{{ route('unidades_store') }}" method="POST">
            @csrf
            <label class="block">Nombre del Grado:</label>
            <input type="text" name="nombre_grado" required class="border p-2 w-full">

            <label class="block mt-2">Turno:</label>
            <select name="turno" class="border p-2 w-full">
                <option value="diurno">Diurno</option>
                <option value="tarde">Tarde</option>
            </select>

            <label class="block mt-2">Curso:</label>
            <input type="number" name="curso" required class="border p-2 w-full">

            <label class="block mt-2">Aula Bilingüe:</label>
            <select name="aula_bilingue" class="border p-2 w-full">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>

            <label class="block mt-2">Alias:</label>
            <input type="text" name="alias" required class="border p-2 w-full">

            <label class="block mt-2">Profesor Asignado:</label>
            <select name="profesor_id" class="border p-2 w-full">
                <option value="">-- Sin profesor --</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}">{{ $profesor->nombre }} {{ $profesor->apellidos }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>
