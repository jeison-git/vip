<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Plan;

class EditSubscription extends Component
{
    public $subscription, $users, $plans, $active_until;

    public $user_id, $plan_id;

    public $viralSongs = '';

    protected $rules = [
        'subscription.user_id' => 'required',
        'subscription.plan_id' => 'required',
        'subscription.active_until'  => 'required',
    ];

    protected $listeners = ['refreshSubscription', 'delete'];

    public function mount(Subscription $subscription){//gancho de ciclo de vida
        $this->subscription = $subscription;

        $this->users = User::all();

        $this->user_id = $subscription->user->id;

        $this->plans = Plan::all();

        $this->plan_id = $subscription->plan->id;

        $this->active_until = $this->subscription->active_until; 
    }

    public function refreshSubscription(){
        $this->subscription = $this->subscription->fresh();
    }

    //Susuarios
    public function getUserProperty(){
        return User::find($this->user_id);
    }

    public function getPlanProperty(){
        return Plan::find($this->plan_id);
    }

    public function save(){
        $rules = $this->rules;

        $this->validate($rules); 

        $this->subscription->save();

        $this->emit('saved');
    }

    public function delete(){
        
        $this->subscription->delete();

        return redirect()->route('admin.subscriptions.index');

    }

    public function render()
    {
        return view('livewire.admin.edit-subscription')->layout('layouts.admin');
    } 
}
