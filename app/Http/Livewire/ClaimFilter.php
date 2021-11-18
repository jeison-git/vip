<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Claim;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ClaimFilter extends Component
{
    //Buscar o filtrar productos por Aliados Comerciales vip

    use WithPagination;
   
    public $claim;

    public $category_id = "", $subcategory_id = "", $brand_id = "";

    public $view = "grid";

    public function updatedCategoryId($value){

        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value){
            $query->where('category_id', $value);
        })->get();

        $this->reset(['category_id','subcategory_id', 'brand_id']);
    }

    public function render()
    {
        $categories    = Category::all();
        $subcategories = Subcategory::all();
        $brands        = Brand::all();

        $productsQuery = Product::query()->whereHas('claim', function (Builder $query){
            $query->where('id', $this->claim->id)            
                  ->where('status', 2);   ///revisar si da problemas aliados comerciales vip        
        });

        $products = $productsQuery
                    ->category($this->category_id)
                    ->subcategory($this->subcategory_id)
                    ->brand($this->brand_id)
                    ->latest('id')
                    ->get();      

        return view('livewire.claim-filter', compact('products','categories', 'subcategories', 'brands'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id', 'subcategory_id', 'brand_id']);
    }
}
