<?php

namespace App\Http\Livewire\Admin;

use App\Models\Subscription;
use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

use Livewire\WithPagination;

class UserComponent extends Component
{    
    use WithPagination;

    public $search; 

    //Función ver los usuarios registrados 
    public function updatingSearch(){
        $this->resetPage();
    }


    public function render()
    {
        $users = User::where('email', '<>', auth()->user()->email)
                    ->where(function($query){
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                        $query->orWhere('email', 'LIKE', '%' . $this->search . '%');
                    })
                    ->with('subscription', 'roles')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.user-component', compact('users'))->layout('layouts.admin');
    }

   
}
