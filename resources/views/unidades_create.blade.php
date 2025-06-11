<x-app-layout>
    <div class="container mx-auto px-6 py-8 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-xl bg-white p-8 rounded-xl shadow-md mt-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Crear Nueva Unidad</h1>

            <form action="{{ route('unidades_store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nombre del grado -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nombre del Grado:</label>
                    <input type="text" name="nombre_grado" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Turno -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Turno:</label>
                    <select name="turno"
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="diurno">Diurno</option>
                        <option value="tarde">Tarde</option>
                    </select>
                </div>

                <!-- Curso -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Curso:</label>
                    <input type="number" name="curso" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Aula bilingüe -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Aula Bilingüe:</label>
                    <select name="aula_bilingue"
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <!-- Alias -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Alias:</label>
                    <input type="text" name="alias" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Profesor asignado -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Profesor Asignado:</label>
                    <select name="profesor_id"
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Sin profesor --</option>
                        @foreach($profesores as $profesor)
                            <option value="{{ $profesor->id }}">{{ $profesor->nombre }} {{ $profesor->apellidos }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botón guardar -->
                <div class="text-center mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
