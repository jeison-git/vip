@props(['product'])

<li class="mb-4 bg-white rounded-lg shadow">
    <article class="md:flex">
        <figure>
            <img class="object-cover object-center w-full h-48 md:w-56" src="{{ Storage::url($product->images->first()->url) }}" alt="">
        </figure>

        <div class="flex flex-col flex-1 px-6 py-4">
            <div class="justify-between lg:flex">
                <div>
                    <h1 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h1>
                    <p class="font-bold text-gray-700">USD {{ $product->price }}</p>
                </div>

                <div class="flex items-center">
                    <ul class="flex text-sm">
                        <li>
                            <i class="mr-1 text-yellow-400 fas fa-star"></i>
                        </li>
                        <li>
                            <i class="mr-1 text-yellow-400 fas fa-star"></i>
                        </li>
                        <li>
                            <i class="mr-1 text-yellow-400 fas fa-star"></i>
                        </li>
                        <li>
                            <i class="mr-1 text-yellow-400 fas fa-star"></i>
                        </li>
                        <li>
                            <i class="mr-1 text-yellow-400 fas fa-star"></i>
                        </li>
                    </ul>

                    <span class="text-sm text-gray-700">(24)</span>
                </div>
            </div>

            <div class="mt-4 mb-4 md:mt-auto">
                <x-components.danger-enlace href="{{ route('products.show', $product) }}">
                    Más información
                </x-components.danger-enlace>
            </div>
        </div>
    </article>
</li>