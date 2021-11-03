<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show(Product $product)
    {

        $similares = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 2)
            ->inRandomOrder()
            ->take(4)
            ->get();


        return view('products.show', compact('product', 'similares'));
    }
}
