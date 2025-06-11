<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Botón para añadir nuevo profesor -->
        <div class="flex justify-end mb-4 mt-20">
            <a href="{{ route('profesores_create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                + Añadir Profesor
            </a>
        </div>

        <h1 class="text-2xl font-bold mb-4">Lista de Profesores</h1>

        <table class="w-full border-collapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">Apellidos</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Teléfono</th>
                    <th class="border p-2">Unidad</th>
                    <th class="border p-2">Acciones</th> <!-- Columna para acciones -->
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                    <tr class="border">
                        <td class="p-2">{{ $profesor->nombre }}</td>
                        <td class="p-2">{{ $profesor->apellidos }}</td>
                        <td class="p-2">{{ $profesor->email }}</td>
                        <td class="p-2">{{ $profesor->telefono }}</td>
                        <td class="p-2">
                            @if ($profesor->unidades->isNotEmpty())
                                @foreach ($profesor->unidades as $unidad)
                                    <div>{{ $unidad->nombre_grado }} - {{ $unidad->curso }}° ({{ ucfirst($unidad->turno) }})</div>
                                @endforeach
                            @else
                                Sin unidad
                            @endif
                        </td>
                        <td class="p-2">
                            <!-- Botón Editar -->
                            <a href="{{ route('profesores_edit', $profesor->id) }}" class="text-blue-500 hover:text-blue-700">
                                ✏️
                            </a>

                            <!-- Formulario para Eliminar -->
                            <form action="{{ route('profesores_destroy', $profesor->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que quieres eliminar este profesor?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-4">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
