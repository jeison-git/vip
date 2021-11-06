<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommerceProducts extends Component
{
    //Mostrar productos del Comercio Vip Solo en un carousel Glider

    public $item;
    public $view = "grid";
    public $products = [];

    public function loadPosts(){
        $this->products = $this->item->products()->where('status', 2)->get(); 

        $this->emit('glidertwo', $this->item->id);
    }

    public function render()
    {
        return view('livewire.commerce-products');
    }
}
