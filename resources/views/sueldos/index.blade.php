<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gastos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex items-center mt-4 ml-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nombre Completo</th>
                            <th class="py-3 px-6 text-left">Gasto mensual</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        <?php $totalSueldos = 0; ?>
                        @foreach ($sueldos as $sueldo)
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sueldo->user->name}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sueldo->sueldo}} €</span>
                                    </div>
                                </td>
                                
                            </tr>
                            <?php $totalSueldos += $sueldo->sueldo; ?>
                        @endforeach
                        <tr>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-bold">Total gastos mensuales:</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-bold">{{ $totalSueldos }} €</span>
                    </div>
                </td>
            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nombre Completo</th>
                            <th class="py-3 px-6 text-left">Gastos anuales</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        <?php $totalSueldos = 0; ?>
                        @foreach ($sueldos as $sueldo)
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sueldo->user->name}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$sueldo->sueldo * 12}} €</span>
                                    </div>
                                </td>
                                
                            </tr>
                            <?php $totalSueldos += $sueldo->sueldo; ?>
                        @endforeach
                        <tr>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-bold">Total Gastos anuales:</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-bold">{{ $totalSueldos * 12}} €</span>
                    </div>
                </td>
                
            </tr>
            
                        </tbody>
                        
                    </table>
                    
                </div>
                <div class="position-fixed fixed-bottom fixed-right mt-4 mr-4">
    <x-button type="button" class="bg-red-800 hover:bg-red-700">
        <a href="{{ route('dashboard') }}">
            {{ __('Volver') }}
        </a>
    </x-button>
</div>

</x-app-layout>
