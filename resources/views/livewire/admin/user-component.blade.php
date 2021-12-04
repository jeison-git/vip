<div>{{-- Componentes lista de Usuarios --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Usuarios
        </h2>
    </x-slot>

    <div class="container py-12">
        <x-components.table-responsive>

            <div class="px-6 py-4">

                <x-jet-input wire:model="search" type="text" class="w-full" placeholder="Escriba algo para filtrar" />

            </div>

            @if (count($users))
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Afiliado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Rol
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($users as $user)

                            <tr wire:key="{{$user->email}}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-900">
                                        {{$user->id}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{$user->name}}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$user->email}}
                                    </div>

                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        
                                       {{--  @if (count(user())->hasActiveSubscription()) --}}
                                        {{-- @if ($user->hasActiveSubscription() ) --}}
                                        @if ( $user->hasActiveSubscription() || $user->subscription )
                                            Afiliado
                                        @else
                                            No
                                        @endif

                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        
                                        @if (count($user->roles))
                                            Posee rol
                                        @else
                                            No tiene rol
                                        @endif

                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">

                                    @can('Only admin')                                        
                                    
                                    <a class="pr-2 underline cursor-pointer hover:text-blue-600"  href="{{route('admin.users.edit', $user)}}">Asignar o cambiar rol</a>

                                    @endcan

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

             @if ($users->hasPages()){{-- Paginacion --}}
                    
                <div class="px-6 py-4">
                    {{$users->links()}}
                </div>

            @endif 
            
        </x-components.table-responsive>
    </div>
</div>