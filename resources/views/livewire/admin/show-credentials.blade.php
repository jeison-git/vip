<div >
 
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">
                    <a href="{{ URL::previous() }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png"/></a>Credencial
                </h1>

                @can('Only admin')
                   <x-jet-danger-button wire:click="$emit('deleteCredential')">
                    Eliminar
                    </x-jet-danger-button> 
                @endcan               

            </div>
        </div>
    </header>


    <div class="container flex items-center justify-center min-h-screen">    

        <div class="space-y-16">
            
            <div
                class="relative h-56 m-auto text-white transition-transform transform bg-red-100 shadow-2xl md:w-96 rounded-xl hover:scale-110">
    
                <img class="object-center w-full h-full rounded-xl" src="{{ asset('img/credentials.png') }}">
    
    
                <div
                    class="absolute w-8 h-8 overflow-hidden rounded-lg top-10 left-8 bg-gradient-to-r from-yellow-400 to-yellow-200 opacity-90">
                    <span
                        class="absolute flex w-10 h-full transform -translate-x-1/2 -translate-y-1/2 bg-opacity-50 border border-gray-400 rounded-lg top-1/2 left-1"></span>
                    <span
                        class="absolute flex w-10 h-full transform translate-x-1/2 -translate-y-1/2 bg-opacity-50 border border-gray-400 rounded-lg top-1/2 right-1"></span>
                    <span
                        class="flex absolute top-1.5 right-0 w-full h-5 bg-opacity-50 rounded-full transform -translate-y-1/2 border border-gray-400"></span>
                    <span
                        class="flex absolute bottom-1.5 right-0 w-full h-5 bg-opacity-50 rounded-full transform translate-y-1/2 border border-gray-400"></span>
    
    
                </div>
    
    
    
                <div class="absolute w-full px-8 mt-8 top-8">
    
                    <div class="grid grid-cols-1 mt-2">
    
                        <div class="flex justify-center">
    
                            <div>
                                <!-- Card number -->
                                <div class="font-semibold md:text-2xl number whitespace-nowrap"
                                    style="font-family:Courier new, mono;">
                                    {{ $credential->user_id ?? null }}&nbsp;{{ $credential->subscription_id ?? null }}&nbsp;{{ $credential->plan_id ?? null }}&nbsp;4242
                                </div>
                            </div>
    
    
                        </div>
    
                        <div>
                            <label class="font-light">
                                Name
                            </label>
                            <div class="font-semibold md:text-2xl number whitespace-nowrap"
                                style="font-family:Courier new, mono;">{{ $credential->name ?? null }}</div>
                        </div>
    
                    </div>
                    <div class="pt-6 pr-6">
                        <div class="flex justify-between">
                            <div class="">
                                <p class="text-xs font-light">
                                    Valid
                                    </h1>
                                <p class="text-sm font-medium tracking-wider">
                                    {{ \Carbon\Carbon::parse($credential->created_at ?? null)->format('d/m/Y') }}
                                </p>
                            </div>
    
                            <div class="">
                                <p class="text-xs font-light">
                                    CVV
                                    </h1>
                                <p class="text-sm font-bold tracking-more-wider">
                                    {{ $credential->user_id ?? null }} {{$credential->subscription_id ?? null }}
                                </p>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
            {{-- @if ($hideForm != true)
    
                <div class="flex items-center justify-end">
    
                    <x-jet-action-message class="mr-3" on="saved">
                        Credencial creada y activada
                    </x-jet-action-message>
    
    
                    <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
                        Activar Credencial
                    </x-jet-button>
    
                </div>
    
            @endif --}}
    
        </div>
    
    </div>


    @push('script')
        <script>

            Livewire.on('deleteCredential', () => {

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

                        Livewire.emitTo('admin.show-credentials', 'delete');

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
 