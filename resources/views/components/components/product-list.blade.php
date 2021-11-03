@props(['product'])

<li class="max-w-md mx-auto mb-4 overflow-hidden bg-white shadow-md rounded-xl md:max-w-2xl">

    <article class="md:flex">

        <div class="md:flex-shrink-0">
            <img class="object-cover w-full h-48 md:h-full md:w-48" src="{{ Storage::url($product->images->first()->url) }}" alt="looking at item at a shop">
          </div>

        <div class="flex flex-col flex-1 px-6 py-4">                                    

            <div class="justify-between lg:flex">                                        

                <div class="p-8">                                            

                    <div class="flex items-center justify-between mt-auto ">
                        <h1 class="font-bold tracking-wide text-gray-700 uppercase md:text-lg">{{ $product->name }}</h1>

                        <div class="flex items-center"> {{-- posible  calificacion --}}

                            <ul class="flex text-sm text-center sm:text-left">
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

                    <p class="mt-2 text-gray-500 md:mt-6">{!! $product->description !!}</p>                                            

                </div>                                      

            </div>

            <div class="flex items-center justify-between mt-auto ">

                <x-components.button class="px-4" href="{{ route('products.show', $product) }}">
                    COMPRA <img class="ml-2" src="https://img.icons8.com/dusk/20/000000/vip.png"/>
                </x-components.button>

                <div class="font-semibold text-center text-gray-500 sm:text-left">
                    US ${{ $product->price }}
                </div>

            </div>

        </div>

    </article>

</li>