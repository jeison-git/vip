<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Commerce;

class CategoryProducts extends Component
{
   // public $commerce_id = 1;

    public $category;
    public $products = [];

    public function loadPosts(){
        $this->products = $this->category->products;
        
        $this->emit('glider', $this->category->id);
    }

   
    public function render()
    {
       /* $categories   = Category::all();
        $commerces    = Commerce::all();

        $products = Product::where('status', 2)
                        ->with( 'category', 'commerce')
                        ->commerce($this->commerce_id)
                        ->latest('id')
                        ->get();*/

        return view('livewire.category-products');
    }
}
