<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MergeTheCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * Agregar items al componente dropdwon cart y recuperarlos al inicio de sesion
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Cart::merge(auth()->user()->id);
    }
}
