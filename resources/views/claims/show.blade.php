<x-app-layout>

    <div class="container py-8">{{-- aliados comerciales --}}

        <figure class="mb-4">{{-- imagen del comercio --}}
            <img class="object-cover object-center w-full h-80" src="{{ Storage::url($claim->image) }}" alt="">
        </figure>

        @livewire('claim-filter', ['claim' => $claim]){{--livewire componente  productos de aliados comerciales--}}
        
    </div>

</x-app-layout> 