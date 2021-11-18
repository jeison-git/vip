<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    //Filtrar Productos por Categoria
    
    use WithPagination;

    public $category;
    public $subcategoria;
    public $marca;

    public $view = "grid";

    public function limpiar(){
        $this->reset(['subcategoria', 'marca']);
    }

    public function render()
    {   //cambios a ver si solo se muestran el status 2
        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id)
                    ->where('status', 2);
        } );   
        
        if ($this->subcategoria) {
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('name', $this->subcategoria);
            } );  
        }

        if ($this->marca) {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            } );  
        } 

        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }
}
