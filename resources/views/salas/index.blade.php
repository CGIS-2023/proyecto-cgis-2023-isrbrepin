<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center mt-4 ml-2">
                    @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id != 2)
                    <form method="GET" action="{{ route('salas.create') }}">
                        <x-button type="subit" class="ml-4">
                                {{ __('Crea sala') }}
                        </x-button>
                    </form>
                    @endif
                    </div>
                @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 3)
                <div class="flex items-center mt-4 ml-2 justify-end">
                    <form method="GET" action="{{ route('salas.index') }}">
                        <div class="flex mr-6">
                            <input type="text" name="medico_nombre" placeholder="Buscar médico" class="px-2 py-1 border border-gray-300 rounded-md">
                                <x-button type="submit" class="ml-2">
                                    {{ __('Buscar') }}
                                </x-button>
                            @if (request()->has('medico_nombre'))
                            <a href="{{ route('salas.index') }}" class="ml-2 text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 4.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
                @endif

                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">
                                <a href="{{ route('salas.index', ['sort' => $currentOrder === 'asc' ? 'desc' : 'asc']) }}">
                                <span class="flex items-center">
                                <span>ID</span>
                                @if ($currentOrder === 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                                    </svg>
                                @elseif ($currentOrder === 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                    </svg>
                                @endif
                                </span>
                                </a>
                            </th>

                            <th class="py-3 px-6 text-left">Medico Encargado</th>
                            <th class="py-3 px-6 text-left">Fecha inicio</th>
                            <th class="py-3 px-6 text-left">Planta</th>
                            <th class="py-3 px-6 text-left">Numero</th>
                            <th class="py-3 px-6 text-left">Ubicación</th>
                            <th class="py-3 px-6 text-left">Nº Camillas Disponibles</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">

                        @foreach ($salas as $sala)
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
                                        <span class="font-medium">{{$sala->camillasDisponibles()}}</span>
                                    </div>
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-end">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('salas.show', $sala->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>

                                        @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id != 2)
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('salas.edit', $sala->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        @endif
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
                    {{ $salas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
