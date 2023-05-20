<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">  
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
    <div class="bg-blue-300 overflow-hidden shadow-sm sm:rounded-lg ">
      <div class="p-6 border border-blue-500">
        @if(in_array(Auth::user()->tipo_usuario_id, [1,2]))
        <h1 class="text-center font-bold text-3xl">Bienvenido, {{ Auth::user()->tipo_usuario }}  {{ Auth::user()->name }}!</h1>
        @endif
        @if(Auth::user()->tipo_usuario_id == 3)
        <h1 class="text-center font-bold text-3xl">Bienvenido, {{ Auth::user()->name }}!</h1>
        @endif
      </div>
    </div>


    
    <div class="flex flex-row mt-4">
  <div class="max-w-xs lg:mr-4 mx-auto float-left ml-0 sm:px-10 lg:px-3 w-full">
    <div class="bg-white border border-blue-500 shadow-sm sm:rounded-lg">
      <div class="bg-primary p-4 bg-blue-300">
        <h2 class="font-bold text-3xl leading-tight pt-0" style="display: flex; align-items: center; justify-content: center;">
            {{ __('Mi perfil') }}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </h2>

      </div>
      <ul>
      @if(Auth::user()->tipo_usuario_id == 3)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white"><a href="/camillas" class="pl-4 text-lg">Camillas</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white"><a href="/salas" class="pl-4 text-lg">Salas</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white"><a href="/salas" class="pl-4 text-lg">Pacientes</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 2)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white"><a href="/camillas" class="pl-4 text-lg">Mis camillas</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 1)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white"><a href="/salas" class="pl-4 text-lg">Mis salas</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 1)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white"><a href="/medicos/{{ Auth::user()->medico->id }}/edit" class="pl-4 text-lg">Editar perfil</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 2)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white"><a href="/celadors/{{ Auth::user()->celador->id }}/edit" class="pl-4 text-lg">Editar perfil</a></li>
        @endif
      </ul>
  </div>
</div>


@if(Auth::user()->tipo_usuario_id == 3)
  <div class="lg:mr-4 mx-auto float-left ml-0 sm:px-10 lg:px-2 w-full">
    <div class="bg-white border border-blue-500 shadow-sm sm:rounded-lg">
      <div class="bg-primary p-4 bg-blue-300">
      <h2 class="font-bold text-3xl leading-tight pt-0" style="display: flex; align-items: center; justify-content: center;">
          {{ __('Menú') }}
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
          </svg>
        </h2>
      </div>
      <ul>
      @if(Auth::user()->tipo_usuario_id == 3)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/sueldos" class="pl-4 text-lg">Gastos en personal</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/inventarios" class="pl-4 text-lg">Gastos en inventario</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/api/celadors" class="pl-4 text-lg">API</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 2)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/camillas" class="pl-4 text-lg">Mis camillas</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 1)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/salas" class="pl-4 text-lg ">Mis salas</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 1)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/medicos/{{ Auth::user()->medico->id }}/edit" class="pl-4 text-lg">Editar perfil</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 2)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/celadors/{{ Auth::user()->celador->id }}/edit" class="pl-4 text-lg">Editar perfil</a></li>
        @endif
      </ul>
  </div>
</div>
@endif

<div class="max-w-xs lg:mr-4 mx-auto float-left ml-0 sm:px-10 lg:px-2 w-full">
    <div class="bg-white border border-blue-500 shadow-sm sm:rounded-lg">
      <div class="bg-primary p-4 bg-blue-300">
      <h2 class="font-bold text-3xl leading-tight pt-0" style="display: flex; align-items: center; justify-content: center;">
        {{ __('Utilidades') }}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </h2>

      </div>
      <ul>
      <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/api/celadors" class="pl-4 text-lg">API</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><form method="POST" action="{{ route('logout') }}">
  @csrf <!-- Agrega el token CSRF -->
  <button type="submit" class="pl-4 text-lg">Cerrar sesión</button>
</form>

      </ul>
  </div>
</div>

    
    <style>
  .menu-item {
    border-bottom: 1px solid #ccc;
  }
</style>


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
