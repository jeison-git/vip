<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Credentialcard;

use Livewire\WithPagination;

class IndexCredentials extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        
         //Función para mostrar lista de credenciales activas
         $credentials = Credentialcard::select('id','status','name','cvv','user_id')->where('status', '>', 0)
         ->where(function($query){
             $query->where('name', 'LIKE', '%' . $this->search . '%');
             $query->orWhere('user_id', 'LIKE', '%' . $this->search . '%');
         })
         ->latest('id')                   
         ->paginate(10);
 
        return view('livewire.admin.index-credentials', compact('credentials'))->layout('layouts.admin');
    } 
} 
