<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        //buscar todos los productos
        $name = $request->name;

        $products = Product::where('name', 'LIKE' ,'%' . $name . '%')/* componente de busqueda  */
                                ->where('status', 2)
                                ->paginate(6);

        return view('search', compact('products'));
    }
}
