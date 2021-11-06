<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Color;
use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItemColor extends Component
{
    //Actualizar detalles de los items añadidos al Shopping Cart

    public $rowId, $qty, $quantity;

    public function mount(){
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $color = Color::where('name', $item->options->color)->first();

        $this->quantity = qty_available($item->id, $color->id);
    }

    public function decrement(){
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function increment(){
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item-color');
    }
}
