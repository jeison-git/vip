<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class DropdownOrder extends Component
{
    protected $listeners = ['render'];

    public function render()
    {

        return view('livewire.dropdown-order');

    }
}
