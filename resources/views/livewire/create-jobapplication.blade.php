<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px-8">

    <h1 class="flex items-cente">
        <a href="{{ route('job-application') }}" class="mr-2"><img
                src="https://img.icons8.com/dusk/25/000000/pancake.png" />
            <a href="{{ URL::previous() }}" class="mr-2"><img
                    src="https://img.icons8.com/dusk/25/000000/circled-right-2.png" /></a>
    </h1>

    <h1 class="mb-8 font-semibold text-center md:text-2xl">
        Complete esta información para crear una solicitud de empleo
    </h1>

    <div class="px-6 mb-8 text-center bg-white border-b">
        <h1 class="pb-4 text-xl ">Descripción de la oferta</h1>

        <p class="leading-loose text-justify text-gray-dark">
            Si el talento humano que buscamos no encajan con tu perfil, no te preocupes, puedes completar el siguente
            formulario, para tenerte en cuenta en próximos procesos de selección.
        </p>

        <p class="leading-loose text-justify text-gray-dark">
            Meganegocios Vip se encuentra en un periodo de crecimiento y expansión, lo que nos impulsa a la búsqueda
            constante de nuevos talentos.
        </p>

        <p class="leading-loose text-justify text-gray-dark">
            Si te gusta el sector de la tecnología, si te sientes cómodo en un entorno dinámico, retador y estimulante…
            ¡Queremos conocerte!
        </p>

        <p class="leading-loose text-justify text-gray-dark">
            El equipo de Recursos Humanos valorará tu perfil y si considera que puedes ser un@ candidat@ idóne@,
            contactarán contigo para conocerte.
        </p>
    </div>


    <div class="grid gap-6 mb-4 md:grid-cols-2">
        {{-- Nombres --}}
        <div class="mb-4">
            <x-jet-label value="Nombres" />
            <x-jet-input type="text" class="w-full capitalize" wire:model.defer="names"
                placeholder="Ingrese sus nombres" />
            <x-jet-input-error for="names" />
        </div>

        {{-- Apellidos --}}
        <div class="mb-4">
            <x-jet-label value="Apellidos" />
            <x-jet-input type="text" class="w-full capitalize" wire:model.defer="surnames"
                placeholder="Ingrese sus apellidos" />
            <x-jet-input-error for="surnames" />
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
            <x-jet-input type="text" class="w-full" wire:model.defer="phone"
                placeholder="Ingrese número de contacto" />
            <x-jet-input-error for="phone" />
        </div>

        {{-- correo --}}
        <div class="mb-4">
            <x-jet-label value="Correo eléctronico" />
            <x-jet-input type="text" class="w-full" wire:model.defer="email" placeholder="Ingrese su correo" />
            <x-jet-input-error for="email" />
        </div>

    </div>

    <div class="grid gap-6 mb-4 sm:grid-cols-2 md:grid-cols-4">

        {{-- Nacionalidad --}}
        <div>
            <x-jet-label value="Nacionalidad" />
            <select class="w-full form-control" wire:model.defer="nationality">
                <option value="" selected disabled> Seleccione una nacionalidad </option>
                <option value="Venezolano">Venezolano</option>
                <option value="Extranjero">Extranjero</option>

            </select>

            <x-jet-input-error for="nationality" />
        </div>

        {{-- Cedula de identificaciòn --}}
        <div class="mb-4">
            <x-jet-label value="Cédula de identidad" />
            <x-jet-input type="text" class="w-full" wire:model.defer="identification"
                placeholder="Ingrese sus datos" />
            <x-jet-input-error for="identification" />
        </div>

        {{-- estado civil --}}
        <div>
            <x-jet-label value="Estado civil" />
            <select class="w-full form-control" wire:model.defer="marital_status">
                <option value="" selected disabled>Seleccione un estado...</option>
                <option value="Casado">Casado</option>
                <option value="Soltero">Soltero</option>
                <option value="Divorciado">Divorciado</option>
                <option value="En una relación">En una relacíon</option>
            </select>

            <x-jet-input-error for="marital_status" />
        </div>

        {{-- fecha de nacimiento --}}
        <div class="mb-4">
            <x-jet-label value="Fecha de nacimiento" />
            <x-jet-input type="date" class="w-full" wire:model.defer="date"
                placeholder="Ingrese su fecha de nacimiento" />
            <x-jet-input-error for="date" />
        </div>

    </div>

    {{-- Dirección --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Dirección" />
            <textarea class="w-full form-control" rows="4" wire:model.defer="address" x-data x-init="ClassicEditor.create($refs.miEditor, {
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
        <x-jet-input-error for="address" />
    </div>

    <div class="p-6 mb-4 bg-white rounded-lg shadow-sm"> {{-- bilingue --}}
        <p class="mb-2 font-semibold text-center md:text-2xl">¿Usted es Bilingüe?</p>

        <div class="flex items-center justify-center">
            <label class="mr-6">
                <input wire:model.defer="bilingue" type="radio" name="bilingue" value="1">
                Si
            </label>
            <label>
                <input wire:model.defer="bilingue" type="radio" name="bilingue" value="0">
                No
            </label>

        </div>
    </div>

    <div class="grid gap-6 mb-4 sm:grid-cols-1 md:grid-cols-3">

        {{-- Nacionalidad --}}
        <div>
            <x-jet-label value="Nivel académico" />
            <select class="w-full form-control" wire:model.defer="academic_level">
                <option value="" selected disabled>Seleccione un nivel...</option>
                <option value="Bachiller">Bachiller</option>
                <option value="TSU">TSU</option>
                <option value="Licenciado">Licenciado</option>
                <option value="Estudios Superiores">Estudios Superiores</option>
            </select>

            <x-jet-input-error for="academic_level" />
        </div>

        {{-- profession --}}
        <div class="mb-4">
            <x-jet-label value="Profesión" />
            <x-jet-input type="text" class="w-full capitalize" wire:model.defer="profession"
                placeholder="Ingrese su profesión" />
            <x-jet-input-error for="profession" />
        </div>

        {{-- idiomas --}}
        <div class="mb-4">
            <x-jet-label value="Idiomas que maneja" />
            <x-jet-input type="text" class="w-full capitalize" wire:model.defer="languages"
                placeholder="Ingrese los diomas que maneja" />
            <x-jet-input-error for="languages" />
        </div>

    </div>

    <div class="grid gap-6 mb-4 sm:grid-cols-1 md:grid-cols-2">

        {{-- Estudios --}}
        <div class="mb-4">
            <div wire:ignore>
                <x-jet-label value="Estudios realizados" />
                <textarea class="w-full form-control" rows="4" wire:model.defer="studies" x-data x-init="ClassicEditor.create($refs.miStudies, {
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
            <x-jet-input-error for="studies" />
        </div>

        {{-- cursos --}}
        <div class="mb-4">
            <div wire:ignore>
                <x-jet-label value="Cursos realizados" />
                <textarea class="w-full form-control" rows="4" wire:model.defer="courses" x-data x-init="ClassicEditor.create($refs.miCourses, {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'blockQuote', 'insertTable', 'link', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ],
            } )  
            .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('courses', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );" x-ref="miCourses">
            </textarea>
            </div>
            <x-jet-input-error for="courses" />
        </div>

    </div>

    {{-- Habilidades --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Conocimientos y destrezas adicionales" />
            <textarea class="w-full form-control" rows="4" wire:model.defer="skills" x-data x-init="ClassicEditor.create($refs.miSkills, {
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
        <x-jet-input-error for="skills" />
    </div>

    <div class="flex mt-4">
        <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
            Añadir solicitud
        </x-jet-button>
    </div>

</div>
