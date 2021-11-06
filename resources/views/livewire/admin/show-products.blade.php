<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Lista de productos
            </h2>

            <x-components.button-enlace class="ml-auto" href="{{route('admin.products.create')}}">
                Agregar producto
            </x-components.button-enlace>
        </div>
    </x-slot>


    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12">

        <x-components.table-responsive>

            <div class="px-6 py-4">

                <x-jet-input type="text" 
                    wire:model="search" 
                    class="w-full"
                    placeholder="Ingrese el nombre del procucto que quiere buscar" />

            </div>

            @if ($products->count())
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Categoría
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Estado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Precio
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Precio Vip
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($products as $product)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            @if ($product->images->count())
                                                <img class="object-cover w-10 h-10 rounded-full"
                                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                            @else
                                                <img class="object-cover w-10 h-10 rounded-full"
                                                    src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $product->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{ $product->subcategory->category->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($product->status)
                                        @case(1)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                Borrador
                                            </span>
                                        @break
                                        @case(2)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Publicado
                                            </span>
                                        @break
                                        @default

                                    @endswitch

                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    US ${{$product->realprice}}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    US ${{$product->price}}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>

                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($products->hasPages()){{-- Paginacion --}}
                
                <div class="px-6 py-4">
                    {{ $products->links() }}
                </div>
                
            @endif                

        </x-components.table-responsive>
    </div>

</div>