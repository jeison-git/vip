<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{ // función para subir imagenes y añadirlos alos productos
    public function files(Product $product, Request $request){

        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        
        $url = Storage::put('products', $request->file('file'));

        $product->images()->create([
            'url' => $url
        ]);
    }

}
