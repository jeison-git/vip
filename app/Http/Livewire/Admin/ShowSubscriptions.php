<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subscription;

use Livewire\WithPagination;

class ShowSubscriptions extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        //Función para mostrar lista de subscripciones activas
        $subscriptions = Subscription::select('id', 'active_until', 'plan_id', 'user_id')->where(function ($query) {
            $query->where('id', 'LIKE', '%' . $this->search . '%');
            $query->orWhere('user_id', 'LIKE', '%' . $this->search . '%');
        })
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.show-subscriptions', compact('subscriptions'))->layout('layouts.admin');
    }
}
