<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class DropdownOrder extends Component
{
    protected $listeners = ['render'];
    
    public function render()
    {
        
            $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();

            

        return view('livewire.dropdown-order', compact('pendiente'));
    } 
} 
