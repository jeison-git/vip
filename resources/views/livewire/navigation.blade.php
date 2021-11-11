@php
$nav_links = [
    [
        'name' => 'Mega Tienda Virtual',
        'route' => route('megatiendavirtual'),
        'active' => request()->routeIs('megatiendavirtual'),
    ],
    [
        'name' => 'Cliente Vip',
        'route' => route('vip-client'),
        'active' => request()->routeIs('vip-client'),
    ],
    [
        'name' => 'Aliados Comerciales Vip',
        'route' => route('vip-ally'),
        'active' => request()->routeIs('vip-ally'),
    ],
    [
        'name' => 'Comercios Vip',
        'route' => route('vip-commerce'),
        'active' => request()->routeIs('vip-commerce'),
    ],
];

@endphp{{-- fin links de navegacion --}}

<header class="sticky top-0 bg-gray-50" style="z-index: 900" x-data="dropdown()">{{-- header del menu de navegacion --}}

    <div class="hidden md:block">{{-- se debe ocultar estando en una pantalla pequeña --}}

        <div class="container topbar-menu-area">{{-- menu desplegable parte superior izquierda --}}
            <div>

                {{-- <div class="topbar-menu left-menu">
                    <ul>
                        <li class="menu-item">
                            <a title="Hotline: (+123) 456 789"><span
                                    class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                        </li>
                    </ul>
                </div> --}}

                <div class="topbar-menu right-menu">{{-- dropdown links de navegacion segun el rol --}}
                    <ul>

                        @if (Route::has('login'))
                            @auth

                                @if (Auth::user())

                                    <li class="menu-item menu-item-has-children parent">
                                        <a title="My Account" class="cursor-default">Hola de nuevo
                                            {{ Auth::user()->name }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency">

                                            @can('Only admin')

                                                <li class="menu-item">
                                                    <a title="Products" href="{{ route('admin.index') }}">Gestionar
                                                        productos</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Categories"
                                                        href="{{ route('admin.categories.index') }}">Gestionar categorias</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Brands" href="{{ route('admin.brands.index') }}">Gestionar
                                                        marcas</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage Home Sliders"
                                                        href="{{ route('admin.banners.index') }}">Gestionar
                                                        Publicidad </a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="All Order List"
                                                        href="{{ route('admin.orders.index') }}">Gestionar ordenes</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage Coupon" href="{{-- route('admin.coupons') --}}">Gestionar Cupón</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage Coupon"
                                                        href="{{ route('admin.contacts.index') }}">Gestionar Mensajes</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage users" href="{{ route('admin.users.index') }}">Gestionar
                                                        usuarios</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage Coupon" href="{{ route('admin.roles.index') }}">Gestionar
                                                        Roles</a>
                                                </li>
                                            @endcan

                                            @can('Ver dashboard')
                                                <li class="menu-item">
                                                    <a title="ATC" href="{{ route('admin.index') }}">Gestiones
                                                        ATC</a>
                                                </li>
                                            @endcan

                                            <li class="menu-item">
                                                <a title="Settings" href="{{ route('profile.show') }}">Gestionar
                                                    perfil</a>
                                            </li>

                                            <li class="menu-item">
                                                <a href="{{ route('logout') }}"
                                                    onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Cerrar sesión
                                                </a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>

                                        </ul>
                                    </li>

                                @else

                                    <li class="menu-item menu-item-has-children parent">
                                        <a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i
                                                class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency">

                                            <li class="menu-item">
                                                <a title="Dashboard" href="{{ route('profile.show') }}">Mi perfil</a>
                                            </li>

                                            <li class="menu-item">
                                                <a title="My Order List" href="{{ route('orders.index') }}">Mis
                                                    pedidos</a>
                                            </li>

                                            <li class="menu-item">
                                                <a href="{{ route('logout') }}"
                                                    onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Cerrar sesíon
                                                </a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>

                                @endif

                            @else
                                <li class="menu-item"><a title="Register or Login"
                                        href="{{ route('login') }}">Login</a></li>
                                <li class="menu-item"><a title="Register or Login"
                                        href="{{ route('register') }}">Register</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>{{-- end dropdown --}}

            </div>
        </div>{{-- end menu desplegable --}}

    </div>{{-- end Menu y links de navegacion pantalla grande, logo, componente search --}}

    <div class="container flex items-center justify-between h-16 md:justify-start">

        {{-- <a  :class="{'bg-opacity-100 text-orange-500' : open}"
            x-on:click="show()"
            class="flex flex-col items-center justify-center order-last h-full px-6 font-semibold text-white bg-white bg-opacity-25 cursor-pointer">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>

        </a> --}}

        <a href="/" class="items-center">
            <x-jet-application-mark class="block w-auto h-9" />{{-- logo /componente jestream --}}
        </a>

        <div class="flex-1 hidden mx-12 md:block"> {{-- componente livewire/search --}}
            @livewire('search')
        </div>

        <div class="hidden mx-12 md:block">
            @livewire('dropdown-order')
        </div>

        {{-- componente livewire/DropdownCart --}}
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>


        {{-- dropdown users --}}
        {{-- <div class="relative hidden mx-6 md:block">

            @auth

                @can('Ver dashboard')
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <button
                                class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            </button>

                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('orders.index') }}">
                                Mis ordenes
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('admin.index') }}">
                                Gestiones ATC
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>

                    @else

                    <x-jet-dropdown align="right" width="48">

                        <x-slot name="trigger">
                            <i class="text-3xl text-gray-400 cursor-pointer fas fa-user-circle"></i>
                        </x-slot>

                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('login') }}">
                                {{ __('Login') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-jet-dropdown-link>
                        </x-slot>

                    </x-jet-dropdown>

                @endcan

            @endauth
        </div> --}}

    </div>

    <hr>{{-- revisar luego y modificar}}

    {{-- Menu prueba links de afiliacion --}}

    <div class="flex-1 hidden lg:block">
        <div class="container nav-section header-sticky">

            <div class="flex ml-12 header-nav-section">{{-- Links para planes --}}
                <div class="container">

                    <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                        <li class="menu-item">
                            <a href="#" class="link-term">Mega Tienda Virtual</a>
                            <span class="nav-label hot-label">Vip</span>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="link-term">Afiliate Cliente</a>
                            <span class="nav-label hot-label">Vip</span>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="link-term">Afiliate Aliados Comerciales</a>
                            <span class="nav-label hot-label">Vip</span>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="link-term">Afiliate Comercio</a>
                            <span class="nav-label hot-label">Vip</span>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>{{-- end links de afiliacion --}}

    <div class="container items-center space-x-8 sm:-my-px sm:ml-10 sm:flex">{{-- links inferiores de navegacion, categorias, ciente vip, aliados comerciales, etc.. --}}

        <ul class="hidden md:block md:order-first">{{-- ocultar en pantallas pequeñas --}}

            <a href=" /" class="link-term mercado-item-title">{{-- icono de shoping bag con enlace a la pagina principal --}}

                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172"
                    style=" fill:#000000;">
                    <g transform="">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g>
                                <g id="_x31_0_Bag_Shopping_Cart_Store_Sale_Shop">
                                    <path
                                        d="M149.9625,147.8125h-130.34375c-4.8375,0 -8.6,-4.03125 -8.0625,-8.86875l9.1375,-96.75c0.26875,-4.03125 3.7625,-7.25625 8.0625,-7.25625h114.21875c4.3,0 7.79375,3.225 8.0625,7.525l6.9875,96.75c0.26875,4.56875 -3.49375,8.6 -8.0625,8.6z"
                                        fill="#f9e3ae"></path>
                                    <path d="M21.5,34.9375h129v10.75h-129z" fill="#faefde"></path>
                                    <path
                                        d="M148.61875,118.25h-125.2375c-4.3,0 -7.525,3.225 -8.0625,7.25625l-1.34375,13.4375c-0.5375,4.8375 3.225,8.86875 8.0625,8.86875h127.3875c4.8375,0 8.33125,-4.03125 8.0625,-8.86875l-1.34375,-13.4375c0,-4.03125 -3.49375,-7.25625 -7.525,-7.25625z"
                                        fill="#f6d397"></path>
                                    <path
                                        d="M56.4375,56.4375c-2.96853,0 -5.375,2.40647 -5.375,5.375c0,2.96853 2.40647,5.375 5.375,5.375c2.96853,0 5.375,-2.40647 5.375,-5.375c0,-2.96853 -2.40647,-5.375 -5.375,-5.375zM115.5625,56.4375c-2.96853,0 -5.375,2.40647 -5.375,5.375c0,2.96853 2.40647,5.375 5.375,5.375c2.96853,0 5.375,-2.40647 5.375,-5.375c0,-2.96853 -2.40647,-5.375 -5.375,-5.375z"
                                        fill="#72caaf"></path>
                                    <path
                                        d="M115.5625,53.75c-4.56875,0 -8.0625,3.49375 -8.0625,8.0625c0,3.49375 2.15,6.45 5.375,7.525c-1.075,13.70625 -12.63125,24.725 -26.875,24.725c-14.24375,0 -25.53125,-11.01875 -26.875,-24.725c2.95625,-1.075 5.375,-4.03125 5.375,-7.525c0,-4.56875 -3.49375,-8.0625 -8.0625,-8.0625c-4.56875,0 -8.0625,3.49375 -8.0625,8.0625c0,3.49375 2.41875,6.45 5.375,7.525c1.34375,16.93125 15.31875,30.1 32.25,30.1c16.93125,0 30.90625,-13.16875 32.25,-30.1c3.225,-1.075 5.375,-4.03125 5.375,-7.525c0,-4.56875 -3.49375,-8.0625 -8.0625,-8.0625zM56.4375,58.31875c1.88125,0 3.49375,1.6125 3.49375,3.49375c0,1.88125 -1.6125,3.49375 -3.49375,3.49375c-1.88125,0 -3.49375,-1.6125 -3.49375,-3.49375c0,-1.88125 1.6125,-3.49375 3.49375,-3.49375zM115.5625,65.575c-2.15,0 -3.7625,-1.6125 -3.7625,-3.7625c0,-2.15 1.6125,-3.7625 3.7625,-3.7625c2.15,0 3.7625,1.6125 3.7625,3.7625c0,2.15 -1.6125,3.7625 -3.7625,3.7625zM24.1875,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM37.625,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM51.0625,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM64.5,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM77.9375,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM94.0625,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM107.5,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM120.9375,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM134.375,129c-1.6125,0 -2.6875,1.075 -2.6875,2.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875zM145.125,131.6875v5.375c0,1.6125 1.075,2.6875 2.6875,2.6875c1.6125,0 2.6875,-1.075 2.6875,-2.6875v-5.375c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875c-1.6125,0 -2.6875,1.075 -2.6875,2.6875z"
                                        fill="#8d6c9f"></path>
                                    <path
                                        d="M153.45625,39.775c-0.26875,-4.3 -3.7625,-7.525 -8.0625,-7.525h-27.4125c-1.34375,-16.39375 -15.05,-29.5625 -31.98125,-29.5625c-16.93125,0 -30.6375,13.16875 -31.98125,29.5625h-27.4125c-4.3,0 -7.79375,3.225 -8.0625,7.525l-7.25625,102.125c-0.26875,2.15 0.5375,4.3 2.15,5.9125c1.6125,1.6125 3.7625,2.6875 5.9125,2.6875h133.56875c2.15,0 4.3,-0.80625 5.9125,-2.6875c1.6125,-1.88125 2.41875,-3.7625 2.15,-6.18125zM86,8.0625c13.975,0 25.2625,10.75 26.60625,24.1875h-53.2125c1.34375,-13.4375 12.63125,-24.1875 26.60625,-24.1875zM154.8,144.31875c-0.5375,0.5375 -1.34375,0.80625 -1.88125,0.80625h-133.8375c-0.80625,0 -1.34375,-0.26875 -1.88125,-0.80625c-0.5375,-0.5375 -0.80625,-1.34375 -0.80625,-2.15l6.71875,-93.79375h92.45c1.6125,0 2.6875,-1.075 2.6875,-2.6875c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875h-91.9125l0.26875,-2.95625c0,-1.34375 1.34375,-2.41875 2.6875,-2.41875h119.05625c1.34375,0 2.6875,1.075 2.6875,2.41875l7.25625,102.125c0,0.80625 -0.26875,1.6125 -0.80625,2.15z"
                                        fill="#8d6c9f"></path>
                                    <path
                                        d="M137.0625,43h-10.75c-1.6125,0 -2.6875,1.075 -2.6875,2.6875c0,1.6125 1.075,2.6875 2.6875,2.6875h10.75c1.6125,0 2.6875,-1.075 2.6875,-2.6875c0,-1.6125 -1.075,-2.6875 -2.6875,-2.6875z"
                                        fill="#8d6c9f"></path>
                                </g>
                            </g>
                            <path d="" fill="none"></path>
                            <path d="" fill="none"></path>
                        </g>
                    </g>
                </svg>
            </a>

        </ul>{{-- end icono de shopping bag --}}

        <a :class="{'bg-opacity-100 text-gold' : open}" x-on:click="show()" {{-- ico de categorias --}}
            class="flex flex-col items-center justify-center order-last hidden h-full px-6 text-black bg-white bg-opacity-25 cursor-pointer md:order-first md:px-4 md:block">

            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172"
                style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                    style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g>
                        <path
                            d="M158.5625,56.4375h-112.875c-2.96969,0 -5.375,-2.40531 -5.375,-5.375v-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375h112.875c2.96969,0 5.375,2.40531 5.375,5.375v5.375c0,2.96969 -2.40531,5.375 -5.375,5.375z"
                            fill="#efb810"></path>
                        <path
                            d="M24.1875,56.4375h-5.375c-2.96969,0 -5.375,-2.40531 -5.375,-5.375v-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375h5.375c2.96969,0 5.375,2.40531 5.375,5.375v5.375c0,2.96969 -2.40531,5.375 -5.375,5.375z"
                            fill="#3498db"></path>
                        <path
                            d="M126.3125,88.6875h-80.625c-2.96969,0 -5.375,-2.40531 -5.375,-5.375v-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375h80.625c2.96969,0 5.375,2.40531 5.375,5.375v5.375c0,2.96969 -2.40531,5.375 -5.375,5.375z"
                            fill="#efb810"></path>
                        <path
                            d="M24.1875,88.6875h-5.375c-2.96969,0 -5.375,-2.40531 -5.375,-5.375v-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375h5.375c2.96969,0 5.375,2.40531 5.375,5.375v5.375c0,2.96969 -2.40531,5.375 -5.375,5.375z"
                            fill="#3498db"></path>
                        <path
                            d="M94.0625,120.9375h-48.375c-2.96969,0 -5.375,-2.40531 -5.375,-5.375v-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375h48.375c2.96969,0 5.375,2.40531 5.375,5.375v5.375c0,2.96969 -2.40531,5.375 -5.375,5.375z"
                            fill="#efb810"></path>
                        <path
                            d="M24.1875,120.9375h-5.375c-2.96969,0 -5.375,-2.40531 -5.375,-5.375v-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375h5.375c2.96969,0 5.375,2.40531 5.375,5.375v5.375c0,2.96969 -2.40531,5.375 -5.375,5.375z"
                            fill="#3498db"></path>
                        <path
                            d="M61.8125,153.1875h-16.125c-2.96969,0 -5.375,-2.40531 -5.375,-5.375v-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375h16.125c2.96969,0 5.375,2.40531 5.375,5.375v5.375c0,2.96969 -2.40531,5.375 -5.375,5.375z"
                            fill="#efb810"></path>
                        <path
                            d="M24.1875,153.1875h-5.375c-2.96969,0 -5.375,-2.40531 -5.375,-5.375v-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375h5.375c2.96969,0 5.375,2.40531 5.375,5.375v5.375c0,2.96969 -2.40531,5.375 -5.375,5.375z"
                            fill="#3498db"></path>
                        <path
                            d="M26.875,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM13.4375,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM40.3125,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM53.75,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM67.1875,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM80.625,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM94.0625,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM107.5,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM120.9375,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM134.375,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM147.8125,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM161.25,27.02819c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875zM158.5625,37.625h-112.875c-4.44512,0 -8.0625,3.61738 -8.0625,8.0625v5.375c0,4.44512 3.61738,8.0625 8.0625,8.0625h112.875c4.44512,0 8.0625,-3.61738 8.0625,-8.0625v-5.375c0,-4.44512 -3.61737,-8.0625 -8.0625,-8.0625zM161.25,51.0625c0,1.48081 -1.204,2.6875 -2.6875,2.6875h-112.875c-1.4835,0 -2.6875,-1.20669 -2.6875,-2.6875v-5.375c0,-1.48081 1.204,-2.6875 2.6875,-2.6875h112.875c1.4835,0 2.6875,1.20669 2.6875,2.6875zM24.1875,37.625h-5.375c-4.44512,0 -8.0625,3.61738 -8.0625,8.0625v5.375c0,4.44512 3.61738,8.0625 8.0625,8.0625h5.375c4.44513,0 8.0625,-3.61738 8.0625,-8.0625v-5.375c0,-4.44512 -3.61737,-8.0625 -8.0625,-8.0625zM26.875,51.0625c0,1.48081 -1.204,2.6875 -2.6875,2.6875h-5.375c-1.4835,0 -2.6875,-1.20669 -2.6875,-2.6875v-5.375c0,-1.48081 1.204,-2.6875 2.6875,-2.6875h5.375c1.4835,0 2.6875,1.20669 2.6875,2.6875zM126.3125,69.875h-80.625c-4.44512,0 -8.0625,3.61737 -8.0625,8.0625v5.375c0,4.44512 3.61738,8.0625 8.0625,8.0625h80.625c4.44512,0 8.0625,-3.61738 8.0625,-8.0625v-5.375c0,-4.44513 -3.61737,-8.0625 -8.0625,-8.0625zM129,83.3125c0,1.48081 -1.204,2.6875 -2.6875,2.6875h-80.625c-1.4835,0 -2.6875,-1.20669 -2.6875,-2.6875v-5.375c0,-1.48081 1.204,-2.6875 2.6875,-2.6875h80.625c1.4835,0 2.6875,1.20669 2.6875,2.6875zM24.1875,69.875h-5.375c-4.44512,0 -8.0625,3.61737 -8.0625,8.0625v5.375c0,4.44512 3.61738,8.0625 8.0625,8.0625h5.375c4.44513,0 8.0625,-3.61738 8.0625,-8.0625v-5.375c0,-4.44513 -3.61737,-8.0625 -8.0625,-8.0625zM26.875,83.3125c0,1.48081 -1.204,2.6875 -2.6875,2.6875h-5.375c-1.4835,0 -2.6875,-1.20669 -2.6875,-2.6875v-5.375c0,-1.48081 1.204,-2.6875 2.6875,-2.6875h5.375c1.4835,0 2.6875,1.20669 2.6875,2.6875zM94.0625,102.125h-48.375c-4.44512,0 -8.0625,3.61738 -8.0625,8.0625v5.375c0,4.44512 3.61738,8.0625 8.0625,8.0625h48.375c4.44512,0 8.0625,-3.61738 8.0625,-8.0625v-5.375c0,-4.44513 -3.61737,-8.0625 -8.0625,-8.0625zM96.75,115.5625c0,1.48081 -1.204,2.6875 -2.6875,2.6875h-48.375c-1.4835,0 -2.6875,-1.20669 -2.6875,-2.6875v-5.375c0,-1.48081 1.204,-2.6875 2.6875,-2.6875h48.375c1.4835,0 2.6875,1.20669 2.6875,2.6875zM24.1875,102.125h-5.375c-4.44512,0 -8.0625,3.61738 -8.0625,8.0625v5.375c0,4.44512 3.61738,8.0625 8.0625,8.0625h5.375c4.44513,0 8.0625,-3.61738 8.0625,-8.0625v-5.375c0,-4.44513 -3.61737,-8.0625 -8.0625,-8.0625zM26.875,115.5625c0,1.48081 -1.204,2.6875 -2.6875,2.6875h-5.375c-1.4835,0 -2.6875,-1.20669 -2.6875,-2.6875v-5.375c0,-1.48081 1.204,-2.6875 2.6875,-2.6875h5.375c1.4835,0 2.6875,1.20669 2.6875,2.6875zM61.8125,134.375h-16.125c-4.44512,0 -8.0625,3.61738 -8.0625,8.0625v5.375c0,4.44512 3.61738,8.0625 8.0625,8.0625h16.125c4.44513,0 8.0625,-3.61738 8.0625,-8.0625v-5.375c0,-4.44513 -3.61737,-8.0625 -8.0625,-8.0625zM64.5,147.8125c0,1.48081 -1.204,2.6875 -2.6875,2.6875h-16.125c-1.4835,0 -2.6875,-1.20669 -2.6875,-2.6875v-5.375c0,-1.48081 1.204,-2.6875 2.6875,-2.6875h16.125c1.4835,0 2.6875,1.20669 2.6875,2.6875zM24.1875,134.375h-5.375c-4.44512,0 -8.0625,3.61738 -8.0625,8.0625v5.375c0,4.44512 3.61738,8.0625 8.0625,8.0625h5.375c4.44513,0 8.0625,-3.61738 8.0625,-8.0625v-5.375c0,-4.44513 -3.61737,-8.0625 -8.0625,-8.0625zM26.875,147.8125c0,1.48081 -1.204,2.6875 -2.6875,2.6875h-5.375c-1.4835,0 -2.6875,-1.20669 -2.6875,-2.6875v-5.375c0,-1.48081 1.204,-2.6875 2.6875,-2.6875h5.375c1.4835,0 2.6875,1.20669 2.6875,2.6875z"
                            fill="#9b59b6"></path>
                    </g>
                </g>
            </svg>
        </a>{{-- end icono categorias --}}

        <div class="flex-1 hidden md:block">{{-- links de navegacion: recibe los datos de la variable $nav_link ejecutada en la sentencia php que esta en el principio de esta view --}}
            @foreach ($nav_links as $nav_link)
                <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                    {{ $nav_link['name'] }}
                </x-jet-nav-link>
            @endforeach
        </div>


         <!-- Hamburger -->
         <div class="flex items-center -mr-2 sm:hidden"  x-on:click="show()">
            <button {{--  @click="open = ! open" --}} class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </div>{{-- end --}}

    {{-- Menu fin prueba --}}

    <nav id="navigation-menu" x-show="open" :class="{'block': open, 'hidden': !open}"
        class="absolute hidden w-full bg-opacity-25 bg-trueGray-700">

        <div class="container hidden h-full md:block">{{-- Menu categorias y subcategorias computadora --}}

            <div x-on:click.away="close()" class="relative grid h-full grid-cols-4">
                <ul class="bg-white">
                    <div class="mt-8">
                        <p class="mb-3 text-lg font-bold text-center text-trueGray-500">Categorías</p>
                        @foreach ($categories as $category)
                            <li class="navigation-link text-trueGray-500 hover:bg-gold hover:text-white">
                                <a href="{{ route('categories.show', $category) }}"
                                    class="flex items-center px-4 py-2 text-sm">

                                    <span class="flex justify-center w-9">
                                        {!! $category->icon !!}
                                    </span>

                                    {{ $category->name }}
                                </a>


                                <div class="absolute top-0 right-0 hidden w-3/4 h-full bg-gray-100 navigation-submenu">
                                    <x-components.navigation-subcategories :category="$category" />
                                </div>

                            </li>
                        @endforeach
                    </div>

                </ul>

                <div class="col-span-3 bg-gray-100">
                    <x-components.navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>{{-- end --}}



        {{-- menu  celular, Categorias y links de navegacion --}}
        <div class="h-full mb-6 overflow-y-auto bg-white">

            <div class="container py-3 mb-2 bg-gray-200">{{-- componente Search resource/livewire/search --}}
                @livewire('search')
            </div>

            <div class="pt-2 pb-3 space-y-1">{{-- links de navegacion --}}
                @foreach ($nav_links as $nav_link)

                    <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                        {{ $nav_link['name'] }}
                    </x-jet-responsive-nav-link>

                @endforeach
            </div>

            <p class="px-6 my-2 text-trueGray-500">CATEGORÍAS</p>

            <ul class="pt-2 pb-3 space-y-1">
                @foreach ($categories as $key=>$item)

                    <li class="text-trueGray-500">
                        <x-jet-responsive-nav-link href="{{ route('categories.show', $item) }}"
                            class="flex items-center px-4 text-sm">

                            <span class="flex justify-center w-9">
                                {!! $item->icon !!}
                            </span>

                            {{ $item->name }}
                        </x-jet-responsive-nav-link >
                    </li>
                    
                @endforeach
            </ul>

            <p class="px-6 my-2 text-trueGray-500">USUARIOS</p>

            @livewire('cart-phone'){{-- componente resources/livewire/cart-phone --}}

            @auth

                <x-jet-responsive-nav-link href="{{ route('orders.index') }}" :active="request()->routeIs('orders.index')"
                    class="flex items-center px-4 py-2 text-sm text-trueGray-500">

                    <span class="flex justify-center w-9">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </span>

                    Mis pedidos
                </x-jet-responsive-nav-link>


                @can('Ver dashboard'){{-- solo los que tengan este permiso pueden visualisar esta opcion --}}

                    <x-jet-responsive-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')"
                        class="flex items-center px-4 py-2 text-sm text-trueGray-500">

                        <span class="flex justify-center w-9">
                            <i class="fa fa-cogs"></i>
                        </span>

                        Gestiones ATC
                    </x-jet-responsive-nav-link>

                @endcan

                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')"
                    class="flex items-center px-4 py-2 text-sm text-trueGray-500">

                    <span class="flex justify-center w-9">
                        <i class="far fa-address-card"></i>
                    </span>

                    Perfil
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('logout') }}" :active="request()->routeIs('logout')"
                    onClick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center px-4 py-2 text-sm text-trueGray-500">

                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>

                    Cerrar sesión
                </x-jet-responsive-nav-link>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

                <div class="py-8"></div>

            @else
                <x-jet-responsive-nav-link  href="{{ route('login') }}" :active="request()->routeIs('login')"
                    class="flex items-center px-4 py-2 text-sm text-trueGray-500 ">

                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-circle"></i>
                    </span>

                    Iniciar sesión
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')"
                    class="flex items-center px-4 py-2 text-sm text-trueGray-500 ">

                    <span class="flex justify-center w-9">
                        <i class="fas fa-fingerprint"></i>
                    </span>

                    registrate
                </x-jet-responsive-nav-link>
            @endauth

        </div>

        {{-- end menu responsive --}}

    </nav>
</header> 
