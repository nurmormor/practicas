<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 mt-20">Lista de Alumnos</h1>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">Apellidos</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Teléfono</th>
                    <th class="border p-2">Unidad</th>
                    <th class="border p-2">Aula bilingüe</th>
                    <th class="border p-2">Curso Escolar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr class="border">
                        <td class="p-2">{{ $alumno->nombre }}</td>
                        <td class="p-2">{{ $alumno->apellidos }}</td>
                        <td class="p-2">{{ $alumno->email }}</td>
                        <td class="p-2">{{ $alumno->telefono }}</td>
                        <td class="p-2">
                            @if ($alumno->unidades->isNotEmpty())
                                @foreach ($alumno->unidades as $unidad)
                                    <div>{{ $unidad->nombre_grado }} - {{ $unidad->curso }}° ({{ ucfirst($unidad->turno) }})</div>
                                @endforeach
                            @else
                                Sin unidad
                            @endif
                        </td>
                        <td class="p-2">
                            @if ($alumno->unidades->isNotEmpty())
                                @foreach ($alumno->unidades as $unidad)
                                    <div>{{ $unidad->aula_bilingue ? 'Sí' : 'No' }}</div>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="p-2">
                            @if ($alumno->unidades->isNotEmpty())
                                @foreach ($alumno->unidades as $unidad)
                                    <div>{{ $unidad->pivot->anio_inicio }}/{{ $unidad->pivot->anio_fin }}</div>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
