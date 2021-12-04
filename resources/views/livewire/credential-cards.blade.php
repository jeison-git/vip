<!-- component -->
<div class="container flex items-center justify-center min-h-screen bg-white">    

    <div class="space-y-16">

        <div class="">{{-- identifica la seccion de categorias --}}
            <div class="flex items-center justify-between block">
        
                <span class="flex text-xs text-center text-gray-700 uppercase md:text-2xl ">
                    Active su credencial cliente vip
                </span>
        
                <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
                </div>
        
            </div>
        </div>
        
        <div
            class="relative h-56 m-auto text-white transition-transform transform bg-red-100 shadow-2xl md:w-96 rounded-xl hover:scale-110">

            <img class="object-center w-full h-full rounded-xl" src="{{ asset('img/credentialcard.jpg') }}">
            {{-- 
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


            </div> --}}

            <div class="absolute w-full px-8 mt-16 top-8">

                <div class="grid grid-cols-1 mt-6">

                    <div class="flex justify-center">

                        <div>
                            <!-- Card number -->
                            <div class="font-semibold md:text-2xl number text-gold hover:text-white whitespace-nowrap"
                                style="font-family:Courier new, mono;">
                                {{ auth()->user()->id }}&nbsp;{{ auth()->user()->subscription->id ?? null }}&nbsp;{{ auth()->user()->subscription->plan_id ?? null }}&nbsp;4242
                            </div>
                        </div>

                    </div>

                    <div>
                        
                        <div class="font-semibold text-gold md:text-2xl number whitespace-nowrap"
                            style="font-family:Courier new, mono;">{{ auth()->user()->name }}</div>
                    </div>

                </div>
                <div class="pt-1 pr-2">
                    <div class="flex items-center justify-between">
                        <div class="">
                            <p class="text-xs font-light">
                                Valid
                                </h1>
                            <p class="text-xs font-medium tracking-wider">
                                {{ \Carbon\Carbon::parse(auth()->user()->subscription->active_until ?? null)->format('d/m/Y') }}
                            </p>
                        </div>
                        <div class="">
                            <p class="text-xs font-light">
                                Expiry
                                </h1>
                            <p class="text-xs font-medium tracking-wider">
                                {{ \Carbon\Carbon::parse(auth()->user()->subscription->active_until ?? null)->addDays(auth()->user()->subscription->plan->duration_in_days ?? null)->format('d/m/Y') }}
                            </p>
                        </div>

                        <div class="">
                            <p class="text-xs font-light">
                                CVV
                                </h1>
                            <p class="text-sm font-bold tracking-more-wider">
                                {{ auth()->user()->id }}{{ auth()->user()->subscription->id ?? null }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="relative h-56 m-auto text-white transition-transform transform bg-red-100 shadow-2xl md:w-96 rounded-xl hover:scale-110">
                
            <img class="object-center w-full h-full rounded-xl" src="{{asset('img/credentialcardother.jpg')}}">
            
            <div class="absolute w-full px-8 mt-8 top-8">
                <div class="grid grid-cols-1">

                    <div class="flex justify-center text-black">
                        <p class="font-light">
                            {{ auth()->user()->id }}&nbsp;{{ auth()->user()->subscription->id ?? null }}&nbsp;{{ auth()->user()->subscription->plan_id ?? null }}&nbsp;4242
                        </h1>
                        <p class="font-medium tracking-widest">
                            {{ auth()->user()->id }} {{ auth()->user()->subscription->id ?? null }}
                        </p>
                    </div>

                </div>
            </div> 
        </div>

        @if ($hideForm != true)

            <div class="flex items-center justify-end">

                <x-jet-action-message class="mr-3" on="saved">
                    Credencial creada y activada
                </x-jet-action-message>


                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
                    Activar Credencial
                </x-jet-button>

            </div>

        @endif

    </div>

</div>
