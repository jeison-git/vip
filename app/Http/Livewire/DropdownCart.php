<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownCart extends Component
{
    //Componente Dropdown Cart icono del nav 

    protected $listeners = ['render'];
    
    public function render()
    {
        return view('livewire.dropdown-cart');
    }
} 
 