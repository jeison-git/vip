<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px-8">

    <h1 class="flex items-cente">                    
        <a href="{{ route('admin.index') }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/pancake.png"/> 
        <a href="{{ URL::previous() }}" class="mr-2"><img src="https://img.icons8.com/dusk/25/000000/circled-right-2.png"/></a>
    </h1> 

    <h1 class="mb-8 text-3xl font-semibold text-center">Complete esta información para crear un producto</h1>

    <div class="grid grid-cols-2 gap-6 mb-4">

        {{-- Categoría --}}
        <div>
            <x-jet-label value="Categorías" />
            <select class="w-full form-control" wire:model="category_id">
                <option value="" selected disabled>Seleccione una categoría</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="category_id" />
        </div>

        {{-- Subcategoría --}}
        <div>
            <x-jet-label value="Subcategorías" />
            <select class="w-full form-control" wire:model="subcategory_id">
                <option value="" selected disabled>Seleccione una subcategoría</option>

                @foreach ($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="subcategory_id" />
        </div>
    </div>

    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" 
                    class="w-full"
                    wire:model="name"
                    placeholder="Ingrese el nombre del producto" />
        <x-jet-input-error for="name" />
    </div>

    {{-- Slug --}}
    <div class="mb-4"> 
        <x-jet-label value="Slug" />
        <x-jet-input type="text"
            disabled
            wire:model="slug"
            class="w-full bg-gray-200" 
            placeholder="Ingrese el slug del producto" />

    <x-jet-input-error for="slug" />
    </div>

    {{-- Descrición --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Descripción" />
            <textarea class="w-full form-control" rows="4"
                wire:model="description"
                x-data 
                x-init="ClassicEditor.create($refs.miEditor)
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );"
                x-ref="miEditor">
            </textarea>
        </div>
        <x-jet-input-error for="description" />
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">{{-- ojo --}}
        
        {{-- Precio --}}
        <div>
            <x-jet-label value="Precio Vip" />
            <x-jet-input 
                wire:model="price"
                type="number" 
                class="w-full" 
                step=".01" />
            <x-jet-input-error for="price" />
        </div>
        {{-- Preciovip --}}
        <div>
            <x-jet-label value="Precio Real" />
            <x-jet-input 
                wire:model="pricevip"
                type="number" 
                class="w-full" 
                step=".01" />
            <x-jet-input-error for="pricevip" />
        </div>
    </div> 

    <div class="grid grid-cols-1 gap-4 mb-4">{{-- ojo --}}
        
        {{-- Marca --}}
        <div>
            <x-jet-label value="Marca" />
            <select class="w-full form-control" wire:model="brand_id">
                <option value="" selected disabled>Seleccione una marca</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="brand_id" />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 mb-4">{{-- modifique para agregar claims --}}
        {{-- lugar de retiro, tienda afiliados --}}
        <div>
            <x-jet-label value="Aliado comercial vip" />
            <select class="w-full form-control" wire:model="claim_id">
                <option value="" selected disabled>Seleccione un aliado comercial vip</option>
                @foreach ($claims as $claim)
                    <option value="{{$claim->id}}">{{$claim->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="claim_id" />
        </div>
    </div>

    @if ($subcategory_id)
        
        @if (!$this->subcategory->color && !$this->subcategory->size)
            
            <div>
                <x-jet-label value="Cantidad" />
                <x-jet-input 
                    wire:model="quantity"
                    type="number" 
                    class="w-full" />
                <x-jet-input-error for="quantity" />
            </div>

        @endif

    @endif

    <div class="flex mt-4">
        <x-jet-button
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save"
            class="ml-auto">
            Crear producto
        </x-jet-button>
    </div>

</div>