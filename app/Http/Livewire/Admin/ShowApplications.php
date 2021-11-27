<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Employment;

use Livewire\WithPagination;

class ShowApplications extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //Función para mostrar lista de olicitudes de empleos
        $applications = Employment::select('id','slug', 'names', 'email', 'status')->where('status', '>', 1)
            ->where(function($query){
            $query->where('names', 'LIKE', '%' . $this->search . '%');
            $query->orWhere('email', 'LIKE', '%' . $this->search . '%');
        })
        ->latest('id')
        ->paginate(12);

        return view('livewire.admin.show-applications', compact('applications'))->layout('layouts.admin');
    }
}
