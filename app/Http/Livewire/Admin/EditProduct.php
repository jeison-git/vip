<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Claim;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditProduct extends Component
{
    protected $listeners = [
        'refreshProduct'
    ];

    public $product, $categories, $subcategories, $brands, $slug, $claims;

    public $open_confir = false;

    public $category_id;

    protected $rules = [
        'category_id'            => 'required',
        'product.subcategory_id' => 'required',
        'product.claim_id'       => 'required',  
        'product.name'           => 'required',
        'product.description'    => 'required',
        'product.slug'           => 'required|unique:products,slug',
        'product.brand_id'       => 'required',
        'product.price'          => 'required',
        'product.realprice'      => 'required',
        'product.quantity'       => 'numeric|nullable',
    ];

    public function confirProductDelete()
    {
        $this->open_confir = true;
    }

    public function delete()
    {
        $mensaje = "El producto " . $this->product->name . " fue eliminado satisfactoriamente";
        $images = $this->product->images;

        foreach ($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }
        $this->open_confir = false;
        $this->product->delete();

        session()->flash('flash.banner', $mensaje);
        session()->flash('flash.bannerStyle', 'danger'); 
        redirect()->route('admin.index');
    }

    public function mount(Product $product)
    {
        $this->product = $product;

        $this->categories = Category::all();
        $this->claims = Claim::all();

        $this->claim_id = $this->product->claim_id;//

        $this->category_id = $product->subcategory->category->id;

        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();

        $this->brands = Brand::whereHas('categories', function (Builder $query) {
            $query->where('category_id', $this->category_id);
        })->get();
    }
    public function updatedProductName($value)
    {
        $this->product->slug = Str::slug($value);
    }
    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function (Builder $query) use ($value) {
            $query->where('category_id', $value);
        })->get();

        // $this->reset(['subcategory_id', 'brand_id']);
        $this->product->subcategory_id = "";
        $this->product->brand_id = "";
    }

    public function getSubcategoryProperty()
    {
        return Subcategory::find($this->product->subcategory_id);
    }
    public function update()
    {
        $rules = $this->rules;

        $rules['product.slug'] = ['required', 'unique:products,slug,' . $this->product->id];

        if ($this->product->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $rules['product.quantity'] = 'required|numeric';
            }
        }
        $this->validate($rules);

        $this->product->update();

        $this->emit('saved');

        //  redirect()->route('admin.products.edit', $this->product);
    }

    public function deleteImage(Image $image)
    {
        Storage::delete($image->url);
        $image->delete();

        $this->product = $this->product->fresh();
    }

    public function refreshProduct()
    {
        $this->product = $this->product->fresh();
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
