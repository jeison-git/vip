<div class="">

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold leading-tight text-gray-600 md:text-xl">
                Lista De Credenciales Activas
            </h2>
        </div>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12">

        <x-components.table-responsive>

            <div class="px-6 py-4">

                <x-jet-input type="text" 
                    wire:model="search" 
                    class="w-full"
                    placeholder="Ingrese el nombre del correo que desea buscar" />

            </div>

            @if ($credentials->count())
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                ID Usuario
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Nombre Usuario
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Estado Credencial
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                CVV
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Ver mensaje</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($credentials as $credential)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img src="https://img.icons8.com/external-prettycons-lineal-color-prettycons/49/000000/external-credit-card-shopping-prettycons-lineal-color-prettycons-3.png"/>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $credential->user_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{ $credential->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($credential->status)
                                        @case(0)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                Borrador
                                            </span>
                                        @break
                                        @case(1)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Activo
                                            </span>
                                        @break
                                        @default

                                    @endswitch

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{ $credential->cvv }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a  href="{{ route('admin.credentials.show', $credential) }}" class="text-indigo-600 hover:text-indigo-900">Ver Credencial</a>
                                </td>
                            </tr>

                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($credentials->hasPages())
                
                <div class="px-6 py-4">
                    {{ $credentials->links() }}
                </div>
                
            @endif                

        </x-components.table-responsive>
    </div>

</div>
