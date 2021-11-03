<div wire:init="loadPosts">
    @if (count($products))

        <div class="glider-contain">

            <ul class="glider-{{ $item->id }}">{{--ojo  item por pruebas--}}

                @foreach ($products as $product)

                    <li class="p-2 transition-all duration-500 transform bg-white shadow-xl w- rounded-xl hover:shadow-2xl {{ $loop->last ? '' : 'sm:mr-4' }}">
                        <article>
                            <figure>
                                <img class="object-contain object-center w-48 h-48 rounded-t-md"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            </figure> 

                            <div cclass="mt-4">

                                <h1
                                    class="text-base font-semibold text-gray-700 underline transition duration-300 hover:text-gold hover:shadow-md">
                                    <a href="{{ route('products.show', $product) }}">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                </h1>

                            </div>
                            
                            <div class="justify-start py-4 mx-auto">{{-- precio vip del producto --}}

                                <button class="block text-base font-semibold text-gray-600 cursor-auto">
                                    US ${{ $product->price }}{{-- cambiar variable --}}
                                </button>

                            </div>

                        </article>
                    </li>

                @endforeach

            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>

    @else

        <div class="flex items-center justify-center h-48 mb-4 bg-white border border-gray-100 rounded-lg shadow-xl">
            <div class="w-10 h-10 duration-300 border-2 border-indigo-500 rounded animate-spin ease"></div>
        </div>

    @endif
</div>