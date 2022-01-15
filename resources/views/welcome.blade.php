<x-home-layout>

    @if (session('success'))
        <h1>{{ session('success') }}</h1>
    @endif

    @error('unsubscribed')
        <div class="mt-4 text-center invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror

    {{-- inicio --}}
    <div class="container grid grid-cols-1 gap-2 mt-8 cursor-default md:p-4 md:grid-cols-4 md:gap-6">
        {{-- guiarse separacion de los layout --}}

        <div class="bg-blue-500">{{-- primer layouts  derecho contiene productos definidos en el controlador welcome $twohomes --}}

            <div class="flex items-center justify-center w-full h-full">

                <div class="">
                    <div class="bg-white rounded-lg shadow-xl">

                        <div class="p-4">

                            <h3
                                class="mb-4 text-base font-extrabold text-center text-transparent md:text-2xl bg-clip-text bg-gradient-to-tl from-blue-800 to-orange-500">
                                Comienza a disfrutar de los mega precios Vip</h3>

                            <div class="grid grid-cols-2 px-6 gap-x-4 gap-y-2">

                                @foreach ($twohomes as $item)

                                    <div class="flex items-center w-full shadow hover:bg-blue-400 hover:bg-opacity-25">
                                        <div class="flex flex-col">
                                            @if ($item->images->count())

                                                <img alt="Unpretentious Baker" class="object-scale-down w-full h-24"
                                                    src="{{ Storage::url($item->images->first()->url) }}">
                                            @else
                                                <img class="object-contain w-24 h-24 rounded-xl"
                                                    src="https://img.icons8.com/fluency/64/000000/nothing-found.png"
                                                    alt="nothing-found">
                                            @endif

                                            <div class="mx-2">
                                                <div class="">
                                                    <a href="{{ route('products.show', $item) }}"
                                                        class="px-2 my-2 text-xs text-red-600 border-2 border-gold">
                                                        ${{ $item->price }}
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>{{-- end --}}

        <div class="col-span-2">{{-- Los controles deslizantes que muestran los items de la variable $banners // la publicidad --}}

            <div class="flexslider">{{-- FlexSlider 2  responsive slider  es utilizado en esta seccion --}}
                <ul class="slides">
                    @foreach ($banners as $banner)

                        <li>
                            <img src=" {{ Storage::url($banner->image) }}" />
                        </li>

                    @endforeach

                </ul>
            </div>{{-- end FlexSlider --}}

            {{-- url("./images/oriental-tiles.png");este componente se prende utilizar para agregar un carrousel interactivo background-image: url('https://images.unsplash.com/photo-1607082350899-7e105aa886ae?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'); --}}
            <div class="flex flex-row flex-wrap w-full h-48 p-3 bg-gray-200 rounded-lg shadow-lg">
                <img class="w-full object-center object-fill h-48 rounded-lg" src="{{ asset('img/contratacion.jpg') }}" />
            </div>{{-- end componente --}}

        </div>

        <div class="bg-orange-500">{{-- tercer layouts  izquierdo contiene productos definidos en el controlador welcome $homes, asi como panel de iniciar sesion --}}

            <div class="flex items-center justify-center w-full h-full">

                <div class="">
                    <div class="py-3 bg-white rounded-lg shadow-xl">

                        @auth{{-- opciones desplegadas luego de logearse --}}

                        <div class="p-2 photo-wrapper">{{-- imagen de perfil del usuario --}}
                            <img class="w-32 h-32 mx-auto rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}">
                        </div>

                        <div class="justify-center p-3 text-center ">{{-- saludo a usuario --}}
                            <span class="text-lg text-blue-400">Te damos la bienvenida {{ Auth::user()->name }}
                            </span>
                        </div>

                        <div class="w-full px-4 mt-4 text-center">{{-- buttons --}}
                            <div class="flex items-center justify-center py-4 pt-4">

                                <div class="p-2 ml-1 text-center ">{{-- boton para ingresar al perfil de usuario --}}
                                    <a href="{{ route('profile.show') }}"
                                        class="inline-flex items-center justify-center w-10 h-10 mr-2 text-white transition-colors duration-150 rounded-lg bg-gold focus:shadow-outline hover:bg-blue-800">
                                        <img src="https://img.icons8.com/dusk/20/000000/admin-settings-male.png" />
                                    </a>
                                    <span class="text-xs text-blue-400">Mi cuenta</span>
                                </div>

                                <div class="p-2 ml-1 text-center">{{-- boton para ingresar a los pedidos realizados --}}
                                    <a href="{{ route('orders.index') }}"
                                        class="inline-flex items-center justify-center w-10 h-10 mr-2 text-white transition-colors duration-150 rounded-lg bg-gold focus:shadow-outline hover:bg-blue-800">
                                        <img src="https://img.icons8.com/dusk/20/000000/click-and-collect.png" />
                                    </a>
                                    <span class="ml-1 text-xs text-blue-400">Mis pedidos</span>
                                </div>

                                <form method="POST" action="{{ route('logout') }}" class="p-1 ml-1 text-center">
                                    {{-- boton para cerrar session --}}

                                    @csrf

                                    <a href="{{ route('logout') }}"
                                        class="inline-flex items-center justify-center w-10 h-10 mr-2 text-white transition-colors duration-150 rounded-lg bg-gold focus:shadow-outline hover:bg-blue-800"
                                        onclick="event.preventDefault(); this.closest('form').submit();">

                                        <img src="https://img.icons8.com/dusk/20/000000/shutdown.png" />

                                    </a>

                                    <span class="text-xs text-blue-400">Cerrar sesíon</span>

                                </form>

                            </div>
                        </div>

                    @else

                        <div class="p-2 photo-wrapper">{{-- imagen estatica de usuarios por default del layouts --}}
                            <img class="items-center object-cover w-32 h-32 mx-auto rounded-full"
                                src="https://cdn.pixabay.com/photo/2018/11/13/22/01/instagram-3814082_960_720.png"
                                alt="user">
                        </div>

                        <div class="flex items-center justify-center pt-8 pb-4 lg:pt-4">{{-- opciones para ingresar o registrarse --}}
                            <x-components.button-enlace class="p-3 mr-1" href="{{ route('login') }}">
                                {{ __('Ingresar') }}
                            </x-components.button-enlace>

                            <x-components.button-enlace href="{{ route('register') }}">
                                {{ __('Registrarse') }}
                            </x-components.button-enlace>
                        </div>

                    @endauth {{-- end auth --}}

                    <div class="p-6" style="
background-image: url('https://images.unsplash.com/photo-1610825469646-083e2ae916c5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=387&q=80');
background-repeat: no-repat;
background-size: cover;
background-blend-mode: multiply;
">{{-- imagen estatica para la parte inferior del layouts --}}

                        <h3
                            class="text-base font-extrabold text-center text-transparent md:text-2xl bg-clip-text bg-gradient-to-tl from-blue-800 to-orange-500">
                            Revisa nuestras megas ofertas Vip</h3>
                        <div class="text-sm font-semibold text-center text-gold">
                            <p>Comienza a disfrutar de los mega precios Vip</p>
                        </div>


                        <div class="grid grid-cols-2 px-6 gap-x-6 gap-y-8">{{-- contiene productos estaticos definidos en el controlador welcome $homes --}}

                            @foreach ($homes as $home)

                                <div class="flex items-center w-full shadow hover:bg-gray-50 hover:bg-opacity-90">
                                    <div class="flex flex-col">

                                        @if ($home->images->count())

                                            <img alt="Unpretentious Baker" class="object-scale-down w-full h-24"
                                                src="{{ Storage::url($home->images->first()->url) }}">
                                        @else
                                            <img class="object-contain w-24 h-24 rounded-xl"
                                                src="https://img.icons8.com/fluency/64/000000/nothing-found.png"
                                                alt="nothing-found">
                                        @endif


                                        <div class="mx-2">
                                            <div class="">
                                                <a href="{{ route('products.show', $home) }}"
                                                    class="px-2 my-2 text-xs text-red-600 border-2 border-gold">
                                                    ${{ $home->price }}
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>{{-- end --}}

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>{{-- end  primer layouts izquierdo --}}

</div>

{{-- Productos todos los ultimos agregados - --}}
<section class="my-16">

    <div class="container mb-8">{{-- identifica la seccion de categorias --}}
        <div class="flex items-center justify-between block">

            <span class="flex text-xs text-center text-gray-700 uppercase md:text-2xl ">
                Productos recién llegados
            </span>

            <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">

            </div>

        </div>
    </div>

    <div
        class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        {{-- Componente card de productos --}}

        @foreach ($products as $product)

            <x-components.product-card :product="$product" />{{-- este card se encuentra en resources/views/components/components --}}

        @endforeach

    </div>

</section>

<!-- component texto aumenta tus ganacias -->

<div class="container mb-8 ">{{-- identifica la seccion de categorias --}}
    <div class="flex items-center justify-between block">

        <span class="flex text-xs text-center text-gray-700 uppercase md:text-2xl ">
            Algunos de nuestros aliados comerciales vip
        </span>

        <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
        </div>

    </div>
</div>

<div class="grid items-center justify-center w-full h-64 grid-cols-1 bg-gray-800">

    <section class="flex w-full bg-orange-500 ">
        <div class="container px-4 mx-auto">
            <div class="my-10">
                <div class="mx-4 my-auto text-center text-white">

                    <h1 class="font-bold md:text-3xl">Aumenta tus ganancias con Meganegocios Vip</h1>
                    <h2 class="md:text-xl">¡Afíliate en minutos!</h2>
                    <h3 class="md:text-xl">Despega y conquista a millones de compradores.</h3>


                </div>

            </div>
        </div>
    </section>

</div>
{{-- comercios  - --}}
<section class="{{-- hidden md:block --}} ">
    <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($claims as $claim)

            <x-components.commerce-card :claim="$claim" />{{-- este card se encuentra en resources/views/components/components --}}

        @endforeach

    </div>
</section>


{{-- Categorias - --}}
<section class="container my-16">

    <div class="container mb-8">{{-- identifica la seccion de categorias --}}
        <div class="flex items-center justify-between block">

            <span class="flex text-xs text-center text-gray-700 uppercase md:text-2xl ">
                Compra por Categorías
            </span>

            <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
            </div>

        </div>
    </div>

    <div
        class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">

        @foreach ($categories as $category)

            <x-components.category-card :category="$category" />{{-- este card se encuentra en resources/views/components/components --}}

        @endforeach

    </div>

</section>

{{-- Script para los slider bar- --}}
@push('script')
    <script>
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
            });
        });
    </script>
@endpush

<!-- afiliate carousel componente -->
<section class="container my-16">
    <div class="container mb-8">{{-- identifica la seccion de categorias --}}
        <div class="flex items-center justify-between block">

            <span class="flex text-xs text-center text-gray-700 uppercase md:text-2xl ">
                Afiliate a nuestros servicios
            </span>

            <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
            </div>

        </div>
    </div>

    <x-components.afiliation-carousel />

</section>



</x-home-layout>
