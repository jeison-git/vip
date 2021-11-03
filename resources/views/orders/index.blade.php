<x-app-layout>

    <div class="container py-12"> {{-- vista de estado de orden --}}

        <section class="grid px-4 mx-auto mb-4 text-white sm:px-6 lg:px-8 sm:grid-cols-1 md:grid-cols-5 gap-x-4 gap-y-8">
            {{-- cards estados del pedido pendiente, recibido, etc --}}
            <a href="{{ route('orders.index') . '?status=1' }}"
                class="px-12 pt-8 pb-4 bg-red-500 bg-opacity-75 rounded-lg">
                <p class="text-2xl text-center">
                    {{ $pendiente }}
                </p>
                <p class="text-center uppercase">Pendiente</p>
                <p class="mt-2 text-2xl text-center">
                    <i class="fas fa-business-time"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . '?status=2' }}"
                class="px-12 pt-8 pb-4 bg-gray-500 bg-opacity-75 rounded-lg">
                <p class="text-2xl text-center">
                    {{ $recibido }}
                </p>
                <p class="text-center uppercase">Recibido</p>
                <p class="mt-2 text-2xl text-center">
                    <i class="fas fa-credit-card"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . '?status=3' }}"
                class="px-12 pt-8 pb-4 bg-yellow-500 bg-opacity-75 rounded-lg">
                <p class="text-2xl text-center">
                    {{ $enviado }}
                </p>
                <p class="text-center uppercase">Enviado</p>
                <p class="mt-2 text-2xl text-center">
                    <i class="fas fa-truck"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . '?status=4' }}"
                class="px-12 pt-8 pb-4 bg-pink-500 bg-opacity-75 rounded-lg">
                <p class="text-2xl text-center">
                    {{ $entregado }}
                </p>
                <p class="text-center uppercase">Entregado</p>
                <p class="mt-2 text-2xl text-center">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . '?status=5' }}"
                class="px-12 pt-8 pb-4 bg-green-500 bg-opacity-75 rounded-lg">
                <p class="text-2xl text-center">
                    {{ $anulado }}
                </p>
                <p class="text-center uppercase">Anulado</p>
                <p class="mt-2 text-2xl text-center">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
        </section> {{-- end card estados del pedido --}}

        @if ($orders->count()) {{-- si el usuario tiene ordenes mostrar el siguiente card --}}


            <section class="py-8 text-gray-700 bg-white rounded-lg shadow-lg md:px-12 md:mt-12"> {{-- card de pedidos con link de resumen de la orden --}}
                <h1 class="mb-4 ml-4 text-lg md:text-2xl">Pedidos recientes</h1>

                <ul> {{-- cambiar icono deacuerdo al estado de la orden --}}
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{ route('orders.show', $order) }}"
                                class="flex items-center px-4 py-2 hover:bg-gray-100">
                                <span class="w-auto text-center">
                                    @switch($order->status)
                                        @case(1)
                                            <i class="text-red-500 opacity-50 fas fa-business-time"></i>
                                        @break
                                        @case(2)
                                            <i class="text-gray-500 opacity-50 fas fa-credit-card"></i>
                                        @break
                                        @case(3)
                                            <i class="text-yellow-500 opacity-50 fas fa-truck"></i>
                                        @break
                                        @case(4)
                                            <i class="text-pink-500 opacity-50 fas fa-check-circle"></i>
                                        @break
                                        @case(5)
                                            <i class="text-green-500 opacity-50 fas fa-times-circle"></i>
                                        @break
                                        @default

                                    @endswitch
                                </span>

                                <span>
                                    Orden: {{ $order->id }}
                                    <br>
                                    {{ $order->created_at->format('d/m/Y') }}
                                </span>


                                <div class="ml-auto">
                                    <span class="font-bold">
                                        @switch($order->status)
                                            @case(1)

                                                Pendiente

                                            @break
                                            @case(2)

                                                Recibido

                                            @break
                                            @case(3)

                                                Enviado

                                            @break
                                            @case(4)

                                                Entregado

                                            @break
                                            @case(5)

                                                Anulado

                                            @break
                                            @default

                                        @endswitch
                                    </span>

                                    <br>

                                    <span class="text-sm">
                                        US ${{ $order->total }}
                                    </span>
                                </div>

                                <span>
                                    <i class="ml-6 fas fa-angle-right"></i>
                                </span>

                            </a>
                        </li>
                    @endforeach
                </ul>

            </section>

        @else {{-- si no posee pedidos mostrar lo siguiente --}}
            <div class="px-12 py-8 mt-12 text-gray-700 bg-white rounded-lg shadow-lg">
                <span class="text-lg font-bold">
                    No existe registros de ordenes
                </span>
            </div>
        @endif

    </div>

</x-app-layout>
