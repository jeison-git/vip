<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class VipClient extends Component
{
    use WithPagination;
    
    public $category_id = "", $subcategory_id = "", $brand_id = "", $claim_id = "";
    //for price filter
    public $min_price;
    public $max_price;

    public $view = "grid";

    public $productPerPage;    

    public function mount()
    {
        $this->productPerPage = 12;

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function updatedCategoryId($value){

        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value){
            $query->where('category_id', $value);
        })->get();

        $this->reset(['subcategory_id', 'brand_id']);
    }

    public function render()
    {
        $categories    = Category::all();
        $subcategories = Subcategory::all();
        $brands        = Brand::all();

        $products = Product::where('status', 2)
            ->category($this->category_id)
            ->subcategory($this->subcategory_id)
            ->brand($this->brand_id)
            ->latest('id')
            ->paginate(12);

        return view('livewire.vip-client', compact('products', 'categories', 'subcategories', 'brands'));
    }

    
    public function resetFilters()
    {
        $this->reset(['category_id', 'subcategory_id', 'brand_id']);
    }
}
