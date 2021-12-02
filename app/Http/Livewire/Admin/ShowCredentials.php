<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Credentialcard;

class ShowCredentials extends Component
{ 
    public $credential, $credentials;

    //validar 
    protected $rules = [
        'credential.name'            => 'required',
        'credential.user_id'         => 'required',        
        'credential.subscription_id' => 'required',
        'credential.plan_id '        => 'required',
        'credential.cvv '            => 'required',
        'credential.created_at'      => 'required',
    ];

    //limpiar el formulario 
    protected $listeners = ['refreshCredential', 'delete'];

    public function mount(Credentialcard $credential){

        $this->credential = $credential;
    }

    //funcion limpiar filtro
    public function refreshCredential(){
        $this->credential = $this->credential->fresh();
    }    

    //guardar los datos del mensaje
    public function save(){
        $rules = $this->rules;        

        $this->validate($rules);

        $this->credential->save();

        $this->emit('saved');

    }    

    //eliminar mensaje
    public function delete(){        

        $this->credential->delete();

        return redirect()->route('admin.credentials.index');

    }
    public function render()
    {
        return view('livewire.admin.show-credentials')->layout('layouts.admin');
    }
}
