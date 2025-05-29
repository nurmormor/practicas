<x-app-layout>
    <div class="container mx-auto px-6 py-8">

        <!-- Botón para añadir nueva unidad -->
        <div class="flex justify-end mb-8 mt-20">
            <a href="{{ route('unidades_create') }}"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-xl transition">
                + Añadir Unidad
            </a>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Unidades Disponibles</h1>

        <!-- Formulario de filtrado -->
        <form action="{{ route('dashboard') }}" method="GET"
            class="bg-white shadow-md rounded-lg p-6 mb-10 max-w-3xl mx-auto flex flex-col sm:flex-row items-center gap-4">

            <div class="w-full sm:w-1/2">
                <label for="anio_inicio" class="block text-sm font-medium text-gray-700 mb-1">Año de Inicio</label>
                <input type="number" name="anio_inicio" id="anio_inicio" min="1900" max="2300" value="{{ $anio_inicio }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="w-full sm:w-1/2">
                <label for="anio_fin" class="block text-sm font-medium text-gray-700 mb-1">Año de Fin</label>
                <input type="number" name="anio_fin" id="anio_fin" min="1900" max="2300" value="{{ $anio_fin }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit"
                class="mt-4 sm:mt-6 w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                Filtrar
            </button>
        </form>

        <!-- Grid de tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($unidades as $unidad)
                <div class="relative bg-white shadow-md hover:shadow-xl transition rounded-2xl p-6 border border-gray-100">
                    <a href="{{ route('unidades_alumnos', [$unidad->id, 'anio_inicio' => $anio_inicio, 'anio_fin' => $anio_fin]) }}">
                        <h3 class="text-xl font-bold text-gray-800 text-center">{{ $unidad->alias }}</h3>
                        <p class="text-gray-700 text-center mt-1">{{ $unidad->nombre_grado }} - {{ $unidad->curso }}º</p>
                        <p class="text-gray-600 text-center mt-1">Turno: <strong>{{ ucfirst($unidad->turno) }}</strong></p>
                        <p class="text-gray-600 text-center">Aula Bilingüe: <strong>{{ $unidad->aula_bilingue ? 'Sí' : 'No' }}</strong></p>

                        <p class="text-gray-700 font-semibold text-center mt-4">
                            Profesor/a:
                            <span class="font-normal block mt-1">
                                @if ($unidad->profesores->isEmpty())
                                    <span class="italic text-gray-400">Sin profesor asignado</span>
                                @else
                                    @foreach ($unidad->profesores as $profesor)
                                        {{ $profesor->nombre }} {{ $profesor->apellidos }}<br>
                                    @endforeach
                                @endif
                            </span>
                        </p>
                    </a>

                    <!-- Botones editar/eliminar -->
                    <div class="absolute top-3 right-3 flex space-x-2">
                        <a href="{{ route('unidades_edit', $unidad->id) }}"
                            class="text-blue-600 hover:text-blue-800 text-xl">
                            ✏️
                        </a>

                        <form action="{{ route('unidades_destroy', $unidad->id) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que quieres eliminar esta unidad?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xl">
                                🗑️
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
