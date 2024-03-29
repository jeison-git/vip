{{-- @php
    $nav_links = [ 
        [
            'name'   => 'Productos',
            'route'  => route('admin.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Comercios',
            'route'  => route('admin.commerces.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Ordenes',
            'route'  => route('admin.orders.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Categorias',
            'route'  => route('admin.categories.index'),
            'active' => request()->routeIs('admin.*')
        ],        
        [
            'name'   => 'Marcas',
            'route'  => route('admin.brands.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Publicidad',
            'route'  => route('admin.banners.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Departamentos',
            'route'  => route('admin.departments.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Mensajes',
            'route'  => route('admin.contacts.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Usuarios',
            'route'  => route('admin.users.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Ordenes',
            'route'  => route('admin.orders.index'),
            'active' => request()->routeIs('admin.*')
        ],
        [
            'name'   => 'Roles',
            'route'  => route('admin.roles.index'),
            'active' => request()->routeIs('admin.*')
        ],
       
    ];

@endphp --}} 
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center justify-between">
                        {{-- <x-jet-application-mark class="block w-auto h-9" /> --}}
                        <img class="block w-auto h-9" src="https://img.icons8.com/doodle/64/000000/cafe-building.png"/> Tienda 
                    </a>
                </div>

               {{--  <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach ($nav_links as $nav_link)                    
                       <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                        {{ $nav_link['name'] }}
                       </x-jet-nav-link>
                    @endforeach
                </div> --}}

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ml-10 sm:flex">

                    <x-jet-nav-link  class="mr-0" href="{{route('admin.index')}}" :active="request()->routeIs('admin.index')">
                        Productos
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.commerces.index')}}" :active="request()->routeIs('admin.commerces.*')">
                        Comercios
                    </x-jet-nav-link>                   

                    <x-jet-nav-link class="mr-0" href="{{route('admin.orders.index')}}" :active="request()->routeIs('admin.orders.*')">
                        Ordenes
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.categories.index')}}" :active="request()->routeIs('admin.categories.*')">
                        Categorias
                    </x-jet-nav-link>
                    
                    <x-jet-nav-link class="mr-0" href="{{route('admin.brands.index')}}" :active="request()->routeIs('admin.brands.*')">
                        Marcas
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.banners.index')}}" :active="request()->routeIs('admin.banners.*')">
                        Publicidad
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.departments.index')}}" :active="request()->routeIs('admin.departments.index')">
                        Departamentos
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.applications.index')}}" :active="request()->routeIs('admin.applications.index')">
                        Solicitud
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.contacts.index')}}" :active="request()->routeIs('admin.contacts.index')">
                        Mensajes
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.users.index')}}" :active="request()->routeIs('admin.users.index')">
                        Usuarios
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.subscriptions.index')}}" :active="request()->routeIs('admin.subscriptions.index')">
                        Suscripción
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="{{route('admin.credentials.index')}}" :active="request()->routeIs('admin.credentials.index')">
                        Credenciales
                    </x-jet-nav-link>

                    @can('Only admin')                     

                    <x-jet-nav-link class="mr-0" href="{{route('admin.roles.index')}}" :active="request()->routeIs('admin.roles.index')">
                        Roles
                    </x-jet-nav-link>

                    <x-jet-nav-link class="mr-0" href="/admin/analyticsdata">
                        Data
                    </x-jet-nav-link> 

                    @endcan

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative ml-3">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative ml-3">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                    <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div> 
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{route('admin.index')}}" :active="request()->routeIs('admin.index')">
                Productos
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.commerces.index')}}" :active="request()->routeIs('admin.commerces.*')">
                Comercios
            </x-jet-responsive-nav-link> 

            <x-jet-responsive-nav-link href="{{route('admin.orders.index')}}" :active="request()->routeIs('admin.orders.*')">
                Ordenes
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.categories.index')}}" :active="request()->routeIs('admin.categories.*')">
                Categorías
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.brands.index')}}" :active="request()->routeIs('admin.brands.*')">
                Marcas
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.banners.index')}}" :active="request()->routeIs('admin.banners.*')">
                Publicidad
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.departments.index')}}" :active="request()->routeIs('admin.departments.index')">
                Departamentos
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.contacts.index')}}" :active="request()->routeIs('admin.contacts.index')">
                Mensajes
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.applications.index')}}" :active="request()->routeIs('admin.applications.index')">
                Solicitud
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.users.index')}}" :active="request()->routeIs('admin.users.index')">
                Usuarios
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.subscriptions.index')}}" :active="request()->routeIs('admin.subscriptions.index')">
                Suscripción
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{route('admin.credentials.index')}}" :active="request()->routeIs('admin.credentials.index')">
                Credenciales
            </x-jet-responsive-nav-link>

            @can('Only admin')  
            
            <x-jet-responsive-nav-link href="{{route('admin.roles.index')}}" :active="request()->routeIs('admin.roles.index')">
                Roles
            </x-jet-responsive-nav-link>
            {{-- <x-jet-responsive-nav-link href="{{route('analyticsdata')}}" :active="request()->routeIs('analyticsdata')">
                Analytics
            </x-jet-responsive-nav-link> --}}
                
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
