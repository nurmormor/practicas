<x-guest-layout>
      <!-- Sección Izquierda: Logo (2/3 de la pantalla) -->
      <div class="w-full flex items-center justify-center bg-blue-500 p-4 h-1/2 lg:h-full lg:w-[60%]">
        <div class="flex items-center justify-center w-full h-full">
            <img src="{{ asset('img/favicon.png') }}" alt="Logo" class="w-[30%] h-[40%] mb-10">
        </div>
    </div>

    <!-- Sección Derecha: Formulario -->
    <div class="w-full flex items-center justify-center bg-gray-800 p-4 h-1/2 lg:h-full lg:w-[40%]">
        <div class="w-full max-w-md px-6 py-4 shadow-2xl bg-gray-700 rounded-lg">
            <!-- Título -->
            <h2 class="text-3xl font-semibold text-white dark:text-gray-300 mb-6 text-center">Regístrate</h2>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" placeholder="Name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" placeholder="Email"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" placeholder="Password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password"/>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
