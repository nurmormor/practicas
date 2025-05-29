<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center mt-20">
            Alumnos de la Unidad: {{ $unidad->alias }}
        </h1>

        <!-- Botón para agregar un nuevo alumno -->
        <div class="mb-4 text-right">
            <a href="{{ route('alumnos_create', ['unidad' => $unidad->id]) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Añadir Alumno
            </a>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">Apellidos</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Teléfono</th>
                    <th class="border p-2">Empresa</th>
                    <th class="border p-2">Acuerdo</th> <!-- Nueva columna Acuerdo -->
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unidad->alumnos as $alumno)
                    <tr class="border">
                        <td class="p-2">{{ $alumno->nombre }}</td>
                        <td class="p-2">{{ $alumno->apellidos }}</td>
                        <td class="p-2">{{ $alumno->email }}</td>
                        <td class="p-2">{{ $alumno->telefono }}</td>

                        <!-- Mostrar la empresa si está asignada o 'Sin empresa asignada' si no lo está -->
                        <td class="p-2">
                            @if ($empresa = $alumno->empresas()->where('unidad_id', $unidad->id)->where('anio_inicio', $anio_inicio)->where('anio_fin', $anio_fin)->first())
                                <div>{{ $empresa->nombre }}</div> <!-- Nombre de la empresa -->
                            @else
                                Sin empresa asignada
                            @endif
                        </td>


                        <!-- Columna Acuerdo con el símbolo de "tic" verde -->
                        <td class="p-2 text-center">
                            @php
                                $histEmpresaUnidad = $alumno
                                    ->historicoEmpresaUnidad()
                                    ->where('unidad_id', $unidad->id)
                                    ->where('anio_inicio', $anio_inicio)
                                    ->where('anio_fin', $anio_fin)
                                    ->first();

                                $acuerdo = $histEmpresaUnidad?->acuerdos()->exists();
                            @endphp

                            @if ($acuerdo)
                                <span class="text-green-500">&#10004;</span>
                            @else
                                No
                            @endif
                        </td>


                        <td class="p-2 flex justify-center space-x-2">
                            <!-- Botón Editar, ahora incluyendo unidad_id en la URL -->

                            @php(
    $histEmpresaUnidad = $alumno->historicoEmpresaUnidad()->where('unidad_id', $unidad->id)->where('anio_inicio', $anio_inicio)->where('anio_fin', $anio_fin)->first()
)
                            <a href="{{ route('alumnos_edit', [$histEmpresaUnidad->id]) }}"
                                class="text-yellow-500 hover:text-yellow-700">
                                ✏️
                            </a>
                            <!-- Botón Eliminar -->
                            <form action="{{ route('alumnos_destroy', $alumno->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
