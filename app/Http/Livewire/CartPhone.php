<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartPhone extends Component
{
    //Componente dropdown cart responsive
    protected $listeners = ['render'];
    
    public function render()
    {
        return view('livewire.cart-phone');
    }
}
