<x-app-layout>
    <div class="container mx-auto px-6 py-8 min-h-screen flex items-center justify-center mt-6">
        <div class="w-full max-w-xl bg-white p-8 rounded-xl shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar Alumno</h1>

            <!-- Formulario para actualizar alumno -->
            <form action="{{ route('alumnos_update', $historicoEmpresaUnidad->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Campos de Alumno -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nombre:</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Apellidos:</label>
                    <input type="text" name="apellidos" value="{{ old('apellidos', $alumno->apellidos) }}" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email:</label>
                    <input type="email" name="email" value="{{ old('email', $alumno->email) }}" required
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Teléfono:</label>
                    <input type="text" name="telefono" value="{{ old('telefono', $alumno->telefono) }}"
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Desplegable para empresa -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Empresa Provisional:</label>
                    <select name="empresa_relacion_id" id="empresa_relacion_id"
                        class="w-full max-w-md border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Seleccionar Empresa (Opcional)</option>
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->id }}"
                                {{ $historicoEmpresaUnidad->empresa_id === $empresa->id ? 'selected' : '' }}>
                                {{ $empresa->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo oculto -->
                <input type="hidden" name="unidad_id" value="{{ $unidad->id }}">

                <!-- Botón actualizar -->
                <div class="text-center mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200">
                        Actualizar
                    </button>
                </div>
            </form>

            <!-- Botón de acuerdo -->
            <div class="mt-4 text-center">
                @if ($historicoEmpresaUnidad->empresa_id)
                    <a href="{{ route('acuerdo_form', $historicoEmpresaUnidad->id) }}"
                        class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-200 inline-block">
                        Editar/Crear Acuerdo
                    </a>
                @else
                    <span
                        class="bg-gray-300 text-gray-600 px-6 py-3 rounded-lg inline-block opacity-60 cursor-not-allowed">
                        🔒 Acuerdo no disponible
                    </span>
                    <p class="text-sm text-gray-500 mt-2">Debes asignar una empresa al alumno en esta unidad para activar esta opción.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
