<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                {{-- <li class="flex items-center">
                  <a href="#">Home</a>
                  <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li> --}}
                <li class="flex items-center">
                    <a href="{{ route('celadors.index') }}">Celadores</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li>
                    <a href="#" class="text-gray-500" aria-current="page">Editar celador</a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Información del celador
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('celadors.update', $celador->id) }}">
                        @csrf
                        @method('put')

                        <div class="mt-4">
                            <x-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" />

                            <x-input id="fecha_nacimiento" class="block mt-1 w-full"
                                     type="date"
                                     name="fecha_nacimiento"
                                     :value="$celador->fecha_nacimiento->format('Y-m-d')"
                                     required />
                        </div>

                        <div class="mt-4">
                                <x-label for="telefono" :value="__('Telefono')" />

                                <x-input id="telefono" type="text" name="telefono" :value="$celador->telefono" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="fecha_contratacion" :value="__('Fecha de Contratacion')" />

                            <x-input id="fecha_contratacion" class="block mt-1 w-full"
                                     type="date"
                                     name="fecha_contratacion"
                                     :value="$celador->fecha_contratacion->format('Y-m-d')"
                                     required />
                        </div>
                        
                        <div class="mt-4">
                                <x-label for="sueldo" :value="__('Sueldo')" />

                                <x-input id="sueldo" type="text" name="sueldo" :value="$celador->sueldo" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                <a href={{route('celadors.index')}}>
                                    {{ __('Cancelar') }}
                                </a>
                            </x-button>
                            <x-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id != 2)    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Añadir una sala
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('salas.store') }}">
                        @csrf       
                        
                        <div class="mt-4">
                            <x-label for="celador_id" :value="__('Nombre Completo')" />

                            @isset($celador)
                                <x-input id="celador_id" class="block mt-1 w-full"
                                         type="hidden"
                                         name="celador_id"
                                         :value="$celador->id"
                                         required />
                                <x-input class="block mt-1 w-full"
                                         type="text"
                                         disabled
                                         value="{{$celador->user->name}}"
                                          />
                            @else
                                <x-select id="celador_id" name="celador_id" required>
                                    <option value="">{{__('Elige un celador')}}</option>
                                    @foreach ($celadors as $celador)
                                        <option value="{{$celador->id}}" @if (old('celador_id') == $celador->id) selected @endif>{{$celador->user->name}}</option>
                                    @endforeach
                                </x-select>
                            @endisset
                        </div>
                        <div class="mt-4">
                            <x-label for="fecha_hora_inicio" :value="__('Fecha y hora')" />

                            <x-input id="fecha_hora_inicio" class="block mt-1 w-full"
                                     type="datetime-local"
                                     name="fecha_hora_inicio"
                                     :value="old('fecha_hora_inicio')"
                                     required />
                        </div>

                        <div class="mt-4">
                                <x-label for="planta" :value="__('Planta')" />

                                <x-input id="planta" type="text" name="planta" :value="old('planta')" required />
                        </div>
                        
                        <div class="mt-4">
                                <x-label for="numero_sala" :value="__('Numero Sala')" />

                                <x-input id="numero_sala" type="text" name="numero_sala" :value="old('numero_sala')" required />
                        </div>

                        <div class="mt-4">
                                <x-label for="numero_camillas" :value="__('Numero Camillas')" />

                                <x-input id="numero_camillas" type="text" name="numero_camillas" :value="old('numero_camillas')" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                <a href={{route('celadors.index')}}>
                                    {{ __('Cancelar') }}
                                </a>
                            </x-button>
                            <x-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Añadir camilla
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors->attach" />
                    <form method="POST" action="{{ route('salas.attachCamilla', [$sala->id]) }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="camilla_id" :value="__('Camilla')" />


                            <x-select id="camilla_id" name="camilla_id" required>
                                <option value="">{{__('Elige una camilla')}}</option>
                                @foreach ($camillas as $camilla)
                                    <option value="{{$camilla->id}}" @if (old('camilla_id') == $camilla->id) selected @endif>{{__('ID:')}} {{$camilla->id}}{{__(',')}} ({{$camilla->precio}} {{__('€.')}})</option>
                                @endforeach
                            </x-select>
                        </div>

                        <div>
                            <x-label for="comentario" :value="__('Comentario')" />

                            <x-input id="comentario" class="block mt-1 w-full" type="text" name="comentario" :value="old('comentario')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                <a href={{route('celadors.index')}}>
                                    {{ __('Cancelar') }}
                                </a>
                            </x-button>
                            <x-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
