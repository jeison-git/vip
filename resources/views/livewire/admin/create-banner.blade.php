<div> 
    <div class="container">
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Añadir publicidad
            </x-slot>

            <x-slot name="description"> 
                Complete la información necesaria para poder añadir un banner o imagen que desee publicar
                en su Mega Tienda Virtual Vip, tenga en cuenta las siguientes recomendaciones: <br>

                * Al anadir una imagen la misma pude tener los siguientes &nbsp;&nbsp;&nbsp;formatos: jpeg, png, jpg,
                gif, svg. <br>
                * El tamaño de dato de la imagen no puede sobrepasar &nbsp;&nbsp;&nbsp;2048 megabytes (2MB). <br>
                * Es muy importante que todas las publicaciones (imagenes) &nbsp;&nbsp;&nbsp;posean las mismas
                dimesiones. <br>
                * La resolución recomendada para las dimensiones de sus &nbsp;&nbsp;&nbsp;publicaciones es 640px *
                480px. <br>
                * La dimensiones máximas aceptadas en este registro son &nbsp;&nbsp;&nbsp;640px * 480px. <br>
                * Antes de añadir otro registro actualice la página.

            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Titulo
                    </x-jet-label>

                    <x-jet-input wire:model="createForm.title" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="createForm.title" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        ¿ A quíen pertenece esta publicidad ?
                    </x-jet-label>

                    <x-jet-input wire:model.defer="createForm.owner" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="createForm.owner" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Imagen
                    </x-jet-label>

                    <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" name=""
                        id="{{ $rand }}">
                    <x-jet-input-error for="createForm.image" />
                </div>
            </x-slot>

            <x-slot name="actions">

                <x-jet-action-message class="mr-3" on="saved">
                    Publicidad agregada
                </x-jet-action-message>

                <x-jet-button>
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>

        <x-jet-action-section>
            <x-slot name="title">
                Lista de publícaciones
            </x-slot>

            <x-slot name="description">
                &nbsp;Aquí encontrará todas los banner o publicaciones agregados
            </x-slot>

            <x-slot name="content">

                <table class="text-xs text-gray-600">
                    <thead class="border-b border-gray-300">
                        <tr class="text-left">
                            <th class="w-full py-2">Titulo</th>
                            <th class="py-2">Acción</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-300">
                        @foreach ($banners as $banner)
                            <tr>
                                <td class="py-2">

                                    <span {{-- href="{{route('admin.banners.show', $banner)}}" --}} class="underline {{-- uppercase --}} hover:text-blue-600">
                                        {{ $banner->title }}
                                    </span>
                                </td>
                                <td class="py-2">
                                    <div class="flex divide-x divide-gray-300">
                                        <a class="pr-2 cursor-pointer hover:text-blue-600"
                                            wire:click="edit('{{ $banner->id }}')">Editar</a>
                                        <a class="pl-2 cursor-pointer hover:text-red-600"
                                            wire:click="$emit('deleteBanner', '{{ $banner->id }}')">Eliminar</a>
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
                Editar Banner
            </x-slot>

            <x-slot name="content">

                <div class="space-y-3">

                    <div>
                        @if ($editImage)
                            <img class="object-cover object-center w-full h-64" src="{{ $editImage->temporaryUrl() }}"
                                alt="">
                        @else
                            <img class="object-cover object-center w-full h-64"
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
