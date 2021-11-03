<div>

    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">

                <h1 class="flex items-center font-semibold leading-tight text-center text-gray-800 md:text-2xl">

                    <a href="{{ URL::previous() }}" class="mr-2"><img
                            src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" /></a>
                    Realice su Pago y disfrute de su Mega Compra Vip
                </h1>

            </div>
        </div>
    </header>

    <div class="container mt-4"> {{-- orden de pago --}}

        {{-- sdk de mercado pago no funciona en VE --}}
            {{-- @php
            // SDK de Mercado Pago
            require base_path('vendor/autoload.php');
            // Agrega credenciales
            MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

            // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();

            $shipments = new MercadoPago\Shipments();

            $shipments->cost = $order->shipping_cost;
            $shipments->mode = "not_specified";

            $preference->shipments = $shipments;

            // Crea un ítem en la preferencia
            
            foreach ($items as $product) {
                $item = new MercadoPago\Item();
                $item->title = $product->name;
                $item->quantity = $product->qty;
                $item->unit_price = $product->price;

                $products[] = $item;
            }

            $preference->back_urls = array(
                "success" => route('orders.pay', $order),
                "failure" => "http://www.tu-sitio/failure",
                "pending" => "http://www.tu-sitio/pending"
            );
            $preference->auto_return = "approved";

            $preference->items = $products;
            $preference->save();
        @endphp --}}
            {{-- end Sdk Mpago --}}

        <div class="container grid grid-cols-1 gap-6 py-8 lg:grid-cols-2 xl:grid-cols-5">{{-- orden de pago --}}

            <div class="order-2 lg:order-1 xl:col-span-3"> {{-- detalles de orden de compra --}}

                <div class="px-6 py-4 mb-6 bg-white rounded-lg shadow-lg">{{-- # orden --}}
                    <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                        Orden-{{ $order->id }}</p>
                </div>

                <div class="p-6 mb-6 bg-white rounded-lg shadow-lg">{{-- card direccion datos de contacto, recepcion, domicilio --}}
                    <div class="grid grid-cols-1 gap-6 text-gray-700 md:grid-cols-2">
                        <div>
                            <p class="text-lg font-semibold uppercase">Envío</p>

                            @if ($order->envio_type == 1)
                                <p class="text-sm">Los productos deben ser recogidos en: </p>
                                <p class="text-sm">{{ $envio->claim ?? null }}</p>
                                {{-- <p>{{ $envio->address}}</p> --}}
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
                </div>{{-- end datos de contacto --}}

                <div class="p-6 mb-6 text-gray-700 bg-white rounded-lg shadow-lg">{{-- card resumen --}}
                    <p class="mb-4 text-xl font-semibold">Resumen</p>

                    <x-components.table-responsive>{{-- tabla resumen productos del pedido --}}
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

            <div class="order-1 lg:order-2 xl:col-span-2">{{-- card contenedor de metodo de pago --}}
                <div class="px-6 pt-6 bg-white rounded-lg shadow-lg">

                    <div class="grid items-center justify-between grid-cols-1 mb-4 text-center md:grid-cols-2">

                        <div class="flex-shrink-0 ">
                            <img class="object-cover h-8 mb-4 mr-4" src="{{ asset('img/MC_VI_DI_2-1.jpg') }}" alt="">
                        </div>

                        <div class="text-gray-700">
                            <p class="text-sm font-semibold">
                                Subtotal: US ${{ $order->total - $order->shipping_cost }}
                            </p>
                            <p class="text-sm font-semibold">
                                Envío: US ${{ $order->shipping_cost }}
                            </p>
                            <p class="text-lg font-semibold uppercase">
                                Total: US ${{ $order->total }}
                            </p>

                            <div class="cho-container">

                            </div>
                        </div>

                    </div>

                    <div class="items-center block px-4 py-2">

                        <div id="paypal-button-container"></div>

                    </div>

                </div>
            </div>

        </div>

        {{-- <script src="https://sdk.mercadopago.com/js/v2"></script>

            <script>
                
                const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                        locale: 'es-AR'
                });
                
                mp.checkout({
                    preference: {
                        id: '{{ $preference->id }}'
                    },
                    render: {
                            container: '.cho-container', 
                            label: 'Pagar',
                    }
                });

            </script> --}}

        @push('script'){{-- script   cdn paypal --}}

            <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}">
                // Replace YOUR_CLIENT_ID with your sandbox client ID
            </script>

            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: "{{ $order->total }}"
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {

                            Livewire.emit('payOrder');

                            /*console.log(details);

                                    alert('Transaction completed by ' + details.payer.name.given_name);*/

                        });
                    }
                }).render('#paypal-button-container'); // Display payment options on your web page
            </script>

        @endpush
    </div>

</div>
