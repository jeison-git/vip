<div class="mt-12">
    <div class="container grid grid-cols-1 gap-2 mt-8 cursor-default md:p-4 md:grid-cols-4 md:gap-6">


        <div x-data="{ open: false }">{{-- registrar publicidad estatica banners --}}

            @can('Only admin'){{-- Solo los administradores pueden ingresar y editar datos --}}

                <header class="flex items-center justify-between px-4 py-2 mt-8 rounded shadow-lg cursor-pointer bg-gray-50"
                    x-on:click="open= !open">

                    <div class="text-xs font-semibold text-gray-800 uppercase md:text-sm">

                        <span class="flex items-center mr-2">
                            <img class="ml-1 mr-2" src="https://img.icons8.com/dusk/24/000000/old-shop.png"/>
                            Añadir Banners
                        </span>

                    </div>
                    <a class="items-center ml-2 font-semibold hover:text-gray-800 text-gold hover:underline"><i
                            class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                </header>

                <form wire:submit.prevent="save" class="text-xs"  x-show="open">{{-- Formulario para ingresar datos --}}
                    <x-jet-input wire:model.defer="createForm.title" type="text" class="w-full mt-1 "
                        placeholder="ingrese el titulo" />
                    <x-jet-input-error for="createForm.title" />
                    <x-jet-input wire:model.defer="createForm.owner" type="text" class="w-full mt-1 "
                        placeholder="¿ Aquien pertenece este Banner?" />
                    <x-jet-input-error for="createForm.owner" />
                    <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1 mb-4" name=""
                        id="{{ $rand ?? null }}">
                    <x-jet-input-error for="createForm.image" />

                    <x-jet-action-message class="mt-2 mb-2 mr-3" on="saved">
                        Publicidad agregada
                    </x-jet-action-message>

                    <x-components.button class="w-full p-4 mb-4 cursor-pointer" wire:loading.attr="disabled">
                        Guardar
                    </x-components.button>
                </form>

            @endcan


            <div class="flex items-center px-2 py-4 mb-6 bg-white rounded-lg shadow-lg ">{{-- solo muestra el primer registro no eliminar solo editaar --}}

                @forelse($statics as $item){{-- primer Layout que contiene publicidad estatica --}}
                    @if ($loop->first)
                        <div
                            class="items-center min-h-screen p-1 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl">

                            <img alt="..." class="w-full min-h-screen bg-fill" src="{{ Storage::url($item->image) }}">

                            @can('Only admin'){{-- los atc solo pueden editar la primera publicacion --}}

                                <div class="flex items-center justify-center divide-x divide-gray-300">
                                    <a class="pr-2 cursor-pointer hover:text-blue-600"
                                        wire:click="edit('{{ $item->id }}')">
                                        Editar
                                    </a>
                                </div>
                            @endcan

                        </div>
                    @endif
                @empty
                    <div class="">
                        <img src="{{ asset('img/meganegocios.gif') }}" alt="empty" class="min-h-screen ">
                    </div>

                @endforelse

            </div>

        </div>

        <div class="col-span-2 bg-green-400 rounded-full">{{-- Muestra productos --}}

            <!-- component -->

            <div class="flex flex-wrap items-center pt-8">
                <div class="w-full px-4 ml-auto mr-auto ">
                    <div class="relative flex flex-wrap justify-center">

                        <div class="w-full px-4 my-4">

                            {{-- card con mensaje y bg-imagen --}}
                            <div class="p-8 mx-auto text-center transition duration-500 ease-in-out transform bg-white rounded-lg shadow-xl hover:-translate-y-1 hover:shadow-2xl"
                                style="background-image: url('https://cdn.pixabay.com/photo/2012/02/29/12/19/cute-19004_960_720.jpg');
                                background-position: center;
                                background-repeat: no-repeat;
                                background-size: contain;">

                                <div class="h-16"></div>

                                <h3
                                    class="text-base font-extrabold text-center text-transparent md:text-2xl bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500">
                                    ¡Sorpréndete con nuestras megas ofertas y descuentos sopresas Vip!</h3>

                            </div>

                            @foreach ($products as $product){{-- cards del centro que muestran dos productos aleatorios en 0 y 50 --}}
                                <a href="{{ route('products.show', $product) }}" target="_blank">
                                    <div
                                        class="p-8 mt-8 text-center transition duration-500 ease-in-out transform rounded-lg shadow-lg hover:-translate-y-1 hover:shadow-2xl">
                                        <img alt="..." class="w-16 max-w-full p-1 mx-auto rounded-lg shadow-md"
                                            src="https://img.icons8.com/external-justicon-lineal-color-justicon/64/000000/external-gift-ecommerce-justicon-lineal-color-justicon.png">

                                        <p class="mt-4 text-lg font-semibold text-white">${{ $product->price }}</p>
                                    </div>
                                </a>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>



        </div>

        <div class="">{{-- Segundo Layout derecho que contiene publicidad estatica se cambia el orden de la publicidad cada ves que actualiza sesion --}}

            <div class="flex items-center px-2 py-4 mb-6 bg-white rounded-lg shadow-lg ">

                @forelse($advertisings as $advertising)
                    @if ($loop->first)
                        <div
                            class="items-center min-h-screen p-1 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl">

                            <img alt="..." class="object-fill w-full min-h-screen bg-center bg-cover" src="{{ Storage::url($advertising->image) }}">

                        </div>
                    @endif
                @empty
                    <div class="">
                        <img src="{{ asset('img/meganegocios.gif') }}" alt="empty" class="min-h-screen ">
                    </div>

                @endforelse

            </div>


        </div>



        <x-jet-dialog-modal wire:model="editForm.open">{{-- Modal Solo  Editar la primera publicacion --}}

            <x-slot name="title">
                Editar Banner
            </x-slot>

            <x-slot name="content">

                <div class="space-y-3">

                    <div>
                        @if ($editImage)
                            <img class="object-contain object-center w-full h-64" src="{{ $editImage->temporaryUrl() }}"
                                alt="">
                        @else
                            <img class="object-contain object-center w-full h-64"
                                src="{{ Storage::url($editForm['image']) }}" alt="">
                        @endif
                    </div>

                    <div>
                        <x-jet-label>
                            Titulo
                        </x-jet-label>

                        <x-jet-input wire:model="editForm.title" type="text" class="w-full mt-1" />

                        <x-jet-input-error for="editForm.title" />
                    </div>

                    <div>
                        <x-jet-label>
                            A quíen pertenece esta publicidad ?
                        </x-jet-label>

                        <x-jet-input wire:model.defer="editForm.owner" type="text" class="w-full mt-1" />
                        <x-jet-input-error for="editForm.owner" />
                    </div>

                    <div>
                        <x-jet-label>
                            Imagen
                        </x-jet-label>

                        <input wire:model="editImage" accept="image/*" type="file" class="mt-1" name=""
                            id="{{ $rand }}">
                        <x-jet-input-error for="editImage" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="editImage, update">
                    Actualizar
                </x-jet-danger-button>
            </x-slot>

        </x-jet-dialog-modal>

    </div>
</div>
