<div> 
    
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nuevo tipo de comercio
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder crear un tipo de comercio
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
                    Descripción
                </x-jet-label>

                <x-jet-input wire:model.defer="createForm.description" type="text" class="w-full mt-1" />
                <x-jet-input-error for="createForm.description" />
            </div>

        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Tipo de comercio creado
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Tipos de comercios
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas los tipos de comercios agregados
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
                    @foreach ($commerces as $commerce)
                        <tr>
                            <td class="py-2">

                                {{--<span class="inline-block w-8 mr-2 text-center ">
                                    {!!$commerce->description!!}
                                </span>--}}

                                <a href="{{route('admin.commerces.show', $commerce)}}" class="underline uppercase hover:text-blue-600">
                                    {{$commerce->name}}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex font-semibold divide-x divide-gray-300">
                                    <a class="pr-2 cursor-pointer hover:text-blue-600" wire:click="edit('{{$commerce->slug}}')">Editar</a>
                                    <a class="pl-2 cursor-pointer hover:text-red-600" wire:click="$emit('deleteCommerce', '{{$commerce->slug}}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">

        <x-slot name="title">
            Editar tipo de comercio
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
                        Slug
                    </x-jet-label>

                    <x-jet-input disabled wire:model="editForm.slug" type="text" class="w-full mt-1 bg-gray-100" />
                    <x-jet-input-error for="editForm.slug" />
                </div>

                <div>
                    <x-jet-label>
                        Descripción
                    </x-jet-label>

                    <x-jet-input wire:model.defer="editForm.description" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="editForm.description" />
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
 