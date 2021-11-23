<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Oldjob;
use App\Models\Experience;

use Illuminate\Http\Request;

class EmploymentExperience extends Component
{
    public $oldjob, $experience, $name, $contents;

    protected $rules = [
        'experience.name' => 'required',
        'experience.contents' => 'required',
        
    ];

    public function mount(Oldjob $oldjob){
        $this->oldjob = $oldjob;

        $this->experience = new Experience();
    }

    
    public function store(){

        $this->validate([
            'name' => 'required',
            'contents' => 'required',
        ]);             
       
        Experience::create([
            'name' => $this->name,
            'contents' => $this->contents,
            'oldjob_id' => $this->oldjob->id
        ]);

        $this->reset(['name', 'contents']);
        $this->oldjob = Oldjob::find($this->oldjob->id);        
    }

    public function edit(Experience $experience){

        $this->experience = $experience;
        
    }

    public function update(){
      
       $this->validate();

        $this->experience->save();
        $this->experience = new Experience();
        $this->oldjob = Oldjob::find($this->oldjob->id);

    }

    public function destroy(Experience $experience){
        $experience->delete();
        $this->oldjob = Oldjob::find($this->oldjob->id);
    }

    public function cancel(){
        $this->experience = new Experience();
    }

    public function render()
    {
        return view('livewire.employment-experience', ['oldjob' => $this->oldjob]);
    }
} 
