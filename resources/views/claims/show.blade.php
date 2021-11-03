<x-app-layout>

    <div class="container py-8">

        <figure class="mb-4">
            <img class="object-cover object-center w-full h-80" src="{{ Storage::url($claim->image) }}" alt="">
        </figure>

        @livewire('claim-filter', ['claim' => $claim])
        
    </div>

</x-app-layout> 