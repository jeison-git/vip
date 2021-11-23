<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class StatusProduct extends Component
{
    //Función para actualizar el estado del producto, BORRARDO O PUBLICADO

    public $product, $status;

    public function mount(){
        $this->status = $this->product->status;
    }

    public function save(){
        $this->product->status = $this->status;
        $this->product->save();

        $this->emit('saved'); 
    }

    public function render()
    {
        return view('livewire.admin.status-product');
    }
}

