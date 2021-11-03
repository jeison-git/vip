<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Roles
        </h2>
    </x-slot>
    <div  class="container">
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Añadir nuevo rol o cargo
            </x-slot>

            <x-slot name="description">
                Complete la información necesaria para poder añadir su rol
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
                        Permisos
                    </x-jet-label>

                    <div class="flex grid mt-4 text-justify sm:grid-cols-2 md:grid-cols-3">
                        @foreach ($permissions as $permission)

                            <x-jet-label>
                                <x-jet-checkbox wire:model.defer="createForm.permissions" name="permissions[]"
                                    value="{{ $permission->id }}" />
                                {{ $permission->name }}
                            </x-jet-label>

                        @endforeach
                    </div>
                    <x-jet-input-error for="createForm.permissions" />
                </div>

            </x-slot>

            <x-slot name="actions">

                <x-jet-action-message class="mr-3" on="saved">
                    Rol agregado
                </x-jet-action-message>

                <x-jet-button>
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>

        <x-jet-action-section>
            <x-slot name="title">
                Lista de roles
            </x-slot>

            <x-slot name="description">
                Aquí encontrará todos roles disponibles
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
                        @foreach ($roles as $role)
                            <tr>
                                <td class="py-2">
                                    <span class="underline uppercase hover:text-blue-600">
                                        {{ $role->name }}
                                    </span>
                                </td>
                                <td class="py-2">
                                    <div class="flex font-semibold divide-x divide-gray-300">
                                        <a class="pr-2 cursor-pointer hover:text-blue-600"
                                            wire:click="edit('{{ $role->id }}')">Editar</a>
                                        <a class="pl-2 cursor-pointer hover:text-red-600"
                                            wire:click="$emit('deleteRole', '{{ $role->id }}')">Eliminar</a>
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
                Editar roles
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
                            Permisos
                        </x-jet-label>

                        <div class="grid grid-cols-1 md:grid-cols-4">
                            @foreach ($permissions as $permission)

                                <x-jet-label>
                                    <x-jet-checkbox wire:model.defer="editForm.permissions" name="permissions[]"
                                        value="{{ $permission->id }}" />
                                    {{ $permission->name }}
                                </x-jet-label>

                            @endforeach
                        </div>
                        <x-jet-input-error for="editForm.permissions" />
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
</div>
