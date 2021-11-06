<x-app-layout>

    <div class="container py-8">{{-- mostrar productos por categorias --}}

        <figure class="mb-4">{{-- imagen de la categoria --}}
            <img class="object-cover object-center w-full h-80" src="{{ Storage::url($category->image) }}" alt="">
        </figure>

        @livewire('category-filter', ['category' => $category]){{--livewire componente/productos porcategorias --}}

    </div>

</x-app-layout> 