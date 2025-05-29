<x-app-layout>
    <div class="container mx-auto p-6 max-w-lg">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Editar Profesor</h1>

        <form action="{{ route('profesores_update', $profesor->id) }}" method="POST"
            class="space-y-6 bg-white p-8 rounded-xl shadow-lg">
            @csrf
            @method('PUT')
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Editar Profesor/a</h1>

            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $profesor->nombre) }}"
                    class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200"
                    required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos"
                    value="{{ old('apellidos', $profesor->apellidos) }}"
                    class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200"
                    required>
                @error('apellidos')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $profesor->email) }}"
                    class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200"
                    required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $profesor->telefono) }}"
                    class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200">
                @error('telefono')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 transform hover:scale-105">
                    Actualizar Profesor
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
