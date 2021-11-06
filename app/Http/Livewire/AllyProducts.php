<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AllyProducts extends Component
{
    //Mostrar productos del Aliado Comercial Vip

    public $claim;
    public $view = "grid";
    public $products = [];

    public function loadPosts(){
        $this->products = $this->claim->products()->where('status', 2)->take(12)->get(); 

        $this->emit('glider', $this->claim->id);
    }

    public function render()
    {
        return view('livewire.ally-products');
    }
}
