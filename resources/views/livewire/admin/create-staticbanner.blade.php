<div> 
    <div class="container">
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Añadir publicidad Estatica
            </x-slot>

            <x-slot name="description"> 
                Complete la información necesaria para poder añadir un banner estatico o imagen que desee publicar
                en Aliados Comerciales Vip, tenga en cuenta las siguientes recomendaciones: <br>

                * Al anadir una imagen la misma pude tener los siguientes &nbsp;&nbsp;&nbsp;formatos: jpeg, png, jpg,
                gif, svg. <br>
                * El tamaño de dato de la imagen no puede sobrepasar &nbsp;&nbsp;&nbsp;2048 megabytes (2MB). <br>
                * Es muy importante que todas las publicaciones (imagenes) &nbsp;&nbsp;&nbsp;posean las mismas
                dimesiones. <br>
                * La resolución recomendada para las dimensiones de sus &nbsp;&nbsp;&nbsp;publicaciones es 300px *
                720px. <br>
                * La dimensiones máximas aceptadas en este registro son &nbsp;&nbsp;&nbsp;300px * 720px. <br>
                * Antes de añadir otro registro actualice la página.

            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Titulo
                    </x-jet-label>

                    <x-jet-input wire:model.defer="createForm.title" type="text" class="w-full mt-1" />

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
                        ¿Quieres un límite de tiempo para esta publicidad?
                    </x-jet-label>

                    <input wire:model.defer="createForm.finished_at" type="datetime-local" class="w-full mt-1 form-control">
                    <x-jet-input-error for="createForm.finished_at" />
                </div>

                <div class="col-span-6 text-xs sm:col-span-4">
                    <x-jet-label>
                        Imagen
                    </x-jet-label>

                    <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" name=""
                        id="{{ $rand ?? null}}">
                    <x-jet-input-error for="createForm.image" />
                </div>
            </x-slot>

            <x-slot name="actions">

                <x-jet-action-message class="mr-3" on="saved">
                    Publicidad agregada
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled">
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>

        <x-jet-action-section>
            <x-slot name="title">
                Lista de publícaciones estaticas
            </x-slot>

            <x-slot name="description">
                &nbsp;Aquí encontrará todas los static o publicaciones agregados
            </x-slot>

            <x-slot name="content">

                <table class="text-xs text-gray-600">
                    <thead class="border-b border-gray-300">
                        <tr class="text-left">
                            <th class="w-full py-2">Titulo&nbsp;-&nbsp;Vencimiento</th>
                            <th class="py-2">Acción</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-300 cursor-default">
                        @foreach ($statics as $static)
                            <tr>
                                <td class="py-2">

                                    <span class="text-xs uppercase hover:text-blue-600">
                                        {{ $static->title }}
                                    </span>
                                    <span class="ml-1 mr-1 text-xs hover:text-red-600">
                                        Vence&nbsp;{{ $static->finished_at ? $static->finished_at->diffForHumans() : 'Sin límite de tiempo' }}
                                    </span>
                                </td>

                                <td class="py-2">
                                    <div class="flex divide-x divide-gray-300">
                                        <a class="pr-2 cursor-pointer hover:text-blue-600"
                                            wire:click="edit('{{ $static->id }}')">Editar</a>
                                        <a class="pl-2 cursor-pointer hover:text-red-600"
                                            wire:click="$emit('deleteStatic', '{{ $static->id }}')">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </x-slot>
        </x-jet-action-section>

        <x-jet-dialog-modal wire:model="editForm.open">{{-- Modal Solo  Editar la primera publicacion --}}

            <x-slot name="title">
                Editar Banner statico
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
                            ¿ A quíen pertenece esta publicidad ?
                        </x-jet-label>

                        <x-jet-input wire:model.defer="editForm.owner" type="text" class="w-full mt-1" />
                        <x-jet-input-error for="editForm.owner" />
                    </div>

                    <div>
                        <x-jet-label>
                            Fecha de vencimiento
                        </x-jet-label>

                        <input wire:model.defer="editForm.finished_at" type="datetime-local" class="w-full mt-1 form-control">

                        <x-jet-input-error for="editForm.finished_at" />
                    </div>

                    <div>
                        <x-jet-label> 
                            Imagen
                        </x-jet-label>

                        <input wire:model="editImage" accept="image/*" type="file" class="mt-1" name=""
                            id="{{ $rand ?? null }}">
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