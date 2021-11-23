<div>
    {{-- Se mostrara la informacion de la experiencia --}}

    @foreach ($oldjob->experiences as $item)
        <article class="mt-4 card" x-data="{open: false}">
            <div class="card-body">

                @if ($experience->id == $item->id)
                    <form wire:submit.prevent="update">

                        <div class="flex items-center">
                            <label class="w-32">Funciones realizadas: </label>
                            <input wire:model.defer="experience.name"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        @error('experience.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        <div wire:ignore>
                            <x-jet-label value="Detalles" />
                            <textarea class="w-full form-control" rows="4" wire:model.defer="experience.contents" x-data
                                x-init="ClassicEditor.create($refs.miExperience, {
                                    toolbar: [ 'heading', '|', 'bold', 'italic', 'blockQuote', 'insertTable', 'link', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ],
                                } )  
                                .then(function(editor){
                                        editor.model.document.on('change:data', () => {
                                            @this.set('experience.contents', editor.getData())
                                        })
                                    })
                                    .catch( error => {
                                        console.error( error );
                                    } );" x-ref="miExperience" wire:key="miExperience"
                                placeholder="Detalle las funciones que realizaba en su antiguo empleo">
                                    {!! $contents !!}
                                </textarea>
                        </div>

                        @error('experience.contents')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-end mt-4">
                            <x-jet-danger-button class="cursor-pointer" wire:click="cancel">
                                Cancelar
                            </x-jet-danger-button>
                            <x-jet-button id="submit" type="submit" {{-- wire:click="update" --}} class="ml-2 cursor-pointer">
                                Actualizar
                            </x-jet-button>
                        </div>

                    </form>
                @else
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i
                                class="mr-1 text-blue-500 fas fa-clipboard-check"></i>Funciones realizadas:
                            {{ $item->name }}</h1>
                    </header>

                    <div x-show="open">

                        <hr class="my-2">

                        <p class="text-sm">Funciones realizadas: {{ $item->name }}</p>
                        <p class="text-sm">Detalles: {!! Str::limit($item->contents) !!} </p>

                        <div class="my-2">
                            <x-jet-button class="text-sm"
                                wire:click="edit({{ $item }})">
                                Editar
                            </x-jet-button>

                            <x-jet-danger-button class="text-sm"
                                wire:click="destroy({{ $item }})">
                                Eliminar
                            </x-jet-danger-button>
                        </div>

                    </div>
                @endif
            </div>
        </article>

    @endforeach
    {{-- card para agregar y actualizar lecciones y secciones --}}
    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center mb-4 ml-2 cursor-pointer">
            <i class="mr-2 text-red-500 md:text-2xl fas fa-plus-square"></i>
            Agregar experiencia laboral
        </a>

        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="mb-4 font-bold rounded md:text-xl"> Agregar nueva experiencia laboral </h1>

                <div class="mb-4">

                    <div class="flex items-center">
                        <label class="w-32">Funciones realizadas: </label>
                        <input wire:model.defer="name"
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <form>

                        <div wire:ignore>
                            <x-jet-label value="Detalles" />
                            <textarea class="w-full form-control" rows="4" wire:model.defer="contents" x-data x-init="ClassicEditor.create($refs.miCkeditor, {
                                    toolbar: [ 'heading', '|', 'bold', 'italic', 'blockQuote', 'insertTable', 'link', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ],
                                } )  
                                .then(function(editor){
                                        editor.model.document.on('change:data', () => {
                                            @this.set('contents', editor.getData())
                                        })
                                    })
                                    .catch( error => {
                                        console.error( error );
                                    } );" x-ref="miCkeditor" wire:key="miCkeditor"
                                placeholder="Detalle las funciones que realizaba en su antiguo empleo">
                                    {!! $contents !!}
                                </textarea>
                        </div>
                    </form>

                    @error('contents')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div class="flex justify-end">
                    <x-jet-danger-button x-on:click="open = false">
                        Cancelar
                    </x-jet-danger-button>
                    <x-jet-button class="ml-2" wire:click="store">
                        Agregar
                    </x-jet-button>
                </div>

            </div>

        </article>
    </div>


</div>
