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
    //Componente Productos Clientes Vip Vista Principar

    use WithPagination;

    public $category_id = "", $subcategory_id = "", $brand_id = "", $claim_id = "";
    //for price filter //no se esta usando
    public $min_price;
    public $max_price;

    public $view = "grid";

    public $productPerPage;

    public function mount()
    {
        $this->productPerPage = 12;//no se esta usando

        $this->min_price = 1;//no se esta usando
        $this->max_price = 1000;//no se esta usando
    }

    public function updatedCategoryId($value)//filtros 
    {

        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function (Builder $query) use ($value) {
            $query->where('category_id', $value);
        })->get();

        $this->reset(['subcategory_id', 'brand_id']);
    }

    public function render()
    {
        $categories    = Category::all(['id','name']);
        $subcategories = Subcategory::all(['id','name']); 
        $brands        = Brand::all(['id','name']);

        $products = Product::select('id','slug','name','price')->where('status', 2)
            ->category($this->category_id)
            ->subcategory($this->subcategory_id)
            ->brand($this->brand_id)
            ->latest('id')
            ->paginate(12);

        $offers = Product::select('id','slug','name','price')->where('status', 2) /*comienzo de la pagina Mostrar productos donde el precio este entre 0 y 50 */
            ->whereBetween('price', [0, 50])
            ->inRandomOrder()
            ->take(10)
            ->get();

        return view('livewire.vip-client', compact('products', 'categories', 'subcategories', 'brands', 'offers'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id', 'subcategory_id', 'brand_id']);
    }
}
