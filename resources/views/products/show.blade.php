<x-app-layout>

    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">

                <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">

                    <a href="{{ URL::previous() }}" class="mr-2">
                        <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" />
                    </a>
                    Detalles del Producto

                </h1>

            </div>
        </div>
    </header>

    <div class="container py-8">{{-- Mostras detalles del producto y opciones de agregar al shoping card --}}

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6">

            <div>{{-- Slider de imagen y descripcion del producto --}}
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)

                            <li data-thumb=" {{ Storage::url($image->url) }}">
                                <img src=" {{ Storage::url($image->url) }}" />
                            </li>

                        @endforeach

                    </ul>
                </div>

                <div class="mb-4 -mt-10 text-justify text-gray-700">
                    <h2 class="text-lg font-bold">Descripción</h2>
                    {!! $product->description !!}
                </div>

            </div>

            <div>{{-- Opciones para agregar al carro de compra --}}
                <h1 class="mb-2 text-xl font-bold text-trueGray-700">{{ $product->name }}</h1>

                <div class="flex items-center justify-start"> {{-- div texto marca y reseñas --}}
                    <p class="text-trueGray-700">Marca:
                        <a class="underline capitalize hover:text-orange-500"
                            {{-- href="" --}}>{{ $product->brand->name }}</a>
                    </p>
                    <p class="mx-6 text-trueGray-700">5 <i class="text-sm text-yellow-400 fas fa-star"></i></p>
                    <a class="text-orange-500 underline hover:text-orange-600" {{-- href="" --}}>39 reseñas</a>
                </div>

                <p class="my-4 text-2xl font-semibold text-trueGray-700">US ${{ $product->price }}</p>
                {{-- precio vip  del  producto --}}

                <div class="mb-6 bg-white rounded-lg shadow-lg">{{-- div fecha de entrega del producto --}}
                    <div class="flex items-center p-2">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-greenLime-600">
                            <i class="text-xs text-white fas fa-truck"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-center text-greenLime-600">Se hace envíos a todo el país</p>
                            <p class="text-sm font-semibold text-center">Recibelo el
                                {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>

                @if ($product->subcategory->size){{-- componentes opciones de stock, color, talla enlace al shopingcard --}}

                    @livewire('add-cart-item-size', ['product' => $product])

                @elseif($product->subcategory->color)

                    @livewire('add-cart-item-color', ['product' => $product])

                @else

                    @livewire('add-cart-item', ['product' => $product])

                @endif

            </div>

        </div>

        <section class="px-6 py-4 mx-auto cursor-default ">{{-- productos similares --}}

            <div class="container mb-8">{{-- texto productos similares --}}
                <div class="flex items-center justify-between block">

                    <span class="flex text-xs text-center text-gray-700 uppercase md:text-xl ">
                        Mega Productos que talves te gusten
                    </span>

                    <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
                    </div>

                </div>
            </div>

            <div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($similares as $similar)

                    <div class="flex flex-col items-center justify-center h-full">
                        <a href="{{ route('products.show', $similar) }}">
                            <div
                                class="p-2 transition-all duration-500 transform bg-white shadow-xl w- rounded-xl hover:shadow-2xl hover:scale-105">
                                <img class="object-fill object-center w-full h-48 rounded-t-md"
                                    src="{{ Storage::url($similar->images->first()->url ?? null) }}" alt="similares">

                                    <div class="mt-4">

                                        <h1 class="text-base text-gray-700 uppercase hover:text-gold">
                                            {{ Str::limit($similar->name, 20) }}
                                        </h1>
                                        <p class="text-sm text-gray-600 hover:text-gold">UD ${{ $similar->price }}</p>
                                    </div>
                            </div>
                            
                        </a>
                    </div>
                    
                @endforeach
            </div>

        </section>

    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush

</x-app-layout>
