<x-guest-layout >

    <div class="fixed top-0 right-0 px-6 py-4 sm:block">
    <div>
         <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline" style="color: black; font-size: 15px;">Registrar</a>
    </div>
    </div>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('login') }}">
                    <img src="{{url('/')}}/img/cinta.png" class="card-img-top" alt="..." style="width: 200px; height: 200px; margin-top: 10px">
                </a>
            </div>
        </x-slot>


        <x-jet-validation-errors class="mb-4" />


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600" >
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Iniciar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
