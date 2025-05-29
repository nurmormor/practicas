<x-app-layout>
    <!-- Contenedor Principal -->
    <div class="relative h-screen w-full bg-cover bg-center" style="background-image: url('{{ asset('img/monroy.jpg') }}');">
        <!-- Overlay para oscurecer el fondo -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Contenido Centrado -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <!-- Texto de Bienvenida -->
            <h2 class="text-white text-3xl md:text-5xl font-bold tracking-wide">
                BIENVENIDO AL ÁREA DE GESTIÓN DE PRÁCTICAS EN EMPRESA <br>
                PARA ALUMNOS DEL <span class="text-blue-400">I.E.S. CRISTÓBAL DE MONROY</span>
            </h2>
            <!-- Subtítulo -->
            <p class="mt-6 text-gray-300 text-lg md:text-xl">
                Gestiona tus prácticas de forma eficiente y construye tu futuro profesional con nosotros.
            </p>
        </div>
    </div>
</x-app-layout>
