<x-admin-layout>
    {{-- función para configurar el estado del pedido --}}
    @livewire('status-order', ['order' => $order])

</x-admin-layout>