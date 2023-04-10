<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" value="2" name="tipo_usuario_id">

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                            <x-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" />

                            <x-input id="fecha_nacimiento" class="block mt-1 w-full"
                                     type="date"
                                     name="fecha_nacimiento"
                                     :value="old('fecha_nacimiento')"
                                     required />
                        </div>

                        <div class="mt-4">
                                <x-label for="telefono" :value="__('Telefono')" />

                                <x-input id="telefono" type="text" name="telefono" :value="old('telefono')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="fecha_contratacion" :value="__('Fecha de Contratacion')" />

                            <x-input id="fecha_contratacion" class="block mt-1 w-full"
                                     type="date"
                                     name="fecha_contratacion"
                                     :value="old('fecha_contratacion')"
                                     required />
                        </div>
                        
                        <div class="mt-4">
                                <x-label for="sueldo" :value="__('Sueldo')" />

                                <x-input id="sueldo" type="text" name="sueldo" :value="old('sueldo')" required autofocus />
                        </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
