<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusApplication extends Component
{
    //Función para actualizar el estado del la solicitud de empleo, BORRARDO O revision

    public $application, $status;

    public function mount(){
        $this->status = $this->application->status;
    }

    public function save(){
        $this->application->status = $this->status;
        $this->application->save();

        $this->emit('saved');  

        return redirect()->route('job-application');
        
    }

    public function render()
    {
        return view('livewire.status-application');
    }
}
 