<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Claim;
use App\Models\Product; 

class VipCommerce extends Component
{
    //Componente Productos Comercios Vip Vista Principar Solo Glider

    public $view = "grid";

    public function render()
    {
        $claims = Claim::where('commerce_id', 2)->get();

        $products = Product::where('status', 2)
            ->latest('id')
            ->paginate(12);

        return view('livewire.vip-commerce', compact('claims', 'products'));
    }
}
