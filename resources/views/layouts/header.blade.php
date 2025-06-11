<header class="bg-gray-800 flex justify-between items-center h-20 fixed w-full top-0 z-50">
    <!-- Menú hamburguesa en el header -->
    <div class=" flex justify-between items-center gap-8">

        <button id="menu-button" class="text-white bg-blue-500 p-2 w-24 flex items-center justify-center h-20">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>

        <!-- Logo -->
        @auth
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <img src="{{ asset('img/favicon.png') }}" alt="Logo" class="h-8 w-8 mr-4">
            </x-nav-link>
        @endauth
        @guest
            <img src="{{ asset('img/favicon.png') }}" alt="Logo" class="h-8 w-8">
        @endguest
    </div>
    <!-- Settings Dropdown or Login/Register buttons -->
    <div class="flex items-center space-x-4 lg:mr-2 xl:mr-2 2xl:mr-2">
        @auth


            <div>
                @if (auth()->user()->getFirstMediaUrl('avatar'))
                    <img src="{{ auth()->user()->getFirstMediaUrl('avatar') }}" alt="Foto de perfil"
                        class="rounded-full w-10 h-10">
                @else
                    <!-- Imagen por defecto si no tiene foto de perfil -->
                    <img src="{{ asset('img/default-profile.jpg') }}" alt="Foto de perfil por defecto"
                        class="rounded-full w-10 h-10">
                @endif
            </div>

            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="flex items-center px-2 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 dark:text-gray-400 bg-gray-800 dark:bg-gray-700 hover:text-gray-400 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <span class="truncate uppercase">{{ Auth::user()->name }}</span>
                        <!-- uppercase para convertir todos los user->name en mayúscula-->
                        <svg class="ml-1 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @else
            <!-- Login and Register Links Styled as Primary Buttons -->
            <div class="flex flex-col lg:flex lg:flex-row gap-2 mr-6">
                <a href="{{ route('login') }}">
                    <x-primary-button>
                        {{ __('Iniciar sesión') }}
                    </x-primary-button>
                </a>
                <a href="{{ route('register') }}" class="text-white text-sm mt-1">

                    {{ __('¿No tienes cuenta? Regístrate') }}

                </a>
            </div>
        @endauth

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Selecciona el botón del menú y el menú de navegación
                const menuButton = document.getElementById('menu-button');
                const navigationMenu = document.getElementById('navigation-menu');
                const mainContent = document.getElementById('main-content');

                // Evento para abrir y cerrar el menú de navegación
                menuButton.addEventListener('click', function() {
                    // Comprobar si el menú está actualmente oculto
                    if (navigationMenu.classList.contains('hidden')) {
                        navigationMenu.classList.remove('hidden'); // Mostrar el menú
                        navigationMenu.classList.add('w-24'); // Aplicar el ancho visible
                        mainContent.classList.add('ml-24'); // Ajustar margen del main
                    } else {
                        navigationMenu.classList.add('hidden'); // Ocultar completamente el navigation menu
                        navigationMenu.classList.remove('w-24'); // Quitar el ancho visible
                        mainContent.classList.remove('ml-24'); // Quitar margen del contenido principal
                    }
                });
            });
        </script>
    </div>
</header>
