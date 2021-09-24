<div>
    {{-- barra de opcion lista o columnas --}}
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
    {{-- subcategorias --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

        <aside>
            <h2 class="py-4 font-semibold text-center">Subcategorías</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="capitalize cursor-pointer hover:text-gold {{ $subcategoria == $subcategory->name ? 'text-gold font-semibold' : '' }}"
                            wire:click="$set('subcategoria', '{{ $subcategory->name }}')">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <h2 class="py-4 font-semibold text-center">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a class="capitalize cursor-pointer hover:text-gold {{ $marca == $brand->name ? 'text-gold font-semibold' : '' }}"
                            wire:click="$set('marca', '{{ $brand->name }}')">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <x-jet-button class="mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>

        </aside>

        <div class="py-6 md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    <img class="object-cover object-center w-full h-48"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>

                                <div class="px-6 py-4">
                                    <h1 class="text-lg font-semibold">
                                        <a href="">
                                            {{ Str::limit($product->name, 20) }}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-trueGray-700">US$ {{ $product->pricevip }} Vip</p>
                                    <p class="font-bold text-trueGray-700">US$ {{ $product->price }} </p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>

            @else
            <ul>
                @foreach ($products as $product)
                <li class="mb-6 bg-white rounded-lg shadow">
                    <article class="flex">
                        <figure>
                            <img class="object-cover object-center w-56 h-48" src="{{ Storage::url($product->images->first()->url)}}" alt="">
                        </figure>

                        <div class="flex flex-col flex-1 px-6 py-6">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="text-lg font-semibold text-gray-700">{{$product->name}}</h1>
                                    <p class="py-2 font-bold text-gray-700">USD {{$product->pricevip}} Vip</p>
                                    <p class="mb-2 font-bold text-gray-700">USD {{$product->price}} </p>
                                </div>

                                <div class="flex items-center">

                                    <ul class="flex text-sm">
                                        <li>
                                            <i class="mr-1 fas fa-star text-gold"></i>
                                        </li>
                                        <li>
                                            <i class="mr-1 fas fa-star text-gold"></i>
                                        </li>
                                        <li>
                                            <i class="mr-1 fas fa-star text-gold"></i>
                                        </li>
                                        <li>
                                            <i class="mr-1 fas fa-star text-gold"></i>
                                        </li>
                                        <li>
                                            <i class="mr-1 fas fa-star text-gold"></i>
                                        </li>
                                    </ul>

                                    <span class="ml-1 text-sm text-gray-700">(28)</span>

                                </div>
                            </div>

                            <div class="mt-auto">
                                <x-jet-danger-button>
                                    MÁS INFORMACÍON
                                </x-jet-danger-button>
                            </div>
                        </div>
                    </article>
                </li>
                @endforeach
            </ul>

            @endif


            <div class="py-4">
                {{ $products->links() }}
            </div>
        </div>

    </div>

</div>
