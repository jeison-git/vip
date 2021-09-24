<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Commerce;
use App\Models\Product;

class WelcomeController extends Controller
{
    

    public function __invoke()
    {
        $categories   = Category::all();
        $commerces    = Commerce::all();

        /*$products = Product::where('status', 2)
                        ->with( 'category', 'commerce')
                        ->commerce($this->commerce_id)
                        ->latest('id')
                        ->get();*/

        return view('welcome', compact('categories', 'commerces'));
    }
}
