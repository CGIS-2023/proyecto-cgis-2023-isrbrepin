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
        <h2 class="font-bold text-3xl leading-tight pt-0">
          {{ __('Mi perfil') }}
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
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white"><form method="POST" action="{{ route('logout') }}">
  @csrf <!-- Agrega el token CSRF -->
  <button type="submit" class="pl-4 text-lg">Cerrar sesión</button>
</form>

      </ul>
  </div>
</div>



  <div class="lg:mr-4 mx-auto float-left ml-0 sm:px-10 lg:px-2 w-full">
    <div class="bg-white border border-blue-500 shadow-sm sm:rounded-lg">
      <div class="bg-primary p-4 bg-blue-300">
        <h2 class="font-bold text-3xl leading-tight text-center pt-0">
          {{ __('Menú') }}
        </h2>
      </div>
      <ul>
      @if(Auth::user()->tipo_usuario_id == 3)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/camillas" class="pl-4 text-lg">Camillas</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/salas" class="pl-4 text-lg">Salas</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/salas" class="pl-4 text-lg">Pacientes</a></li>
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
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><form method="POST" action="{{ route('logout') }}">
  @csrf <!-- Agrega el token CSRF -->
  <button type="submit" class="pl-4 text-lg">Cerrar sesión</button>
</form>

      </ul>
  </div>
</div>


<div class="max-w-xs lg:mr-4 mx-auto float-left ml-0 sm:px-10 lg:px-2 w-full">
    <div class="bg-white border border-blue-500 shadow-sm sm:rounded-lg">
      <div class="bg-primary p-4 bg-blue-300">
        <h2 class="font-bold text-3xl leading-tight text-center pt-0">
          {{ __('Utilidades') }}
        </h2>
      </div>
      <ul>
      @if(Auth::user()->tipo_usuario_id == 3)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/camillas" class="pl-4 text-lg">Camillas</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/salas" class="pl-4 text-lg">Salas</a></li>
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/salas" class="pl-4 text-lg">Pacientes</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 2)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/camillas" class="pl-4 text-lg">Mis camillas</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 1)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/salas" class="pl-4 text-lg">Mis salas</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 1)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/medicos/{{ Auth::user()->medico->id }}/edit" class="pl-4 text-lg">Editar perfil</a></li>
        @endif
        @if(Auth::user()->tipo_usuario_id == 2)
        <li class="border-t border-2 border-gray-400 pt-3 pb-3 bg-white text-center"><a href="/celadors/{{ Auth::user()->celador->id }}/edit" class="pl-4 text-lg">Editar perfil</a></li>
        @endif
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
