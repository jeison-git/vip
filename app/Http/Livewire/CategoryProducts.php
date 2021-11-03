<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
   
    public $category;
    public $view = "grid";
    public $products = [];

    public function loadPosts(){
        $this->products = $this->category->products()->where('status', 2)->take(15)->get(); //{{--ojo cambie category por category por pruebas--}}

        $this->emit('glider', $this->category->id);
    }

   
    public function render()
    {
       
        return view('livewire.category-products');
    }
}
