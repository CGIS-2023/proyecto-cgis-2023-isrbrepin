<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                   
                            <x-nav-link :href="route('salas.index')" :active="request()->routeIs('salas.index') or request()->routeIs('salas.create') or request()->routeIs('salas.edit') or request()->routeIs('salas.show')">
                                {{ __('Salas') }}
                            </x-nav-link>
                </div>
            </div>
            <!-- Settings Dropdown -->
                        <!-- Authentication -->
        </div>
    </div>
</nav>
