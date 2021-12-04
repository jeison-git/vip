<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Plan;

class CreateSubscription extends Component
{
    //Crear, Editar, Actualizar y eliminar subscriptions

    public $users = [], $plans = [];

    public $user_id = "", $plan_id = "";

    public $active_until;

    public $viralSongs = '';

    protected $rules = [
        'user_id'       => 'required',
        'plan_id'       => 'required',
        'active_until'  => 'required',
        
    ]; 

    //Susuarios
    public function getUserProperty(){
        return User::find($this->user_id);
    }

    public function getPlanProperty(){
        return Plan::find($this->plan_id);
    }

    public function mount(){

        $this->users = User::all();
        $this->plans = Plan::all();

    }

     //guardar 
     public function save(){        

        $rules = $this->rules;

        $this->validate($rules);

        $subscription = new Subscription();

        $subscription->user_id = $this->user_id;
        $subscription->plan_id = $this->plan_id;
        /* $subscription->active_until    = $this->active_until; */

        $subscription->save();
        
        session()->flash('flash.banner', '¡Gracias usted a añadido un suscripción!');
        return redirect()->route('admin.subscriptions.edit', $subscription);
    }

    public function render()
    {
        return view('livewire.admin.create-subscription')->layout('layouts.admin');
    } 
}
