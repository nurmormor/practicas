<x-app-layout>
    <div class="container mx-auto p-6 max-w-lg">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Editar Empresa</h1>

        <form action="{{ route('empresas_update', $empresa->id) }}" method="POST" class="space-y-6 bg-white p-8 rounded-xl shadow-lg">
            @csrf
            @method('PUT')
<h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Editar Empresa</h1>
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $empresa->nombre) }}" class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="sector" class="block text-sm font-medium text-gray-700">Sector</label>
                <input type="text" id="sector" name="sector" value="{{ old('sector', $empresa->sector) }}" class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200">
                @error('sector')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $empresa->direccion) }}" class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200">
                @error('direccion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $empresa->telefono) }}" class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200">
                @error('telefono')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email_contacto" class="block text-sm font-medium text-gray-700">Email de Contacto</label>
                <input type="email" id="email_contacto" name="email_contacto" value="{{ old('email_contacto', $empresa->email_contacto) }}" class="mt-2 block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 transition duration-200">
                @error('email_contacto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 transform hover:scale-105">
                    Actualizar Empresa
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
