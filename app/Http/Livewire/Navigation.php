<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class Navigation extends Component
{
    //Componente barra de navegacion
    public function render()
    {
       $categories = Category::all(['id','name','slug', 'image', 'icon']); 

        return view('livewire.navigation', compact('categories'));
    }
}
