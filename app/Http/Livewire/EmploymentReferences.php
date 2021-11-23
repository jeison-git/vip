<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employment;
use App\Models\Reference;

class EmploymentReferences extends Component
{
    public $employment, $application, $reference, $name;

    protected $rules = [
        'reference.name' => 'required'
    ];

    public function mount(Employment $application){
        $this->employment = $application;
        $this->reference = new Reference();
    }


    public function store(){

        $this->validate([
            'name' => 'required'
        ]);

        $this->employment->references()->create([
            'name' => $this->name
        ]);

        $this->reset('name');
        $this->employment = Employment::find($this->employment->id);
    }

    public function edit(Reference $reference){
        $this->reference = $reference;
    }

    public function update(){
        $this->validate();        
        $this->reference->save();
        $this->reference = new Reference();

        $this->employment = Employment::find($this->employment->id);
    }

    public function destroy(Reference $reference){
        $reference->delete();

        $this->employment = Employment::find($this->employment->id);
    }

    public function render()
    {
        return view('livewire.employment-references');
    }
}
