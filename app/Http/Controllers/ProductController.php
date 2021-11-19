<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    //muestra los detalles del producto
    public function show(Product $product)
    {
        //muestra productos similares
        $similares = Product::select('id', 'slug', 'name', 'price')->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 2)
            ->inRandomOrder()
            ->take(4)
            ->get(); 


        return view('products.show', compact('product', 'similares'));
    }
}
