<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-components.order color="gray" size="30" />

                @if ($pendiente->count())
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Order::count() }}</span>
                @else
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                    
                @endif


            </span>
        </x-slot>

        <x-slot name="content">

            {{-- <ul>
                @forelse (Order::all() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="object-cover w-20 mr-4 h-15" src="{{ $item->options->image }}" alt="">

                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>

                            <div class="flex">
                                <p>Cant: {{ $item->qty }}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{ __($item->options['color']) }}</p>
                                @endisset

                                @isset($item->options['size'])
                                    <p>{{ $item->options['size'] }}</p>
                                @endisset

                            </div>

                            <p>US ${{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="px-4 py-6">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul> --}}

            @if ($pendinte->count())
                <div class="px-3 py-2">

                    <x-components.button-enlace href="{{ route('shopping-cart') }}" color="orange"
                        class="w-full">
                        Ir al carrito de compras
                    </x-components.button-enlace>

                </div>
            @endif

        </x-slot>
    </x-jet-dropdown>
</div>
 