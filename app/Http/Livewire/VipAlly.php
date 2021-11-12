<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Claim;

class VipAlly extends Component
{


    public function render()
    {
        $claims = Claim::where('commerce_id', 1)->take(10)->get();
        
        return view('livewire.vip-ally', compact('claims'));
    }
}   
