<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Image;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditProduct extends Component
{

    public $product, $categories, $subcategories, $brands, $slug;

    public $category_id;
     //validation
    protected $rules = [
        'category_id'            => 'required',
        'product.subcategory_id' => 'required',
        'product.name'           => 'required',
        'slug'                   => 'required|unique:products,slug',
        'product.description'    => 'required',
        'product.brand_id'       => 'required',
        'product.price'          => 'required',
        'product.realprice'      => 'required',
        'product.quantity'       => 'numeric',
    ];

    protected $listeners = ['refreshProduct', 'delete'];

    public function mount(Product $product){//gancho de ciclo de vida
        $this->product = $product;

        $this->categories = Category::all();//traer categorias

        $this->category_id = $product->subcategory->category->id;//traer subcategorias atraves de categorias

        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();

        $this->slug = $this->product->slug;//slug del producto

        $this->brands = Brand::whereHas('categories', function(Builder $query){//traer las marcas del producto
            $query->where('category_id', $this->category_id);
        })->get();
    }


    public function refreshProduct(){
        $this->product = $this->product->fresh();
    }

    public function updatedProductName($value){
        $this->slug = Str::slug($value);
    }

    public function updatedCategoryId($value){//actuaizar categoria, subcategorias y marcas
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value){
            $query->where('category_id', $value);
        })->get();

        /* $this->reset(['subcategory_id', 'brand_id']); */
        $this->product->subcategory_id = "";
        $this->product->brand_id = "";
    }

    public function getSubcategoryProperty(){
        return Subcategory::find($this->product->subcategory_id);
    }

    public function save(){
        $rules = $this->rules;
        $rules['slug'] = 'required|unique:products,slug,' . $this->product->id;

        if ($this->product->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $rules['product.quantity'] = 'required|numeric';
            }
        }

        $this->validate($rules);

        $this->product->slug = $this->slug;

        $this->product->save();

        $this->emit('saved');
    }
   // función para eliminar imagen producto
    public function deleteImage(Image $image){
        Storage::delete([$image->url]);
        $image->delete();

        $this->product = $this->product->fresh();

    }

    public function delete(){
        //función para eliminar producto
        $images = $this->product->images;

        foreach ($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }

        $this->product->delete();

        return redirect()->route('admin.index');

    }


    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
