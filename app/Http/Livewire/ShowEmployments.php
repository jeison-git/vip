<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employment;

class ShowEmployments extends Component
{
    public $search;
    
    public function render()
    { 
        /* $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
        ->where('user_id', auth()->user()->id)
        ->latest('id')
        ->paginate(6); */
        
       /* $applications = Employment::select('id', 'user_id', 'names', 'email')
       ->where('user_id', auth()->user()->id ?? null)
       ->get(); */
       /* ->where('order_id', $this->order->id) */

      $applications = Employment::where('user_id', auth()->user()->id)->get();

       /* $applications = Employment::where('names', 'LIKE', '%' . $this->search . '%')
        ->where('user_id', auth()->user()->id)
        ->latest('id')
        ->get();
 */
        return view('livewire.show-employments', compact('applications'));
    } 
}
