<div>
    <x-jet-dropdown width="96">{{-- componente dropdown ordenes del menu --}}
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">

                <x-components.order color="gray" size="30" />

                <span
                    class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
            </span>

        </x-slot>


        <x-slot name="content">
            <div class="px-4 py-6">
                @if (auth()->user())

                    <x-components.button-enlace href="{{ route('orders.index') }}" color="orange"
                        class="w-full">
                        Ir a sus pedidos
                    </x-components.button-enlace>

                @else
                    <p class="text-center text-gray-700">
                        Upps! Usted no tiene pedidos
                    </p>
                @endif
            </div>

        </x-slot>




    </x-jet-dropdown>

</div>
