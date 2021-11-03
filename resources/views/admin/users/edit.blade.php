<x-admin-layout>
    <div>

        <x-slot name="header">
            <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">
                <a href="{{ URL::previous() }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png"/></a>Asignar Roles 
            </h1>
        </x-slot>

        <div class="flex items-center justify-center min-h-screen px-4 mb-8">

            <div class="w-full max-w-4xl bg-white rounded-lg shadow-xl">
                <div class="p-4 border-b">
                    <h2 class="text-2xl ">
                        Desea otorgarle un rol a este usuario
                    </h2>
                    <p class="text-sm text-gray-500">
                        &nbsp;Porfavor indique al usuario las responsabilidades del rol que esta por asignarle.
                    </p>
                </div>
                <div>
                    <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                        <p class="text-gray-600">
                            Nombre
                        </p>
                        <p>
                            {{ $user->name }}
                        </p>
                    </div>
                    <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                        <p class="text-gray-600">
                            Email
                        </p>
                        <p>
                            {{ $user->email }}
                        </p>
                    </div>
                    <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                        <p class="text-sm text-gray-600">
                            Roles o cargos disponibles para asignar: <br>
                            &nbsp;Puede seleccionar varias opciones. <br>
                            &nbsp;Para deseleccionar, aplique otro click a la opcion previamente &nbsp;selecionada.
                        </p>
                        <div>

                            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                            @foreach ($roles as $role)
                                <div>
                                    <label>
                                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach

                            {{-- <div class="button">
                            {!! Form::submit('Asignar rol', ['class' => 'btn mt-2']) !!}
                            </div> --}}

                            <x-jet-button class="mt-2" type="submit">Asignar rol</x-jet-button>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-admin-layout>
