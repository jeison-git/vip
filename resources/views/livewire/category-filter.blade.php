<div>
    {{-- barra de opcion para visualizar los productos por lista o columnas --}}
    <div class="bg-white rounded-lg shadow-lg">

        <div class="flex items-center justify-between px-6 py-2">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>

            <div class="grid grid-cols-2 text-gray-500 border border-gray-200 divide-gray-200">
                <li class="p-3 cursor-pointer fas fa-border-all {{ $view == 'grid' ? 'text-gold' : '' }} "
                    wire:click="$set('view', 'grid')"></li>
                <li class="p-3 cursor-pointer fas fa-th-list {{ $view == 'list' ? 'text-gold' : '' }} "
                    wire:click="$set('view', 'list')"></li>
            </div>

        </div>

    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

        <aside>{{-- filtros de busquedas de la categoria selecionada subcategorias, marcas --}}

            <div x-data="{ open: false }">{{-- header filtros Subcategorias --}}
                <header
                    class="flex items-center justify-between px-4 py-2 mt-8 rounded shadow-lg cursor-pointer bg-gray-50"
                    x-on:click="open= !open">

                    <div class="text-xs font-semibold text-gray-800 uppercase md:text-sm">

                        <span class="flex items-center mr-2">
                            <img class="mr-2" src="https://img.icons8.com/dusk/25/000000/uncheck-all.png" />
                            Subcategorías
                        </span>

                    </div>
                    <a class="items-center ml-2 font-semibold hover:text-gray-800 text-gold hover:underline"><i
                            class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                </header>

                <ul class="divide-y divide-gray-200" x-show="open">
                    @foreach ($category->subcategories as $subcategory)
                        <li class="py-2 ml-4 text-sm">
                            <a class="capitalize cursor-pointer hover:text-gold {{ $subcategoria == $subcategory->name ? 'text-gold font-semibold' : '' }}"
                                wire:click="$set('subcategoria', '{{ $subcategory->name }}')">
                                {{ $subcategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div x-data="{ open: false }">{{-- header filtros marcas --}}

                <header
                    class="flex items-center justify-between px-4 py-2 mt-2 mb-2 rounded shadow-lg cursor-pointer bg-gray-50"
                    x-on:click="open= !open">{{-- Marcas --}}

                    <div class="text-xs font-semibold text-gray-800 uppercase md:text-sm">

                        <span class="flex items-center mr-2">
                            <img class="mr-2"
                                src="https://img.icons8.com/dusk/25/000000/sales-channels.png" /> Marcas
                        </span>

                    </div>
                    <a class="items-center ml-2 font-semibold hover:text-gray-800 text-gold hover:underline"><i
                            class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                </header>

                <ul class="divide-y divide-gray-200" x-show="open">
                    @foreach ($category->brands as $brand)
                        <li class="py-2 ml-4 text-sm">
                            <a class="capitalize cursor-pointer hover:text-gold {{ $marca == $brand->name ? 'text-gold font-semibold' : '' }}"
                                wire:click="$set('marca', '{{ $brand->name }}')">
                                {{ $brand->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>

            <x-components.button class="items-center px-12 mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-components.button>

        </aside>{{-- end filtros --}}

        <div class="py-6 md:col-span-2 lg:col-span-4">{{-- tarjeta que muestra los detalles del product de la categoria seleccinada --}}
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 ">
                    @forelse ($products as $product)

                        <div class="flex flex-col items-center justify-center h-full mb-4 bg-gray-100">
                            {{-- tarjeta que muestra informacion del producto --}}

                            <div
                                class="p-2 transition-all duration-500 transform bg-white shadow-xl w- rounded-xl hover:shadow-2xl">

                                <img class="object-contain w-full h-64 rounded-t-md"
                                    src="{{ Storage::url($product->images->first()->url) }}"
                                    alt="" />{{-- primera imagen del producto --}}

                                <div class="mt-4">{{-- detalles del producto, nombre, etc --}}
                                    <h1 class="text-base text-gray-700 uppercase">
                                        <a href="{{ route('products.show', $product) }}">
                                            {{ Str::limit($product->name, 20) }}
                                        </a>
                                    </h1>

                                    <a href="{{ route('vip-client') }}"
                                        class="flex items-center mt-2 text-xs font-semibold text-gray-700 uppercase ">
                                        ${{ $product->price }}
                                        solo Clientes <svg class="ml-2 " xmlns="http://www.w3.org/2000/svg"
                                            x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172"
                                            style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                font-weight="none" font-size="none" text-anchor="none"
                                                style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g>
                                                    <path
                                                        d="M163.9375,40.3125v91.375c0,5.93706 -4.81294,10.75 -10.75,10.75h-134.375c-1.52171,-0.00123 -3.02518,-0.33126 -4.4075,-0.9675c-3.0631,-1.37185 -5.3097,-4.09561 -6.07375,-7.36375c-0.17197,-0.79495 -0.26202,-1.60544 -0.26875,-2.41875v-91.375c0,-5.93706 4.81294,-10.75 10.75,-10.75h134.375c5.93706,0 10.75,4.81294 10.75,10.75z"
                                                        fill="#f1c40f"></path>
                                                    <path
                                                        d="M163.9375,40.3125v29.5625l-72.5625,72.5625h-40.3125l109.73063,-109.73062c2.0155,2.01774 3.14662,4.75369 3.14437,7.60563zM153.1875,29.5625l-112.875,112.875h-16.125l112.875,-112.875zM126.3125,29.5625l-111.9075,111.9075c-3.0631,-1.37185 -5.3097,-4.09561 -6.07375,-7.36375l104.54375,-104.54375z"
                                                        fill="#ffefb8"></path>
                                                    <path
                                                        d="M163.9375,131.6875v0c0,5.93706 -4.81294,10.75 -10.75,10.75h-134.375c-1.52171,-0.00123 -3.02518,-0.33126 -4.4075,-0.9675c-3.0631,-1.37185 -5.3097,-4.09561 -6.07375,-7.36375c-0.17197,-0.79495 -0.26202,-1.60544 -0.26875,-2.41875v-2.6875h153.1875c1.48427,0 2.6875,1.20323 2.6875,2.6875z"
                                                        fill="#f5c872"></path>
                                                    <path
                                                        d="M153.1875,26.875h-134.375c-7.42133,0 -13.4375,6.01617 -13.4375,13.4375v91.375c0,7.42133 6.01617,13.4375 13.4375,13.4375h134.375c7.42133,0 13.4375,-6.01617 13.4375,-13.4375v-91.375c0,-7.42133 -6.01617,-13.4375 -13.4375,-13.4375zM161.25,131.6875c0,4.4528 -3.6097,8.0625 -8.0625,8.0625h-134.375c-4.4528,0 -8.0625,-3.6097 -8.0625,-8.0625v-91.375c0,-4.4528 3.6097,-8.0625 8.0625,-8.0625h134.375c4.4528,0 8.0625,3.6097 8.0625,8.0625z"
                                                        fill="#8d6c9f"></path>
                                                    <path
                                                        d="M18.8125,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM32.25,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM45.6875,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM59.125,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM72.5625,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM86,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM99.4375,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM112.875,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM126.3125,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM139.75,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM153.1875,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM76.11,59.25938c-0.67708,-0.22992 -1.41787,-0.18053 -2.05844,0.13723c-0.64057,0.31776 -1.12809,0.8777 -1.35469,1.55589l-13.57188,40.7425l-13.57187,-40.7425c-0.46754,-1.41005 -1.98964,-2.17411 -3.39969,-1.70656c-1.41005,0.46754 -2.17411,1.98964 -1.70656,3.39969l16.125,48.375v0.18812l0.16125,0.3225c0.10482,0.18446 0.23112,0.35586 0.37625,0.51062l0.215,0.215c0.22592,0.1831 0.48005,0.32832 0.7525,0.43v0c0.54139,0.17653 1.12486,0.17653 1.66625,0v0c0.27245,-0.10168 0.52658,-0.2469 0.7525,-0.43l0.215,-0.215c0.14513,-0.15476 0.27143,-0.32616 0.37625,-0.51062l0.16125,-0.3225v-0.18812l16.125,-48.375c0.51411,-1.2856 -0.03265,-2.7514 -1.26312,-3.38625zM88.6875,59.125c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v48.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-48.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM120.9375,59.125h-16.125c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v48.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-18.8125h13.4375c7.42133,0 13.4375,-6.01617 13.4375,-13.4375v-5.375c0,-7.42133 -6.01617,-13.4375 -13.4375,-13.4375zM129,77.9375c0,4.4528 -3.6097,8.0625 -8.0625,8.0625h-13.4375v-21.5h13.4375c4.4528,0 8.0625,3.6097 8.0625,8.0625z"
                                                        fill="#8d6c9f"></path>
                                                    <path
                                                        d="M135.28875,37.625l-3.3325,6.07375l-6.10063,3.3325l6.10063,3.3325l3.3325,6.07375l3.30562,-6.07375l6.10063,-3.3325l-6.10063,-3.3325zM30.66438,51.0625l-2.28437,4.1925l-4.1925,2.31125l4.1925,2.28437l2.28437,4.21937l2.31125,-4.21937l4.1925,-2.28437l-4.1925,-2.31125zM127.6025,101.31875l-1.55875,2.87562l-2.87563,1.55875l2.87563,1.58562l1.55875,2.84875l1.55875,-2.84875l2.87563,-1.58562l-2.87563,-1.55875z"
                                                        fill="#fff8f8"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>{{-- muestra el precio vip o con descuento icono obtenido de https://icons8.com/ --}}

                                    <div class="flex justify-between pl-4 pr-2 mt-4 mb-2">{{-- precio real del producto y boton que redirecciona a la vista del producto --}}

                                        <button class="block text-xl font-semibold text-gray-700 cursor-auto">
                                            ${{ $product->pricevip }}{{-- cambiar variable por $realprice --}}
                                        </button>

                                        <button
                                            class="block px-4 py-2 ml-2 text-sm font-semibold text-white transition duration-300 rounded-lg shadow bg-gold hover:text-gray-700 hover:shadow-md">
                                            <a href="{{ route('products.show', $product) }}">
                                                Más detalles
                                            </a>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    @empty
                        <li class="md:col-span-2 lg:col-span-4">{{-- mensaje de notificacion que no se encontro datos --}}
                            <div class="relative flex items-center justify-start px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                                role="alert">
                                <strong class="items-center font-bold text-center"> <img class="mr-2"
                                        src="https://img.icons8.com/dusk/64/000000/sad-ghost.png" /> Upss!</strong>
                                <span class="flex ml-2 font-semibold">Se completo la busqueda y no se encontro ningún
                                    producto con esa especificacíon.</span>
                            </div>
                        </li>

                    @endforelse
                </ul>

            @else
                <ul>{{-- tarjeta que muestra los productos en lista --}}
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

            <div class="py-4">
                {{ $products->links() }}
            </div>
        </div>

    </div>

</div>
