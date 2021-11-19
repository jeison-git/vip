<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Claim;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        if (auth()->user()) { /* si el usuario no ha cancelado un pedido mostrar este mensaje  */

            $pendiente = Order::select('id')->where('status', 1)->where('user_id', auth()->user()->id)->count();

            if ($pendiente) {

                $mensaje = "Usted tiene $pendiente ordenes pendientes";

                session()->flash('flash.banner', $mensaje);
            }
        }

        $categories = Category::all(['id','name','slug', 'image', 'icon']);
        
        /* $claims = Claim::where('commerce_id', 1)->get(); */

        $banners = Banner::all(['id','image']);

       
            $homes = Product::select('id','name', 'slug', 'realprice', 'price')->where('status', 2) /* mostrar 2 productos aleatorios en el layout izquierdo */
            ->inRandomOrder()
            ->take(2)
            ->get();

            $twohomes = Product::select('id','name', 'slug', 'realprice', 'price')->where('status', 2) /* Mostrar productos donde el precio este entre 0 y 50, en el layout derecho  */
            ->whereBetween('price', [0, 100])
            ->inRandomOrder()
            ->take(8)
            ->get();


            $products =  Product::select('id','name', 'slug', 'realprice', 'price')->where('status', 2) /* mostrar los productos recien agregados */
            ->latest('id')
            ->take(20)
            ->get();
        
        return view('welcome', compact('categories', 'products', 'homes', 'twohomes', 'banners'));
    }
}
