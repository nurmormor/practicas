<x-app-layout>
    <div class="container mx-auto px-6 py-8 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-xl bg-white p-8 rounded-xl shadow-md mt-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar Unidad</h1>

            <form action="{{ route('unidades_update', $unidad->id) }}" method="POST" class="space-y-5">
                @csrf @method('PUT')

                <!-- Nombre del grado -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nombre del Grado:</label>
                    <input type="text" name="nombre_grado" value="{{ $unidad->nombre_grado }}" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Turno -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Turno:</label>
                    <select name="turno"
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="diurno" {{ $unidad->turno == 'diurno' ? 'selected' : '' }}>Diurno</option>
                        <option value="tarde" {{ $unidad->turno == 'tarde' ? 'selected' : '' }}>Tarde</option>
                    </select>
                </div>

                <!-- Curso -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Curso:</label>
                    <input type="number" name="curso" value="{{ $unidad->curso }}" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Aula bilingüe -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Aula Bilingüe:</label>
                    <select name="aula_bilingue"
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1" {{ $unidad->aula_bilingue ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$unidad->aula_bilingue ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <!-- Alias -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Alias:</label>
                    <input type="text" name="alias" value="{{ $unidad->alias }}" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Profesores asignados -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Profesores Asignados:</label>
                    <select name="profesor_ids[]" multiple
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 h-40 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach($profesores as $profesor)
                            <option value="{{ $profesor->id }}"
                                {{ $unidad->profesores->contains($profesor->id) ? 'selected' : '' }}>
                                {{ $profesor->nombre }} {{ $profesor->apellidos }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Puedes seleccionar varios profesores manteniendo presionada la tecla Ctrl (Cmd en Mac).</p>
                </div>

                <!-- Botón actualizar -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
