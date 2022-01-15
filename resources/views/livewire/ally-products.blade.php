<div wire:init="loadPosts">
    @if (count($products)) {{-- loader sppiner --}}

        <div class="glider-contain">{{-- card de productos del crousel productos de los aliados comerciales vip --}}

            <ul class="glider-{{ $claim->id }}">{{-- ojo  claim por pruebas --}}

                @foreach ($products as $product)

                    <li
                        class="p-2 transition-all duration-500 transform bg-white shadow-xl w- rounded-xl hover:shadow-2xl {{ $loop->last ? '' : 'sm:mr-4' }}">
                        <article>
                            <figure>

                                @if ($product->images->count())

                                    <img class="object-fill object-center w-full h-48 rounded-t-md"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">{{-- primera imagen del producto --}}

                                @else
                                    <img class="object-contain w-64 h-64 rounded-full"
                                        src="https://img.icons8.com/fluency/64/000000/nothing-found.png"
                                        alt="nothing-found">
                                @endif
                                

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
