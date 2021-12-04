<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        //Función para mostrar lista de los productos registrados
        $products = Product::where('name', 'like', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(10); 

        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
    } 
}
