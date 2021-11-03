<div>
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">

                <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">

                    <a href="{{ URL::previous() }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png"/></a>                        
                       Orden de compra
                </h1>

            </div>
        </div>
    </header>

    <div class="container">{{-- Estado del pedido --}}

        <div class="max-w-5xl py-12 mx-auto lg:px-8">

            <div class="flex items-center px-6 py-8 mb-6 bg-white rounded-lg shadow-lg md:px-12">{{-- Card estado de la compra o orden recibido, pendiente, etc --}}

                <div class="relative">
                    <div
                        class="{{ $order->status >= 2 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="text-white fas fa-check"></i>
                    </div>

                    <div class="absolute -left-1.5 mt-0.5">
                        <p>Recibido</p>
                    </div>
                </div>

                <div
                    class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
                </div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="text-white fas fa-truck"></i>
                    </div>

                    <div class="absolute -left-1 mt-0.5">
                        <p>Enviado</p>
                    </div>
                </div>

                <div
                    class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
                </div>

                <div class="relative">
                    <div
                        class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="text-white fas fa-check"></i>
                    </div>

                    <div class="absolute -left-2 mt-0.5">
                        <p>Entregado</p>
                    </div>
                </div>

            </div>

            <div class="px-6 py-4 mb-6 bg-white rounded-lg shadow-lg ">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                    Orden-{{ $order->id }}</p>

                <form wire:submit.prevent="update">
                    <div class="items-center justify-between px-6">
                        <ul>
                            <div class="mt-2 space-x-3 ">
                                <x-jet-label>
                                    <input wire:model="status" type="radio" name="status" value="2"
                                        class="mb-2 ml-2">
                                    RECIBIDO
                                </x-jet-label>

                                <x-jet-label>
                                    <input wire:model="status" type="radio" name="status" value="3"
                                        class="mb-2">
                                    ENVIADO
                                </x-jet-label>

                                <x-jet-label>
                                    <input wire:model="status" type="radio" name="status" value="4"
                                        class="mb-2">
                                    ENTREGADO
                                </x-jet-label>

                                <x-jet-label>
                                    <input wire:model="status" type="radio" name="status" value="5"
                                        class="mb-2">
                                    ANULADO
                                </x-jet-label>
                            </div>


                        </ul>
                        <div class="flex mt-2">
                            <x-jet-button class="ml-auto">
                                Actualizar
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </div> {{-- end card --}}

            <div class="p-6 mb-6 bg-white rounded-lg shadow-lg">{{-- cards detalles de direccion recepcion u domicilio --}}
                <div class="grid grid-cols-1 gap-6 text-gray-700 md:grid-cols-2">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envío</p>

                        @if ($order->envio_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en la siguente dirección:</p>
                            <p class="text-sm">{{ $envio->claim ?? null }}</p>
                        @else
                            <p class="text-sm">Los productos Serán enviados a:</p>
                            <p class="text-sm">{{ $envio->address }} - {{ $envio->references }}</p>
                            <p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}
                            </p>
                        @endif

                    </div>

                    <div>
                        <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                        <p class="text-sm">Persona que recibirá el producto: {{ $order->contact }}</p>
                        <p class="text-sm">Teléfono de contacto: {{ $order->phone }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6 mb-6 text-gray-700 bg-white rounded-lg shadow-lg"> {{-- tabla resumen del producto ordenado --}}
                <p class="mb-4 text-xl font-semibold">Resumen</p>
                <x-components.table-responsive>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="relative px-6 py-3">
                                    <span
                                        class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Producto</span>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Precio</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Cant</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Total</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($items as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-20 h-15">
                                                <img class="object-cover w-20 mr-4 h-15"
                                                    src="{{ $item->options->image }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <article>
                                                        <div>{{ $item->name }}</div>
                                                        <div class="flex text-xs">

                                                            @isset($item->options->color)
                                                                Color: {{ __($item->options->color) }}
                                                            @endisset

                                                            @isset($item->options->size)
                                                                - {{ $item->options->size }}
                                                            @endisset
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        US ${{ $item->price }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $item->qty }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        US ${{ $item->price * $item->qty }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-components.table-responsive>
            </div>

        </div>
    </div>
    
</div>
