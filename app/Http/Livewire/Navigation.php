<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{
    //Componente barra de navegacion
    public function render()
    {
        $categories = Category::all();
        return view('livewire.navigation', compact('categories'));
    }
}
