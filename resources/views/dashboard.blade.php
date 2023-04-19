<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Bienvenido, {{ Auth::user()->tipo_usuario }}  {{ Auth::user()->name }}!</h1>
                    <p>Esta es la vista que puedes encontrar en resources/views/dashboard.blade.php. Si quisiéramos utilizar esta vista como panel de control inicial podríamos hacer un controlador como HomeController, comprobar el tipo de usuario (en este proyecto aún no hay) y renderizar una cosa u otra.</p>
                    <p>En este caso, navega en el menú superior para ver las opciones que os he creado de ejemplo</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('salas.index')" :active="request()->routeIs('salas.index') or request()->routeIs('salas.create') or request()->routeIs('salas.edit') or request()->routeIs('salas.show')">
                                {{ __('Salas') }}
                            </x-nav-link>

                            <x-nav-link :href="route('celadors.index')" :active="request()->routeIs('celadors.index') or request()->routeIs('celadors.create') or request()->routeIs('celadors.edit') or request()->routeIs('celadors.show')">
                                {{ __('Celadores') }}
                            </x-nav-link>
                </div>
    -->
    
</x-app-layout>
