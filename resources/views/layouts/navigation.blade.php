<aside id="navigation-menu"
    class="fixed top-20 left-0 h-full bg-blue-500 p-4 flex-col items-center justify-center hidden z-50">

    <ul class="space-y-9">

        <!-- Icono 1 -->
        <li class="relative" id="icon1">
            <a href="{{ route('alumnos.index') }}">
                <div id="indicator1" class="absolute bg-blue-500 w-1.5 h-9 right-[-16px] transition-all duration-300">
                </div>
                <div class="text-white flex justify-center items-center">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10l-10-5L2 10l10 5 10-5z"></path>
                        <path d="M6 12v5c0 2.21 4 4 6 4s6-1.79 6-4v-5"></path>
                        <path d="M10 14a2 2 0 114 0"></path>
                    </svg>
                </div>
            </a>
        </li>

        <!-- Icono 2 -->
        <li class="relative" id="icon2">
            <a href="{{ route('empresas.index') }}">
                <div id="indicator2" class="absolute bg-blue-500 w-1.5 h-9 right-[-16px] transition-all duration-300">
                </div>
                <div class="text-white flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        class="w-8 h-8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 22V12a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v10"></path>
                        <path d="M4 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path>
                        <path d="M16 22V8a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v14"></path>
                        <path d="M16 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path>
                        <path d="M6 10h8"></path>
                        <path d="M6 14h8"></path>
                    </svg>
                </div>
            </a>
        </li>

        <!-- Icono 3 -->
        <li class="relative" id="icon3">
            <a href="{{ route('profesores.index') }}">
            <div id="indicator3" class="absolute bg-blue-500 w-1.5 h-9 right-[-16px] transition-all duration-300"></div>
            <div class="text-white flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    class="w-8 h-8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 1v6M19 8l-7 7M4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z">
                    </path>
                </svg>
            </div>
            </a>
        </li>

    </ul>
</aside>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('li');

        // Función para actualizar los indicadores con base en el estado guardado
        function updateIndicators() {
            items.forEach(item => {
                // Si el ítem tiene la clase 'active', pon el indicador en verde, sino en rojo
                const indicator = item.querySelector('div');
                if (item.classList.contains('active')) {
                    indicator.style.backgroundColor = '#FFFFFF';
                } else {
                    indicator.style.backgroundColor = '#3B82F6';
                }
            });
        }

        // Comprobar si hay un ícono previamente activado en el localStorage
        const activeItemId = localStorage.getItem('activeItemId');
        if (activeItemId) {
            const activeItem = document.getElementById(activeItemId);
            if (activeItem) {
                activeItem.classList.add('active');
            }
        }

        items.forEach(item => {
            item.addEventListener('click', function() {
                // Eliminar la clase 'active' de todos los ítems
                items.forEach(i => i.classList.remove('active'));

                // Agregar la clase 'active' al ítem seleccionado
                item.classList.add('active');

                // Guardar el ID del ítem activo en el localStorage para persistir entre sesiones
                localStorage.setItem('activeItemId', item.id);

                // Actualizar los indicadores de color
                updateIndicators();
            });
        });

        // Inicializar el color de los indicadores
        updateIndicators();
    });
</script>
