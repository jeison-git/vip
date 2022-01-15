<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Claim; 

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class CreateProduct extends Component
{
    //Crear, Editar, Actualizar y eliminar Productos

    public $categories = [], $subcategories = [], $brands = [], $claims = [];//ojo aca
    public $category_id = "", $subcategory_id = "", $brand_id = "", $claim_id = "";
    public $name, $slug, $description, $price, $realprice, $quantity;


    protected $rules = [
        'category_id'    => 'required',
        'subcategory_id' => 'required',
        'claim_id'       => 'required',
        'name'           => 'required',
        'slug'           => 'required|unique:products',
        'description'    => 'required',
        'brand_id'       => 'required',
        'price'          => 'required',
        'realprice'      => 'required',
        
    ]; 

    //actualizar categoria
    public function updatedCategoryId($value){ 


        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value){
            $query->where('category_id', $value);
        })->get();

        $this->reset(['subcategory_id', 'brand_id']);
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    //Subcategoria
    public function getSubcategoryProperty(){
        return Subcategory::find($this->subcategory_id);
    }

    public function mount(){

        $this->categories = Category::all();
        $this->claims     = Claim::all();

    }

    //guardar producto
    public function save(){        

        $rules = $this->rules;

        if ($this->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $rules['quantity'] = 'required';
            }
        }

        $this->validate($rules);

        $product = new Product();

        $product->name        = $this->name;
        $product->slug        = $this->slug;
        $product->description = $this->description;
        $product->price       = $this->price;
        $product->realprice   = $this->realprice;
        $product->category_id = $this->category_id;//ojo aca para posibles errores
        $product->subcategory_id = $this->subcategory_id;
        $product->claim_id    = $this->claim_id;
        $product->brand_id    = $this->brand_id;

        //si una subcategoria posee color o tamaño solicitar, agregar datos adicionales al producto
        if ($this->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $product->quantity = $this->quantity;
            }
        }

        $product->save();

        session()->flash('flash.banner', '¡Gracias usted a añadido un producto!');
        return redirect()->route('admin.products.edit', $product);
    }

    public function render() 
    {
        return view('livewire.admin.create-product')->layout('layouts.admin');
    }
}  
