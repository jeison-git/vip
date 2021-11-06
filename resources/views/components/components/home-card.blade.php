@props(['item'])

<div class="flex items-center justify-center">
    <!-- COMPONENT CODE -->
    <div class="flex w-full m-4 bg-white shadow hover:bg-gray-200">
        <div class="flex flex-col">
            <img alt="Unpretentious Baker" class="object-scale-down w-full h-24"
                src="{{ Storage::url($item->images->first()->url) }}">

            <div class="mx-2">
                <div class="">
                    <a href="{{ route('products.show', $item) }}" class="px-2 my-2 text-xs text-red-600 border-2 border-gold">
                        ${{ $item->price }}
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- COMPONENT CODE -->
</div>
