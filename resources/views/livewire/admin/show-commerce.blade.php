<div> 
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">                            

                <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">                    
                        <a href="{{ URL::previous() }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png"/></a></a> Resgistro de Comercios
                </h1>
                
            </div>
        </div>
    </header>

    <div class="container py-12">
    {{-- Formulario para registrar comercios aliados comerciales vip o comercio vip --}}
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Añadir un nuevo comercio
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder registrar una nuevo comercio.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input disabled wire:model="createForm.slug" type="text" class="w-full mt-1 bg-gray-100" />
                <x-jet-input-error for="createForm.slug" />
            </div>

            

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Gerente o dueño del comercio
                </x-jet-label>

                <x-jet-input wire:model="createForm.manager" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.manager" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Documento de identidad o R.I.F
                </x-jet-label>

                <x-jet-input wire:model="createForm.document" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.document" />
            </div>


            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Número de telefono
                </x-jet-label>

                <x-jet-input wire:model="createForm.number_phone" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.number_phone" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Correo electrónico
                </x-jet-label>

                <x-jet-input wire:model="createForm.email" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.email" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Que tipo de negocio es. A quien va dirigido el servico o producto.
                </x-jet-label>

                <x-jet-input wire:model="createForm.target" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.target" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Lema que identifique al negocio, o descripción breve del mísmo.
                </x-jet-label>

                <x-jet-input wire:model="createForm.description" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.description" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Dirección exacta del negocio y puntos de referencias.
                </x-jet-label>

                <x-jet-input wire:model="createForm.address" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.address" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Ícono
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.icon" type="text" class="w-full mt-1" />
                <x-jet-input-error for="createForm.icon" />
            </div>

            <div class="col-span-6  justify-items-stretch sm:col-span-4">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" name=""
                    id="{{ $rand }}">
                <x-jet-input-error for="createForm.image" />
            </div>

            {{-- Observaciones --}}
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Observaciones
                </x-jet-label>

                <x-jet-input wire:model="createForm.observation" type="text" class="w-full mt-1" />

                <x-jet-input-error for="createForm.observation" />
            </div>

        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Comercio
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    {{-- Lista de comercios --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de Comercios
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todos los comercios, Aliados Comerciale Vip y Comercios Vip, agregados.
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="w-full py-2">Nombre</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($claims as $claim)
                        <tr>
                            <td class="py-2">

                                <a href="#{{--{{ route('admin.commerces.show', $claim) }}--}}" class="text-sm">
                                    {{ $claim->name }}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex font-semibold divide-x divide-gray-300 text-m">
                                    <a class="pr-2 cursor-pointer hover:text-blue-600"
                                        wire:click="edit('{{ $claim->slug }}')">Editar</a>
                                    <a class="pl-2 cursor-pointer hover:text-red-600"
                                        wire:click="$emit('deleteClaim', '{{ $claim->slug }}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    {{-- Modal editar --}}
    <x-jet-dialog-modal wire:model="editForm.open">

        <x-slot name="title">
            Editar comercio
        </x-slot>

        <x-slot name="content">

            <div class="space-y-3">

                <div>
                    @if ($editImage)
                        <img class="object-cover object-center w-full h-64" src="{{$editImage->temporaryUrl()}}" alt="">
                    @else
                        <img class="object-cover object-center w-full h-64" src="{{Storage::url($editForm['image'])}}" alt="">
                    @endif
                </div>

                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>

                    <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="editForm.name" />
                </div>

                <div>
                    <x-jet-label>
                        Slug
                    </x-jet-label>

                    <x-jet-input disabled wire:model="editForm.slug" type="text" class="w-full mt-1 bg-gray-100" />
                    <x-jet-input-error for="editForm.slug" />
                </div>

               <div class="grid grid-cols-2 gap-6 mb-4">

                    <div >
                        <x-jet-label>
                            Gerente o dueño del comercio
                        </x-jet-label>
        
                        <x-jet-input wire:model="editForm.manager" type="text" class="w-full mt-1" />
        
                        <x-jet-input-error for="editForm.manager" />
                    </div>
        
                    <div>
                        <x-jet-label>
                            Documento de identidad o R.I.F
                        </x-jet-label>
        
                        <x-jet-input wire:model="editForm.document" type="text" class="w-full mt-1" />
        
                        <x-jet-input-error for="editForm.document" />
                    </div>

               </div>

               <div class="grid grid-cols-2 gap-6 mb-4">
    
                <div>
                    <x-jet-label>
                        Número de telefono
                    </x-jet-label>
    
                    <x-jet-input wire:model="editForm.number_phone" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="editForm.number_phone" />
                </div>
    
                <div>
                    <x-jet-label>
                        Correo electrónico
                    </x-jet-label>
    
                    <x-jet-input wire:model="editForm.email" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="editForm.email" />
                </div>

               </div>
    
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Que tipo de negocio es. A quien va dirigido el servico o producto.
                    </x-jet-label>
    
                    <x-jet-input wire:model="editForm.target" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="editForm.target" />
                </div>
    
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Lema que identifique al negocio, o descripción breve del mísmo.
                    </x-jet-label>
    
                    <x-jet-input wire:model="editForm.description" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="editForm.description" />
                </div>
    
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Dirección exacta del negocio y puntos de referencias.
                    </x-jet-label>
    
                    <x-jet-input wire:model="editForm.address" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="editForm.address" />
                </div>
    
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Ícono
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="editForm.icon" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="editForm.icon" />
                </div>
    
                <div>
                    <x-jet-label>
                        Imagen o foto del comercio 
                    </x-jet-label>

                    <input wire:model="editImage" accept="image/*" type="file" class="mt-1" name="" id="{{$rand}}">
                    <x-jet-input-error for="editImage" />
                </div>
    
                {{-- Observaciones --}}
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Observaciones
                </x-jet-label>

                <x-jet-input wire:model="editForm.observation" type="text" class="w-full mt-1" />

                <x-jet-input-error for="editForm.observation" />
            </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
    
    @push('script')
        <script>
            Livewire.on('deleteClaim', claimId => {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.show-commerce', 'delete', claimId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            });
        </script>
    @endpush
</div>
</div>
