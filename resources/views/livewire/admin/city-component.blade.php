<div class="container">
    <x-slot name="header">
        <h2 class="flex items-center justify-start font-semibold leading-tight text-gray-800 capitalize md:text-2xl">
            <a href="{{ URL::previous() }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png"/></a> Municipio: {{$city->name}}
        </h2>
    </x-slot>

    <div class="container py-12">
        {{-- Agregar parroquia --}}
        <x-jet-form-section submit="save" class="mb-6">
    
            <x-slot name="title">
                Agregar una nueva parroquia
            </x-slot>
    
            <x-slot name="description">
                Complete la información necesaria para poder agregar una nueva parroquia
            </x-slot>
    
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="createForm.name" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="createForm.name" />
                </div>

            </x-slot>
    
            <x-slot name="actions">
    
                <x-jet-action-message class="mr-3" on="saved">
                    parroquia agregada
                </x-jet-action-message>
    
                <x-jet-button>
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    
        {{-- Mostrar Departamentos --}}
        <x-jet-action-section>
            <x-slot name="title">
                Lista de parroquias
            </x-slot>
    
            <x-slot name="description">
                Aquí encontrará todas las parroquias agregadas
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
                        @foreach ($districts as $district)
                            <tr>
                                <td class="py-2">
    
                                    {{$district->name}}
                                    {{-- <a href="{{route('admin.districts.show', $district)}}" class="uppercase unaderline hover:text-blue-600">
                                        {{$district->name}}
                                    </a> --}}
                                </td>
                                <td class="py-2">
                                    <div class="flex font-semibold divide-x divide-gray-300">
                                        <a class="pr-2 cursor-pointer hover:text-blue-600" wire:click="edit({{$district}})">Editar</a>
                                        <a class="pl-2 cursor-pointer hover:text-red-600" wire:click="$emit('deleteDistrict', {{$district->id}})">Eliminar</a>
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
                Editar parroquia
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
            Livewire.on('deleteDistrict', districtId => {
            
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

                        Livewire.emitTo('admin.city-component', 'delete', districtId)

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
