<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MergeTheCartLogout
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
     * Guardar los items del usuario en el dropdown cart una ves cerrado sesion refrescar 
     * 
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //eliminar registro
        Cart::erase(auth()->user()->id);

        //nuevo registro
        Cart::store(auth()->user()->id);
        
    } 
}
