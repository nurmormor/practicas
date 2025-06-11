<x-guest-layout>
    <!-- Sección Izquierda: Logo (2/3 de la pantalla) -->
    <div class="w-full flex items-center justify-center bg-blue-500 p-4 h-1/2 lg:h-full lg:w-[60%]">
        <div class="flex items-center justify-center w-full h-full">
            <img src="{{ asset('img/favicon.png') }}" alt="Logo" class="w-[30%] h-[40%] mb-10">
        </div>
    </div>

    <!-- Sección Derecha: Formulario (1/3 de la pantalla) -->
    <div class="w-full flex items-center justify-center bg-gray-800 p-4 h-1/2 lg:h-full lg:w-[40%]">
        <div class="w-full bg-gray-700 max-w-md px-6 py-4 shadow-2xl rounded-lg">
            <!-- Título -->
            <h2 class="text-3xl font-semibold text-white dark:text-gray-300 mb-6 text-center">Inicio de sesión</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4 relative">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" placeholder="Contraseña" />

                    <!-- Icono de ojo -->
                    <span id="toggle-password" class="absolute inset-y-0 right-3 flex items-center cursor-pointer">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <!-- Ojo abierto -->
                            <path id="eye-open"
                                d="M4.28342 13.0736C5.05977 9.34557 8.30518 6.69665 11.9558 6.69665C15.6054 6.69665 18.8508 9.34557 19.6283 13.0736C19.6591 13.2216 19.7474 13.3512 19.8737 13.434C20.0001 13.5169 20.1542 13.5461 20.3022 13.5153C20.4501 13.4845 20.5797 13.3962 20.6626 13.2698C20.7454 13.1435 20.7746 12.9894 20.7438 12.8414C19.8594 8.60109 16.1597 5.5583 11.9558 5.5583C7.75195 5.5583 4.05233 8.60109 3.16784 12.8414C3.13705 12.9894 3.16628 13.1435 3.24911 13.2698C3.33194 13.3962 3.46159 13.4845 3.60952 13.5153C3.75745 13.5461 3.91156 13.5169 4.03794 13.434C4.16432 13.3512 4.25262 13.2216 4.28342 13.0736ZM11.9445 8.97333C13.0011 8.97333 14.0145 9.39309 14.7617 10.1403C15.5089 10.8875 15.9287 11.9009 15.9287 12.9575C15.9287 14.0142 15.5089 15.0276 14.7617 15.7748C14.0145 16.522 13.0011 16.9417 11.9445 16.9417C10.8878 16.9417 9.87439 16.522 9.12721 15.7748C8.38003 15.0276 7.96026 14.0142 7.96026 12.9575C7.96026 11.9009 8.38003 10.8875 9.12721 10.1403C9.87439 9.39309 10.8878 8.97333 11.9445 8.97333Z"
                                fill="#212121" />
                            <!-- Ojo cerrado -->
                            <path id="eye-closed"
                                d="M9.98953 8C11.9225 8 13.4895 9.567 13.4895 11.5C13.4895 13.433 11.9225 15 9.98953 15C8.05653 15 6.48953 13.433 6.48953 11.5C6.48953 9.567 8.05653 8 9.98953 8Z"
                                fill="#212121" style="display: none;" />
                        </svg>
                    </span>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Olvidé mi contraseña -->
                <div class="flex justify-end mt-2 mb-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-white hover:text-red-500" href="{{ route('password.request') }}">
                            {{ __('Olvidé mi contraseña') }}
                        </a>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <div class="flex flex-col items-center mt-2 space-y-3 w-full">
                    <x-primary-button>
                        {{ __('Iniciar sesión') }}
                    </x-primary-button>
                </div>
            </form>
            <!-- Botón Regístrate fuera del formulario -->
            <div class="flex flex-col items-center mt-3 w-full">
                <a href="{{ route('register') }}">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-blue-500 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Regístrate') }}
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
