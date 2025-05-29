<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar Alumno</h1>

        <!-- Formulario para actualizar alumno -->
        <form action="{{ route('alumnos_update', $historicoEmpresaUnidad->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campos de Alumno -->
            <div class="mb-4">
                <label class="block text-gray-700">Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Apellidos:</label>
                <input type="text" name="apellidos" value="{{ old('apellidos', $alumno->apellidos) }}" required
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email:</label>
                <input type="email" name="email" value="{{ old('email', $alumno->email) }}" required
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Teléfono:</label>
                <input type="text" name="telefono" value="{{ old('telefono', $alumno->telefono) }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Desplegable para asignar empresa provisional -->
            <div class="mb-4">
                <label class="block text-gray-700">Empresa Provisional:</label>
                <select name="empresa_relacion_id" id="empresa_relacion_id" class="w-full border rounded p-2">
                    <option value="">Seleccionar Empresa (Opcional)</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}"
                            {{ $historicoEmpresaUnidad->empresa_id === $empresa->id ? 'selected' : '' }}>
                            {{ $empresa->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo oculto para unidad -->
            <input type="hidden" name="unidad_id" value="{{ $unidad->id }}">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
        </form>

        <!-- Botón de acuerdo -->
        <div class="mt-6 text-center">
            @if ($historicoEmpresaUnidad->empresa_id)
                <a href="{{ route('acuerdo_form', $historicoEmpresaUnidad->id) }}"
                    class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-200">
                    Editar/Crear Acuerdo
                </a>
            @else
                <span class="bg-gray-300 text-gray-600 px-6 py-3 rounded-lg inline-block opacity-60 cursor-not-allowed">
                    🔒 Acuerdo no disponible
                </span>
                <p class="text-sm text-gray-500 mt-2">Debes asignar una empresa al alumno en esta unidad para activar
                    esta opción.</p>
            @endif
        </div>
    </div>
</x-app-layout>
