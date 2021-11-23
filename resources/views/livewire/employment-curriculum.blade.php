<div>

    <h1 class="font-bold md:text-2xl">EXPERIENCIAS LABORALES </h1>
    
        <hr class="mt-2 mb-6">{{-- esta es el espacio de separación--}}

        @foreach ($employment->oldjobs as $item)

            <article class="mb-6 card" x-data="{open: true}">
                <div class="bg-gray-200 card-body">

                    @if ($oldjob->id == $item->id)

                        <form wire:submit.prevent="update">
                            <input wire:model="oldjob.name"  class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm" placeholder="Ingrese el nombre de la empresa donde trabajó">
                       
                            @error('oldjob.name')
                                <span class="text-xs text-red-500">{{$message}}</span>                           
                             @enderror
                       
                        </form>

                    @else  
                        <header class="flex items-center justify-between">
                            <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Empresa: </strong>{{$item->name}}</h1>

                            <div>
                                <i class="text-blue-500 cursor-pointer fas fa-edit" wire:click="edit({{$item}})"></i>
                                <i class="text-red-500 cursor-pointer fas fa-eraser" wire:click="destroy({{$item}})"></i>
                            </div>

                        </header>

                        <div x-show="open">
                            @livewire('employment-experience', ['oldjob' => $item], key($item->id)){{-- ojo revisar luego --}}
                        </div>

                    @endif

                </div>

            </article>

        @endforeach

        <div x-data="{open: false}">
            <a x-show="!open" x-on:click="open = true" class="flex items-center mb-4 ml-2 cursor-pointer">
                <i class="mr-2 text-red-500 fas fa-plus-square md:text-2xl"></i>
                 Agregar empresa
            </a>

            <article class="card" x-show="open">
                <div class="bg-gray-200 card-body">
                    <h1 class="mb-4 font-bold rounded md:text-xl"> Agregar Experiencia </h1>

                    <div class="mb-4">

                        <input wire:model="name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm" placeholder="Escriba el nombre de la empresa">
                        
                        @error('name')
                          <span class="text-xs text-red-500">{{$message}}</span>  
                        @enderror
                    
                    </div>

                    <div class="flex justify-end">
                        <x-jet-danger-button x-on:click="open = false">Cancelar</x-jet-danger-button>
                        <x-jet-button class="ml-2" wire:click="store">Agregar</x-jet-button>
                    </div>

                </div>

            </article>
        </div>
</div>
