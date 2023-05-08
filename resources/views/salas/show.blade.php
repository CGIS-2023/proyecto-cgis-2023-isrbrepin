<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                {{-- <li class="flex items-center">
                  <a href="#">Home</a>
                  <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li> --}}
                <li class="flex items-center">
                    <a href="{{ route('salas.index') }}">Salas</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li>
                    <a href="#" class="text-gray-500" aria-current="page">Ver sala</a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Información de la sala
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        @csrf
                        @method('put')

                        <div class="mt-4">
                            <x-label for="name" :value="__('Medico Encargado')" />

                            <x-input id="name" class="block mt-1 w-full"
                                     type="text"
                                     name="name"
                                     disabled
                                     :value="$sala->medico->user->name"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="fecha_hora_inicio" :value="__('Fecha y hora')" />

                            <x-input id="fecha_hora_inicio" class="block mt-1 w-full"
                                     type="datetime-local"
                                     name="fecha_hora_inicio"
                                     disabled
                                     :value="$sala->fecha_hora_inicio->format('Y-m-d\TH:i:s')"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="planta" :value="__('Planta')" />

                            <x-input id="planta" class="block mt-1 w-full"
                                     type="text"
                                     name="planta"
                                     disabled
                                     :value="$sala->planta"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="numero_sala" :value="__('Numero de Sala')" />

                            <x-input id="numero_sala" class="block mt-1 w-full"
                                     type="text"
                                     name="numero_sala"
                                     disabled
                                     :value="$sala->numero_sala"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="planta_numero" :value="__('Ubicación')" />

                            <x-input id="planta_numero" class="block mt-1 w-full"
                                     type="text"
                                     name="planta_numero"
                                     disabled
                                     :value="$sala->planta_numero"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="numero_camillas" :value="__('Número de Camillas')" />

                            <x-input id="numero_camillas" class="block mt-1 w-full"
                                     type="text"
                                     name="numero_camillas"
                                     disabled
                                     :value="$sala->numero_camillas"
                                     required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                <a href={{route('salas.index')}}>
                                    {{ __('Volver') }}
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
                    Camillas actuales en sala
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Camilla</th>
                            <th class="py-3 px-6 text-left">Paciente asociado</th>
                            <th class="py-3 px-6 text-left">Celador asociado</th>
                            <th class="py-3 px-6 text-right">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($sala->camillas as $camilla)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$camilla->tipo_camilla->tipo}} ({{__('Id = ')}} {{$camilla->id}})</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $camilla->paciente ? $camilla->paciente->nombre_apellido : '-' }} </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$camilla->celador->user->name}}</span>
                                    </div>
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">

                                        {{--<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('camillas.edit', $camilla->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>--}}
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <form id="detach-form-{{$sala->id}}-{{$camilla->id}}" method="POST" action="{{ route('salas.detachCamilla', [$sala->id, $camilla->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <a class="cursor-pointer" onclick="getElementById('detach-form-{{$sala->id}}-{{$camilla->id}}').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </form>

                                        </div>
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
</x-app-layout>
