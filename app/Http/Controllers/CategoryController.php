<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{  ////Función para mostrar todas categorias
   public function show(Category $category){
    return view('categories.show', compact('category'));
   }
}
