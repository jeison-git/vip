<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Unsubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

   /*  public function handle(Request $request, Closure $next)
    {
        if (optional($request->user())->hasActiveSubscription()) {
            return redirect()->route('megatiendavirtual');
        }

        return $next($request);
    }  */

    public function handle(Request $request, Closure $next)
    {
        if ((optional($request->user())->hasActiveSubscription() ) ||  $request->user()->subscription) {

            return $next($request);
           
        } 


        return redirect()->route('megatiendavirtual')->withErrors(['unsubscribed' => 'Si Deseas Disfrutar Los Beneficios De Ser Cliente Vip, Afíliate :)']);

        
    } 
}
