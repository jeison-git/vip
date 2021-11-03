<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/assets/css/style.css') }}">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    {{-- Glider --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css"
        integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- FlexSlider --}}
    <link rel="stylesheet" href="{{ asset('vendor/sleder/flexslider.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Glider --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js"
        integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- FlexSlider --}}
    <script src="{{ asset('vendor/sleder/jquery.flexslider-min.js') }}"></script>

</head>


<body class="font-sans antialiased">
    <x-jet-banner />


    {{-- -prueba header --}}
    <header id="header" class="sticky top-0 " style="z-index: 900" x-data="dropdown()">
        <div class="flex items-center justify-between container-fluid md:justify-start">
            <div class="row">




                <div class="flex-1 topbar-menu-area ">
                    <div >
                        {{-- <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item">
                                    <a title="Hotline: (+123) 456 789" href="#"><span
                                            class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="topbar-menu right-menu">
                            <ul>

                                @if (Route::has('login'))
                                    @auth
                                        {{-- @if (Auth::user()->user_type === 'ADM') --}}

                                        @if (Auth::user()->role('admin'))

                                            <li class="menu-item menu-item-has-children parent">
                                                <a title="My Account" href="#">Hola de nuevo ({{ Auth::user()->name }})<i
                                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                <ul class="submenu curency">

                                                    <li class="menu-item">
                                                        <a title="Categories"
                                                            href="{{ route('admin.categories.index') }}">Gestionar categorias</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Products"
                                                            href="{{ route('admin.index') }}">Gestionar productos</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Brands"
                                                            href="{{ route('admin.brands.index') }}">Gestionar marcas</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Manage Home Sliders" href="{{-- route('admin.homeslider') --}}">Gestionar Controles deslizantes para el Inicio</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Manage Home OnSale" href="{{-- route('admin.onsale') --}}">Gestionar Inicio OnSale</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Manage Coupon" href="{{-- route('admin.coupons') --}}">Gestionar Cupón</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="All Order List"
                                                            href="{{ route('admin.orders.index') }}">Gestionar ordenes</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Manage users"
                                                            href="{{ route('admin.users.index') }}">Gestionar usuarios</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="Settings" href="{{ route('profile.show') }}">Gestionar perfil</a>
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

                                            {{-- @endrole --}}

                                        @else

                                            <li class="menu-item menu-item-has-children parent">
                                                <a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i
                                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                <ul class="submenu curency">
                                                   
                                                    <li class="menu-item">
                                                        <a title="Dashboard" href="{{route('profile.show')}}">Mi perfil</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a title="My Order List" href="{{route('orders.index')}}">Mis pedidos</a>
                                                    </li>

                                                    <li class="menu-item">
                                                        <a href="{{ route('logout') }}"
                                                            onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            Logout
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
                        </div>
                    </div>
                </div>






                <div class="flex-1 ">
                    <div class="mid-section main-info-area">

                        {{--<div class="wrap-logo-top left-section">
                            <a href="/" class="link-to-home"><img
                                    src="{{ asset('/img/logo.png') }}" alt="MegaTiendaVirtualVip"></a>
                        </div>--}}

                        <a href="/" class="mx-6">
                            <x-jet-application-mark class="block w-auto h-9" />
                        </a>

                        {{-- @livewire('header-search-component') --}}

                        <div class="hidden md:block">
                            @livewire('search')
                        </div>

                        <div class="wrap-icon right-section">
                            {{-- @livewire('wishlist-count-component')
            
                            @livewire('cart-count-component') --}}

                            <div class="wrap-icon-section show-up-after-1024">
                                <a href="#" class="mobile-navigation">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="nav-section header-sticky">
                    <div class="header-nav-section">
                        <div class="container">
                            <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                                <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top new items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
                                        class="nav-label hot-label">hot</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="primary-nav-section">
                        <div class="container">
                            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                <li class="menu-item home-icon">
                                    <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="link-term mercado-item-title">About Us</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="link-term mercado-item-title">Shop</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="link-term mercado-item-title">Cart</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="link-term mercado-item-title">Checkout</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="link-term mercado-item-title">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    {{-- -fin prueba header --}}


    <div class="min-h-screen bg-gray-100">
        {{-- @livewire('navigation-menu') --}}
        {{-- @livewire('navigation') --}}

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <script>
        function dropdown() {
            return {
                open: false,
                show() {
                    if (this.open) {
                        //se cierra el menu categoria
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    } else {
                        //se abrecierra el menu categoria
                        this.open = true;
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                    }
                },
                close() {
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                }
            }
        }
    </script>

    @stack('script')

</body>

</html>
