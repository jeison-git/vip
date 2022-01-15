<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employment;
use App\Models\Oldjob;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EmploymentCurriculum extends Component
{
    use AuthorizesRequests;
    public $employment, $application, $oldjob, $name;

    protected $rules =[
        'oldjob.name' => 'required'
    ];
    
    public function mount(Employment $application){
        $this->employment = $application;        
        $this->oldjob = new Oldjob();

        /* $this->authorize('dicatated', $this->application); */

    }


    public function store(){

        $this->validate([
            'name' => 'required'
        ]);

        Oldjob::create([
            'name' => $this->name,
            'employment_id' => $this->employment->id
        ]);

        $this->reset('name');
        $this->employment = Employment::find($this->employment->id);

    }

    public function edit(Oldjob $oldjob){
        $this->oldjob = $oldjob;
    }

    public function update(){

        $this->validate();

        $this->oldjob->save();
        $this->oldjob = new Oldjob();

        $this->employment = Employment::find($this->employment->id); 
    }

    public function destroy(Oldjob $oldjob){
        $oldjob->delete();
        $this->employment = Employment::find($this->employment->id);
    }

    public function render()
    {
        return view('livewire.employment-curriculum',  ['employment' => $this->employment]);
    }
}
 