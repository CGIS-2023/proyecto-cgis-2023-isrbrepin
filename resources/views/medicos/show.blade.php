<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
              {{-- <li class="flex items-center">
                <a href="#">Home</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li> --}}
              <li class="flex items-center">
                <a href="{{ route('medicos.index') }}">{{__('Médicos')}}</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li>
              <li>
                <a href="#" class="text-gray-500" aria-current="page">{{__('Mostrar a ')}} {{$medico->user->name}}</a>
              </li>
            </ol>
          </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    {{__('Información del médico')}}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <div>
                                <x-label for="id_medico" :value="__('ID')" />

                                <x-input id="id_medico" readonly disabled class="block mt-1 w-full" type="text" name="id_medico" :value="$medico->id" required autofocus />
                            </div>

                            <div>
                                <x-label for="name" :value="__('Nombre Completo')" />

                                <x-input id="name" readonly disabled class="block mt-1 w-full" type="text" name="name" :value="$medico->user->name" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" readonly disabled class="block mt-1 w-full" type="email" name="email" :value="$medico->user->email" required />
                            </div>

                            <div class="mt-4">
                            <x-label for="especialidad" :value="__('Especialidad')" />

                            <x-input id="especialidad" class="block mt-1 w-full"
                                     type="text"
                                     name="especialidad"
                                     disabled
                                     :value="$medico->especialidad->nombre"
                                     required />
                        </div>

                            <div class="mt-4">
                                <x-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" />

                                <x-input readonly disabled id="fecha_nacimiento" class="block mt-1 w-full"
                                                type="date"
                                                name="fecha_nacimiento"
                                                :value="$medico->fecha_nacimiento->format('Y-m-d')"
                                                required />
                            </div>

                            <div class="mt-4">
                                <x-label for="telefono" :value="__('Telefono')" />

                                <x-input id="telefono" readonly disabled class="block mt-1 w-full" type="text" name="telefono" :value="$medico->telefono" required />
                            </div>

                            <div class="mt-4">
                                <x-label for="fecha_contratacion" :value="__('Fecha contratación')" />

                                <x-input readonly disabled id="fecha_contratacion" class="block mt-1 w-full"
                                                type="date"
                                                name="fecha_contratacion"
                                                :value="$medico->fecha_contratacion->format('Y-m-d')"
                                                required />
                            </div>

                            <div class="mt-4">
                                <x-label for="vacunado" :value="__('Vacunado')" />


                                <x-select readonly disabled id="vacunado" name="vacunado" required>
                                    <option value="">{{__('Elige una opción')}}</option>
                                    <option value="1" @if ($medico->vacunado) selected @endif>{{__('Sí')}}</option>
                                    <option value="0" @if (!$medico->vacunado) selected @endif>{{__('No')}}</option>
                                </x-select>
                            </div>

                            <div class="mt-4">
                                <x-label for="sueldo" :value="__('Sueldo')" />

                                <x-input readonly disabled id="sueldo" class="block mt-1 w-full" min="0" step="1" type="number" name="sueldo" :value="$medico->sueldo" required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                    <a href={{route('medicos.index')}}>
                                    {{ __('Volver al listado') }}
                                    </a>
                                </x-button>
                            </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Salas asociadas al medico
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Medico Encargado</th>
                            <th class="py-3 px-6 text-left">Fecha inicio</th>
                            <th class="py-3 px-6 text-left">Planta</th>
                            <th class="py-3 px-6 text-left">Numero</th>
                            <th class="py-3 px-6 text-left">Ubicación</th>
                            <th class="py-3 px-6 text-left">Nº Camillas</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">

                        @foreach ($medico->salas as $sala)
                            <tr class="border-b border-gray-200">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sala->id}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sala->medico->user->name}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sala->fecha_hora_inicio->format('d/m/Y H:i')}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sala->planta}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sala->numero_sala}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sala->planta_numero}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sala->numero_camillas}}</span>
                                    </div>
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-end">
                                        @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id != 2)
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <form id="delete-form-{{$sala->id}}" method="POST" action="{{ route('salas.destroy', $sala->id) }}">
                                                @csrf
                                                @method('delete')
                                                <a class="cursor-pointer" onclick="getElementById('delete-form-{{$sala->id}}').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 3)    
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
                            <x-label for="medico_id" :value="__('Nombre Completo')" />

                            @isset($medico)
                                <x-input id="medico_id" class="block mt-1 w-full"
                                         type="hidden"
                                         name="medico_id"
                                         :value="$medico->id"
                                         required />
                                <x-input class="block mt-1 w-full"
                                         type="text"
                                         disabled
                                         value="{{$medico->user->name}}"
                                          />
                            @else
                                <x-select id="medico_id" name="medico_id" required>
                                    <option value="">{{__('Elige un medico')}}</option>
                                    @foreach ($medicos as $medico)
                                        <option value="{{$medico->id}}" @if (old('medico_id') == $medico->id) selected @endif>{{$medico->user->name}}</option>
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
                                <a href={{route('salas.index')}}>
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
</x-app-layout>
