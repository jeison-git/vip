<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Search extends Component
{
    public $search;

    public $open = false;

    public function updatedSearch($value){
        if ($value) {
            $this->open = true;
        }else{
            $this->open = false;
        }
    }

    public function render()
    {
        //access all category
        $categories  = Category::all();

        if ($this->search) {
            $products = Product::where('name', 'LIKE' ,'%' . $this->search . '%')
                                ->where('status', 2)
                                ->take(5)
                                ->get();
        } else {
            $products = [];
        }

        return view('livewire.search', compact('products', 'categories'));
    }
}
