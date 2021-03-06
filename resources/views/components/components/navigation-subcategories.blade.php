@props(['category'])
{{-- componente filtros subcategorias --}}

<div class="grid grid-cols-4 p-4 mt-4">
    <div>
        <p class="mb-3 text-lg font-bold text-center text-trueGray-500">Subcategorías</p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
            <li>
                <a href="{{route('categories.show', $category) . '?subcategoria=' . $subcategory->slug}}" class="inline-block px-4 py-1 font-semibold text-trueGray-500 hover:text-gold">
                    {{$subcategory->name}}
                </a>
            </li>

            @endforeach
        </ul>
    </div>

    <div class="col-span-3"> 

        <img style="object-fit: fill;"class="object-center w-full h-80 " src="{{Storage::url($category->image)}}" alt="">

    </div>

</div>
