<div class="container">
    <x-slot name="header">

        <div class="flex items-center justify-between">                            

            <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">
                
                <a href="{{ route('admin.departments.index') }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/pancake.png"/> 
                <a href="{{ URL::previous() }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/circled-right-2.png"/></a>Estado: {{$department->name}} 
            </h1>            

        </div>
    </x-slot>

    <div class="container py-12">
        {{-- Agregar departamento --}}
        <x-jet-form-section submit="save" class="mb-6">
    
            <x-slot name="title">
                Agregar una nuevo municipio
            </x-slot>
    
            <x-slot name="description">
                Complete la información necesaria para poder agregar un nuevo municipio
            </x-slot>
    
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="createForm.name" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="createForm.name" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Costo de delivery
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="createForm.cost" type="number" class="w-full mt-1" />
    
                    <x-jet-input-error for="createForm.cost" />
                </div>
            </x-slot>
    
            <x-slot name="actions">
    
                <x-jet-action-message class="mr-3" on="saved">
                    municipio agregado
                </x-jet-action-message>
    
                <x-jet-button>
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    
        {{-- Mostrar Departamentos --}}
        <x-jet-action-section>
            <x-slot name="title">
                Lista de municipios
            </x-slot>
    
            <x-slot name="description">
                Aquí encontrará todas las municipios agregados
            </x-slot>
    
            <x-slot name="content">
    
                <table class="text-sm text-gray-600">
                    <thead class="border-b border-gray-300">
                        <tr class="text-left">
                            <th class="w-full py-2">Nombre</th>
                            <th class="py-2">Acción</th>
                        </tr>
                    </thead>
    
                    <tbody class="divide-y divide-gray-300">
                        @foreach ($cities as $city)
                            <tr>
                                <td class="py-2">
    
                                    <a href="{{route('admin.cities.show', $city)}}" class="underline hover:text-blue-600">
                                        {{$city->name}}
                                    </a>
                                </td>
                                <td class="py-2">
                                    <div class="flex font-semibold divide-x divide-gray-300">
                                        <a class="pr-2 cursor-pointer hover:text-blue-600" wire:click="edit({{$city}})">Editar</a>
                                        <a class="pl-2 cursor-pointer hover:text-red-600" wire:click="$emit('deleteCity', {{$city->id}})">Eliminar</a>
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
                Editar Estado
            </x-slot>
    
            <x-slot name="content">
    
                <div class="space-y-3">
                   
                    <div>
                        <x-jet-label>
                            Nombre
                        </x-jet-label>
    
                        <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />
    
                        <x-jet-input-error for="editForm.name" />
                    </div>

                    <div>
                        <x-jet-label>
                            Costo delivery
                        </x-jet-label>
    
                        <x-jet-input wire:model="editForm.cost" type="text" class="w-full mt-1" />
    
                        <x-jet-input-error for="editForm.cost" />
                    </div>
    
                 
                </div>
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                    Actualizar
                </x-jet-danger-button>
            </x-slot>
    
        </x-jet-dialog-modal>
    </div>

    @push('script')
        <script>
            Livewire.on('deleteCity', cityId => {
            
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

                        Livewire.emitTo('admin.show-department', 'delete', cityId)

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