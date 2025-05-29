<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Añadir Alumno a {{ $unidad->alias }}</h1>

        <form action="{{ route('alumnos_store', ['unidad' => $unidad->id]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nombre:</label>
                <input type="text" name="nombre" required class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Apellidos:</label>
                <input type="text" name="apellidos" required class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email:</label>
                <input type="email" name="email" required class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Teléfono:</label>
                <input type="text" name="telefono" class="w-full border rounded p-2">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>
