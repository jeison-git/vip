<div>

    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">

                <h1 class="flex items-center font-semibold leading-tight text-center text-gray-800 md:text-2xl">
                      
                    <a href="{{ Route('orders.index')}}" class="mr-2">
                        <img src="https://img.icons8.com/dusk/25/000000/check.png"/>                      
                    </a>
                    <a href="{{ URL::previous() }}" class="mr-2">
                        <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png"/>
                    </a>
                    <a href="{{ URL::previous() }}" class="mr-2">
                        <img src="https://img.icons8.com/dusk/25/000000/circled-right-2.png"/>
                    </a>
                    
                    Si desea ordenar este producto haga su pedido

                </h1>

            </div>
        </div>
    </header>

    <div class="container grid gap-6 py-8 lg:grid-cols-2 xl:grid-cols-5">{{-- seccion que le permite al usuario generar un pedido o orden --}}

        <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">{{-- seccion de contacto y direccion donde sera reclamado el producto o entregado posible delivery --}}

            <div class="p-6 bg-white rounded-lg shadow">{{-- datos de contacto nombre y tlf: --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre de contácto" />
                    <x-jet-input type="text" wire:model.defer="contact"
                        placeholder="Ingrese el nombre de la persona que recibirá el producto" class="w-full" />
                    <x-jet-input-error for="contact" />
                </div>

                <div>
                    <x-jet-label value="Teléfono de contacto" />
                    <x-jet-input type="text" wire:model.defer="phone"
                        placeholder="Ingrese un número de telefono de contácto" class="w-full" />

                    <x-jet-input-error for="phone" />
                </div>
            </div>

            <div x-data="{ envio_type: @entangle('envio_type') }">{{-- opciones de direccion tipos de envios 1;2 --}}
                <p class="mt-6 mb-3 text-lg font-semibold text-gray-700">Envíos</p>

                <div class="mb-4 bg-white rounded-lg shadow">{{-- aliados comerciales y comencios opciones --}}

                    <label class="flex items-center px-6 py-4 mb-4 bg-white rounded-lg shadow cursor-pointer">

                        <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-gray-600">
                        <span class="ml-2 text-left text-gray-700">
                            Retire el producto en
                        </span>

                    </label>

                    <div class="grid hidden grid-cols-1 gap-6 px-6 pb-6" :class="{ 'hidden': envio_type != 1 }">{{-- comercios aliados y comercios para retirar el producto --}}
                        

                        <div>
                            <x-jet-label value="¿ Desea realizar el retiro personalmente ?" />

                            <select class="w-full text-sm form-control" wire:model="claim_id">

                                <option class="mb-2" value="" disabled selected>Seleccione un lugar de retiro
                                </option>


                                @foreach ($claims as $claim)

                                    <option value="{{ $claim->id }}">{{ Str::limit($claim->name, 40) }} -
                                        {{ $claim->address }}</option>

                                @endforeach

                            </select>

                            <x-jet-input-error for="claim_id" />
                        </div>

                    </div>
                </div>

                <div class="bg-white rounded-lg shadow">{{-- envio a domicilio --}}

                    <label class="flex items-center px-6 py-4 cursor-pointer">

                        <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-gray-600">
                        <span class="ml-2 text-gray-700">
                            Envío a domicilio
                        </span>

                    </label>

                    <div class="grid hidden grid-cols-2 gap-6 px-6 pb-6" :class="{ 'hidden': envio_type != 2 }">

                        {{-- Estados --}}
                        <div>
                            <x-jet-label value="Estado" />

                            <select class="w-full form-control" wire:model="department_id">

                                <option value="" disabled selected>Seleccione un Estado</option>

                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="department_id" />
                        </div>

                        {{-- Ciudades --}}
                        <div>
                            <x-jet-label value="Municipio" />

                            <select class="w-full form-control" wire:model="city_id">

                                <option value="" disabled selected>Seleccione un municipio</option>

                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="city_id" />
                        </div>

                        {{-- parroquias * --}}
                        <div>
                            <x-jet-label value="Parroquia" />

                            <select class="w-full form-control" wire:model="district_id">

                                <option value="" disabled selected>Seleccione una parroquia</option>

                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="district_id" />
                        </div>

                        {{-- direcciòn del cliente --}}
                        <div>
                            <x-jet-label value="Dirección" />
                            <x-jet-input class="w-full" wire:model="address" type="text" />
                            <x-jet-input-error for="address" />
                        </div>

                        <div class="col-span-2">
                            <x-jet-label value="Referencia" />
                            <x-jet-input class="w-full" wire:model="references" type="text" />
                            <x-jet-input-error for="references" />
                        </div>

                    </div>
                </div>

            </div>

            <div>
                <x-jet-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4"
                    wire:click="create_order">
                    Continuar con la compra
                </x-jet-button>

                <hr>

                <p class="mt-2 text-sm text-gray-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam
                    atque quo, labore facere placeat illo consequatur hic ut sapiente exercitationem, architecto iure,
                    consequuntur impedit ex iusto ipsa voluptas laudantium iste <a href=""
                        class="font-semibold text-orange-500">Políticas y privacidad</a></p>
            </div>

        </div>

        <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">{{-- card de resumen --}}
            <div class="p-6 bg-white rounded-lg shadow">
                <ul>
                    @forelse (Cart::content() as $item)
                        <li class="flex items-center justify-between p-2 border-b border-gray-200">
                            <img class="object-cover w-20 mr-4 h-15" src="{{ $item->options->image }}" alt="">

                            <article class="flex-1">
                                <h1 class="font-bold">{{ $item->name }}</h1>

                                <div class="flex text-sm">
                                    <p>Cant: {{ $item->qty }}</p>
                                    @isset($item->options['color'])
                                        <p class="mx-2"> Color: {{ __($item->options['color']) }}</p>
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
                </ul>

                <hr class="mt-4 mb-3">

                <div class="text-gray-700">
                    <p class="flex items-center justify-between">
                        Subtotal
                        <span class="font-semibold">US ${{ Cart::subtotal() }}</span>
                    </p>
                    <p class="flex items-center justify-between">
                        Envío
                        <span class="font-semibold">
                            @if ($envio_type == 1 || $shipping_cost == 0)
                                Gratis
                            @else
                                US ${{ $shipping_cost }}
                            @endif
                        </span>
                    </p>

                    <hr class="mt-4 mb-3">

                    <p class="flex items-center justify-between font-semibold">
                        <span class="text-lg">Total</span>
                        @if ($envio_type == 1)
                            US ${{ Cart::subtotal() }}
                        @else
                            US ${{ Cart::subtotal() + $shipping_cost }}
                        @endif
                    </p>
                </div>
            </div>
        </div>

        

    </div>

</div>
