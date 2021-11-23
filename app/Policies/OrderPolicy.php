<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use App\Models\Employment;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     * 
     * Politicas para restringir los pagos 
     *
     * @return void
     */
    
    public function author(User $user, Order $order){
        if ($order->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }

    ///si el estatus es 1; puede canselar de lo contrario no error 403
    public function payment(User $user, Order $order){
        if ($order->status == 1) {
            return true;
        }else{
            return false; 
        }
    } 
    
    
    ///////Solicitud de empleo 
    public function dicatated(User $user, Employment $application){
        if($application->user_id == $user->id){
            return true;
        }else{
            return false;
        }
    }
    public function published(User $user, Employment $application){
        if($application->status == 3){
            return true;
        }else{
            return false;
        }
    } 

    public function revision(User $user,  Employment $application){
        if($application->status ==2){
            return true;
        }else{
            return false;
        }
    }
    

}
