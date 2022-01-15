<div class="container">{{-- Componente y vista principal de lños productos de Comercios vip --}}

    <section class="py-16">

        {{-- barra de opcion lista o columnas --}}
        <div class="bg-white rounded-lg shadow-lg">

            <div class="flex items-center justify-between px-6 py-2">

                {{-- prueba  filtros --}}
                <div class="container topbar-menu-area">
                    <div class="items-center topbar-menu">
                        <ul>

                            <li class="text-sm cursor-pointer menu-item menu-item-has-children parent">
                                <a title="Categories">Categorias
                                    <i class="fa fa-angle-down" aria-hidden="true">
                                    </i>
                                </a>
                                <ul class="submenu curency">
                                    @foreach ($categories as $category)
                                        <li class="cursor-pointer menu-item">
                                            <a title="Categories" value="{{ $category->id }}"
                                                wire:click="$set('category_id', {{ $category->id }})">
                                                {{ $category->name }}
                                            </a>
                                        </li>

                                    @endforeach

                                </ul>
                            </li>

                            <li class="ml-6 text-sm cursor-pointer menu-item menu-item-has-children parent">
                                <a title="Subcategories">Subcategorias
                                    <i class="fa fa-angle-down" aria-hidden="true">
                                    </i>
                                </a>
                                <ul class="submenu curency">
                                    @foreach ($subcategories as $subcategory)
                                        <li class="cursor-pointer menu-item">
                                            <a title="Subcategories" value="{{ $subcategory->id }}"
                                                wire:click="$set('subcategory_id', {{ $subcategory->id }})">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>

                                    @endforeach

                                </ul>
                            </li>

                            <li class="ml-6 text-sm cursor-pointer menu-item menu-item-has-children parent">
                                <a title="Brands">Marcas
                                    <i class="fa fa-angle-down" aria-hidden="true">
                                    </i>
                                </a>
                                <ul class="submenu curency">
                                    @foreach ($brands as $brand)
                                        <li class="cursor-pointer menu-item">
                                            <a title="brand" value="{{ $brand->id }}"
                                                wire:click="$set('brand_id', {{ $brand->id }})">
                                                {{ $brand->name }}
                                            </a>
                                        </li>

                                    @endforeach

                                </ul>
                            </li>

                            <li class="ml-6 text-sm cursor-pointer menu-item menu-item-has-children parent">
                                <a title="All products" wire:click="resetFilters">Todos los productos
                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                {{-- fin prueba filtros,-categorias, subcategoria, marca --}}

                <div class="grid grid-cols-2 text-gray-500 border border-gray-200 divide-gray-200">
                    <li class="p-3 cursor-pointer fas fa-border-all {{ $view == 'grid' ? 'text-gold' : '' }} "
                        wire:click="$set('view', 'grid')"></li>
                    <li class="p-3 cursor-pointer fas fa-th-list {{ $view == 'list' ? 'text-gold' : '' }} "
                        wire:click="$set('view', 'list')"></li>
                </div>

            </div>

        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            {{-- todos los productos --}}
            <div class="py-6 md:order-2 md:col-span-4 lg:col-span-4">
                @if ($view == 'grid')
                    <ul class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($products as $product)
                            <div class="flex flex-col items-center justify-center h-full">

                                <div
                                    class="p-2 transition-all duration-500 transform bg-white shadow-xl w- rounded-xl hover:shadow-2xl hover:scale-105">

                                    @if ($product->images->count())
                                        <img style="object-fit: fill;" class="{{-- object-cover --}} object-center w-64 rounded-t-md"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt="" />

                                    @else
                                        <img class="object-contain w-64 h-64 rounded-full"
                                            src="https://img.icons8.com/fluency/64/000000/nothing-found.png"
                                            alt="nothing-found">
                                    @endif

                                    <div class="mt-4">
                                        <h1 class="text-xl font-bold text-gray-700">
                                            <a href="{{ route('products.show', $product) }}">
                                                {{ Str::limit($product->name, 20) }}
                                            </a>
                                        </h1>

                                        <p class="mt-2 text-sm text-gray-700">
                                            {{ Str::limit($product->claim->name, 20) }}</p>

                                        <div class="flex justify-between pl-4 pr-2 mt-4 mb-2">

                                            <button class="block text-xl font-semibold text-gray-700 cursor-auto">
                                                ${{ $product->price }}
                                            </button>

                                        </div>

                                        <button
                                            class="block w-full px-6 py-2 text-lg font-semibold text-green-100 transition duration-300 bg-green-400 rounded-lg shadow hover:text-white hover:shadow-md">
                                            <a href="{{ route('products.show', $product) }}">
                                                Más detalles
                                            </a>
                                        </button>

                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </ul>

                @else {{-- vista de productos en lista, falta mejorar diseño --}}

                <ul>
                    @forelse ($products as $product)

                        <x-components.product-list :product="$product" /> {{-- este componente se encuenta en resources/views/components/components --}}

                    @empty

                        <div class="relative flex items-center justify-start px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                            role="alert">

                            <strong class="items-center font-bold text-center"> <img class="mr-2"
                                    src="https://img.icons8.com/dusk/64/000000/sad-ghost.png" /> Upss!</strong>
                            <span class="flex ml-2 font-semibold">Se completo la busqueda y no se encontro ningún
                                producto con esa especificacíon.</span>

                        </div>

                    @endforelse
                </ul>

                @endif


            </div>

        </div>

    </section>

</div>
