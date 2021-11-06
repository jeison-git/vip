<x-app-layout>

    <div class="container py-8">{{-- componente que muestras los comercios vip solo carousel --}}

        <figure class="mb-4">
            <img class="object-cover object-center w-full h-80" src="{{ Storage::url($claim->image) }}" alt="">
        </figure>

        @livewire('commerce-filter', ['claim' => $claim], key('commerce-filter' . $claim->id))
        
    </div>

</x-app-layout>  