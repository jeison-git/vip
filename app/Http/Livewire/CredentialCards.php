<?php

namespace App\Http\Livewire;

use App\Models\Credentialcard;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Livewire\Component;

class CredentialCards extends Component
{
    public $user_id, $subscription_id, $plan_id;
    public $name, $cvv, $status;
    public $credentials, $credential;

    public $hideForm;

    public function mount()
    {
        $this->subscriptions = Subscription::all();
        $this->plans     = Plan::all();
        $this->users     = User::all();
    }
   /*  public function save()
    {

        $credential = new Credentialcard();

        $credential->name            = auth()->user()->name;
        $credential->user_id         = auth()->user()->id;
        $credential->subscription_id = auth()->user()->subscription->id;
        $credential->plan_id         = auth()->user()->subscription->plan_id;
        $credential->cvv             = auth()->user()->id . auth()->user()->subscription->id;

        
        $credential->status = 1;
        $credential->save();

        session()->flash('flash.banner', '¡Gracias usted a activado su credencial!');
        return redirect()->route('vip-client');
    } */

    public function save()
    {
        $credential = Credentialcard::where('user_id', auth()->user()->id)->first();
        if (!empty($credential)) {
            $credential->name            = auth()->user()->name;
            $credential->user_id         = auth()->user()->id;
            $credential->subscription_id = auth()->user()->subscription->id;
            $credential->plan_id         = auth()->user()->subscription->plan_id;
            $credential->cvv             = auth()->user()->id . auth()->user()->subscription->id;
            $credential->status = 1;
            try {
                $credential->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $credential = new Credentialcard();
            $credential->name            = auth()->user()->name;
            $credential->user_id         = auth()->user()->id;
            $credential->subscription_id = auth()->user()->subscription->id;
            $credential->plan_id         = auth()->user()->subscription->plan_id;
            $credential->cvv             = auth()->user()->id . auth()->user()->subscription->id;
            $credential->status = 1;
            try {
                $credential->save();
                session()->flash('flash.banner', '¡Gracias usted a activado su credencial!');
                return redirect()->route('vip-client');/* redirect(route()) */
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }


    public function render()
    {
        return view('livewire.credential-cards');
    }
}
