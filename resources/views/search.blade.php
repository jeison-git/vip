<x-app-layout>

    <div class="container py-8">

        <ul>{{-- componente de busqueda --}}
            @forelse($products as $product)
                <x-components.product-list :product="$product" />{{-- components/components/product-list --}}

            @empty

                <li class="bg-white rounded-lg shadow-2xl">
                    <div class="p-4">
                        <p class="text-lg font-semibold text-gray-700">
                           Upps! Se completo la busqueda, sin resultados.
                        </p>
                    </div>
                </li>

            @endforelse
        </ul>

        <div class="mt-4">
            {{ $products->links() }}{{-- paginar --}}
        </div>
    </div>

</x-app-layout>
