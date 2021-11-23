<div>

    <header class="bg-white shadow"> {{-- Cabezera --}}
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">

                <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">

                    <a href="{{ route('job-application') }}" class="mr-2">
                        <img src="https://img.icons8.com/dusk/25/000000/pancake.png" />
                    </a>
                    <a href="{{ route('applications.create') }}" class="mr-2">
                        <img src="https://img.icons8.com/dusk/25/000000/plus-2-math.png" />
                    </a>
                    Solicitud De Empleo
                </h1>

                {{-- <x-jet-danger-button wire:click="$emit('deleteApplications')">
                    Eliminar
                </x-jet-danger-button> --}}

            </div>
        </div>
    </header>

    <div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px-8">

        <h1 class="mb-8 font-semibold text-center md:text-3xl">Complete esta información para culminar su solicitud</h1>

        <div class="px-6 mb-4 text-center bg-white border-b">
            <p class="leading-loose text-center text-gray-dark">
                Luego de completar y/o actualizar  los siguentes datos, una vez envies tu solicitud.
            </p>
            <p class="leading-loose text-center text-gray-dark">
                Nuestra respuesta a tu solicitud estara en la parte inferior de este formulario, así como en tu correo.
            </p>

        </div>

        <div class="mb-4" wire:ignore>{{-- Script para  subir añadir imagenes --}}
            <form action="{{ route('applications.files', $application) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>

        @if ($application->images->count()){{-- Imagenes del usuario a actualizar --}}

            <section class="p-6 mb-4 bg-white rounded-lg shadow-xl">
                <h1 class="mb-2 font-semibold text-center md:text-2xl">Agrega una foto</h1>

                <ul class="flex flex-wrap">
                    @foreach ($application->images as $image)

                        <li class="relative" wire:key="image-{{ $image->id }}">
                            <img class="object-cover w-32 h-20" src="{{ Storage::url($image->url) }}" alt="">
                            <x-jet-danger-button class="absolute right-2 top-2"
                                wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                wire:target="deleteImage({{ $image->id }})">
                                x
                            </x-jet-danger-button>
                        </li>

                    @endforeach

                </ul>
            </section>

        @endif

        <div class="p-6 bg-white rounded-lg shadow-md">

            <div class="grid gap-6 mb-4 md:grid-cols-2">
                {{-- Nombres --}}
                <div class="mb-4">
                    <x-jet-label value="Nombres" />
                    <x-jet-input type="text" class="w-full capitalize " wire:model.defer="application.names"
                        placeholder="Ingrese sus nombres" />
                    <x-jet-input-error for="application.names" />
                </div>

                {{-- Apellidos --}}
                <div class="mb-4">
                    <x-jet-label value="Apellidos" />
                    <x-jet-input type="text" class="w-full capitalize " wire:model.defer="application.surnames"
                        placeholder="Ingrese sus apellidos" />
                    <x-jet-input-error for="application.surnames" />
                </div>

            </div>
            {{-- Slug --}}
            <div class="hidden mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                    placeholder="Ingrese el slug del producto" />

                <x-jet-input-error for="slug" />
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- telefonos --}}
                <div class="mb-4">
                    <x-jet-label value="Número de celular" />
                    <x-jet-input type="text" class="w-full" wire:model.defer="application.phone"
                        placeholder="Ingrese número de contacto" />
                    <x-jet-input-error for="application.phone" />
                </div>

                {{-- correo --}}
                <div class="mb-4">
                    <x-jet-label value="Correo eléctronico" />
                    <x-jet-input type="text" class="w-full" wire:model.defer="application.email"
                        placeholder="Ingrese su correo" />
                    <x-jet-input-error for="application.email" />
                </div>

            </div>

            <div class="grid gap-6 mb-4 sm:grid-cols-2 md:grid-cols-4">

                {{-- Nacionalidad --}}
                <div>
                    <x-jet-label value="Nacionalidad" />
                    <select class="w-full form-control" wire:model.defer="application.nationality">
                        <option value="" selected disabled> Seleccione una nacionalidad </option>
                        <option value="Venezolano">Venezolano</option>
                        <option value="Extranjero">Extranjero</option>

                    </select>

                    <x-jet-input-error for="application.nationality" />
                </div>

                {{-- Cedula de identificaciòn --}}
                <div class="mb-4">
                    <x-jet-label value="Cédula de identidad" />
                    <x-jet-input type="text" class="w-full" wire:model.defer="application.identification"
                        placeholder="Ingrese sus datos" />
                    <x-jet-input-error for="application.identification" />
                </div>

                {{-- estado civil --}}
                <div>
                    <x-jet-label value="Estado civil" />
                    <select class="w-full form-control" wire:model.defer="application.marital_status">
                        <option value="" selected disabled>Seleccione un estado...</option>
                        <option value="Casado">Casado</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="En una relación">En una relacíon</option>
                    </select>

                    <x-jet-input-error for="application.marital_status" />
                </div>

                {{-- fecha de nacimiento --}}
                <div class="mb-4">
                    <x-jet-label value="Fecha de nacimiento" />
                    <x-jet-input type="date" class="w-full" wire:model.defer="application.date"
                        placeholder="Ingrese su fecha de nacimiento" />
                    <x-jet-input-error for="application.date" />
                </div>

            </div>

            {{-- Dirección --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Dirección" />
                    <textarea class="w-full form-control" rows="4" wire:model.defer="application.address" x-data x-init="ClassicEditor.create($refs.miEditor, {
                        toolbar: [ 'heading', '|', 'bold', 'italic', 'blockQuote', 'insertTable', 'link', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ],
                    } )  
                    .then(function(editor){
                            editor.model.document.on('change:data', () => {
                                @this.set('address', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );" x-ref="miEditor">
                    </textarea>
                </div>
                <x-jet-input-error for="application.address" />
            </div>

            <div class="p-6 mb-4 bg-white rounded-lg shadow-sm"> {{-- bilingue --}}
                <p class="mb-2 font-semibold text-center md:text-2xl">¿Usted es Bilingüe?</p>

                <div class="flex items-center justify-center">
                    <label class="mr-6">
                        <input wire:model.defer="application.bilingue" type="radio" name="bilingue" value="1">
                        Si
                    </label>
                    <label>
                        <input wire:model.defer="application.bilingue" type="radio" name="bilingue" value="0">
                        No
                    </label>

                </div>
            </div>

            <div class="grid gap-6 mb-4 sm:grid-cols-1 md:grid-cols-3">

                {{-- Nacionalidad --}}
                <div>
                    <x-jet-label value="Nivel académico" />
                    <select class="w-full form-control" wire:model.defer="application.academic_level">
                        <option value="" selected disabled>Seleccione un nivel...</option>
                        <option value="Bachiller">Bachiller</option>
                        <option value="TSU">TSU</option>
                        <option value="Licenciado">Licenciado</option>
                        <option value="Estudios Superiores">Estudios Superiores</option>
                    </select>

                    <x-jet-input-error for="application.academic_level" />
                </div>

                {{-- profession --}}
                <div class="mb-4">
                    <x-jet-label value="Profesión" />
                    <x-jet-input type="text" class="w-full capitalize " wire:model.defer="application.profession"
                        placeholder="Ingrese su profesión" />
                    <x-jet-input-error for="application.profession" />
                </div>

                {{-- idiomas --}}
                <div class="mb-4">
                    <x-jet-label value="Idiomas que maneja" />
                    <x-jet-input type="text" class="w-full capitalize " wire:model.defer="application.languages"
                        placeholder="Ingrese los diomas que maneja" />
                    <x-jet-input-error for="application.languages" />
                </div>

            </div>

            <div class="grid gap-6 mb-4 sm:grid-cols-1 md:grid-cols-2">

                {{-- Estudios --}}
                <div class="mb-4">
                    <div wire:ignore>
                        <x-jet-label value="Estudios realizados" />
                        <textarea class="w-full form-control" rows="4" wire:model.defer="application.studies" x-data
                            x-init="ClassicEditor.create($refs.miStudies, {
                        toolbar: [ 'heading', '|', 'bold', 'italic', 'blockQuote', 'insertTable', 'link', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ],
                    } )  
                    .then(function(editor){
                            editor.model.document.on('change:data', () => {
                                @this.set('studies', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );" x-ref="miStudies">
                    </textarea>
                    </div>
                    <x-jet-input-error for="application.studies" />
                </div>

                {{-- cursos --}}
                <div class="mb-4">
                    <div wire:ignore>
                        <x-jet-label value="Cursos realizados" />
                        <textarea class="w-full form-control" rows="4" wire:model.defer="application.applications"
                            x-data x-init="ClassicEditor.create($refs.miapplications, {
                        toolbar: [ 'heading', '|', 'bold', 'italic', 'blockQuote', 'insertTable', 'link', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ],
                    } )  
                    .then(function(editor){
                            editor.model.document.on('change:data', () => {
                                @this.set('applications', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );" x-ref="miapplications">
                    </textarea>
                    </div>
                    <x-jet-input-error for="application.applications" />
                </div>

            </div>

            {{-- Habilidades --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Conocimientos y destrezas adicionales" />
                    <textarea class="w-full form-control" rows="4" wire:model.defer="application.skills" x-data x-init="ClassicEditor.create($refs.miSkills, {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'blockQuote', 'insertTable', 'link', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ],
                } )  
                .then(function(editor){
                        editor.model.document.on('change:data', () => {
                            @this.set('skills', editor.getData())
                        })
                    })
                    .catch( error => {
                        console.error( error );
                    } );" x-ref="miSkills" wire:key="miSkills">
                </textarea>
                </div>
                <x-jet-input-error for="application.skills" />

            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-action-message class="mr-3" on="saved">
                    Datos actualizados
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar Datos
                </x-jet-button>
            </div>
        </div>

        {{-- experiencia y rferencias laborales --}}
        <div class="mt-8">
            @livewire('employment-curriculum', ['application' => $application], key('employment-curriculum-' .
            $application->id))

            @livewire('employment-references', ['application' => $application], key('employment-references-' .
            $application->id))
        </div>


        <aside class="p-6 mt-8 mb-4 bg-gray-300 rounded-lg shadow-xl">{{-- respuesta a la solicitud de empleo y estatus de la solicitud --}}

            <p class="mb-2 font-semibold text-center md:text-2xl">Estado De Su Solicitud de Empleo</p>

            <div class="p-6 mb-4 bg-white rounded-lg shadow-xl"> {{-- respuesta de la solicitud --}}

                @if ($application->application){{-- ojo este es el componente Observer --}}
                    <p class="mb-2 font-semibold text-center md:text-lg">Su solicitud ha sido respondida</p>
                    <x-jet-button>
                        <a href="{{ Route('applications.message', $application) }}">Respuesta</a>
                    </x-jet-button>
                @endif

            </div>

            @switch($application->status ?? null)
                @case(1)
                    {{-- Componente Livewire/Status/ Estado del application borrado o revision --}}
                    @livewire('status-application', ['application' => $application], key('status-application-' .
                    $application->id))

                @break
                @case(2)
                    <div class="font-semibold text-center text-gray-800 card">
                        <div class="card-body">
                            Esta solicitud se encuentra en revisión
                        </div>
                    </div>
                @break
                @case(3)
                    <div class="font-semibold text-center text-gray-800 card">
                        <div class="card-body">
                            Esta solicitud ya ha sido Respondida
                        </div>
                    </div>
                @break
                @default

            @endswitch

        </aside>

    </div>

    {{-- Scripts --}}
    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre su foto al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshApplications');
                }
            };


            Livewire.on('deleteApplications', () => {

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

                        Livewire.emitTo('job-applications', 'delete');

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })
        </script>
    @endpush

</div>
