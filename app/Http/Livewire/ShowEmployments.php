<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employment;

class ShowEmployments extends Component
{    
    public function render()
    {         

      $applications = Employment::select('id','slug','names', 'status')->where('user_id', auth()->user()->id)->get();
 
        return view('livewire.show-employments', compact('applications'));
    } 
}
