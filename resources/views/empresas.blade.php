<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Botón para añadir nueva empresa -->
        <div class="flex justify-end mb-4 mt-20">

            <a href="{{ route('empresas_create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Añadir Empresa</a>

        </div>

        <h1 class="text-2xl font-bold mb-4">Lista de Empresas</h1>
        @if (session('error'))
            <p class="text-red-600 bg-red-100 border border-red-300 rounded-md p-3 mb-4">
                {{ session('error') }}
            </p>
        @endif
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">Sector</th>
                    <th class="border p-2">Dirección</th>
                    <th class="border p-2">Teléfono</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                    <tr class="border hover:bg-gray-50">
                        <td class="p-2">{{ $empresa->id }}</td>
                        <td class="p-2">{{ $empresa->nombre }}</td>
                        <td class="p-2">{{ $empresa->sector }}</td>
                        <td class="p-2">{{ $empresa->direccion }}</td>
                        <td class="p-2">{{ $empresa->telefono }}</td>
                        <td class="p-2">
                            <!-- Editar-->
                            <div class="flex space-x-4">
                                <!-- Editar-->
                                <a href="{{ route('empresas_edit', $empresa->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700">✏️</a>

                                <!-- Eliminar-->
                                <form action="{{ route('empresas_destroy', $empresa->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta empresa?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
