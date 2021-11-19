<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\StaticAdvertising;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class CreateStaticbanner extends Component
{
    //Crear, Editar, Actualizar y eliminar Publicidad que se visualiza en aliados comerciales vip

    use WithFileUploads;

    public $statics, $static, $rand;

    protected $listeners = ['delete'];

    public $createForm = [

        'title'  => null,
        'owner'  => null,
        'image'  => null,        
        'finished_at'  => null,
    ];

    public $editForm = [
        'open'   => false,
        'title'  => null,
        'owner'  => null,
        'image'  => null,        
        'finished_at'  => null,
    ];

    public $editImage;

    protected $rules = [
        'createForm.title'   => 'nullable',
        'createForm.owner'   => 'nullable',
        'createForm.image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',        
        'createForm.finished_at' => 'nullable'
    ];

    protected $validationAttributes = [
        'createForm.title'   => 'nombre',
        'createForm.owner'   => 'dueño',
        'createForm.image'   => 'imagen',                
        'createForm.finished_at' =>"'Fecha de vencimiento'",
        'editForm.title'     => 'nombre',
        'editForm.owner'     => 'dueño',
        'editImage'          => 'imagen',        
        'editForm.finished_at' =>"'Fecha de vencimiento'",
    ];

    public function mount()
    {
        $this->getStaticAdvertisings();
        $this->rand = rand();
    }


    public function getStaticAdvertisings()
    {
        $this->statics = StaticAdvertising::all();
    }

    public function save()
    {

        $this->validate();

        $image = $this->createForm['image']->store('statics');

        StaticAdvertising::create([
            'title' => $this->createForm['title'],
            'owner' => $this->createForm['owner'],            
            'finished_at' => $this->createForm['finished_at'],
            'image' => $image
        ]);

        $this->rand = rand();
        $this->reset('createForm');

        $this->getStaticAdvertisings();
        $this->emit('saved');
    }

    public function edit(StaticAdvertising $static)
    {

        $this->reset(['editImage']);
        $this->resetValidation();

        $this->static = $static;

        $this->editForm['open']   = true;
        $this->editForm['title']  = $static->title;
        $this->editForm['owner']  = $static->owner;        
        $this->editForm['finished_at']  = $static->finished_at;
        $this->editForm['image']  = $static->image;
    }

    public function update()
    {

        $rules = [
            'editForm.title'  => 'required',
            'editForm.owner'  => 'required',            
            'editForm.finished_at'  => 'nullable',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('statics');
        }

        $this->static->update($this->editForm);

        $this->reset(['editForm', 'editImage']);

        $this->getStaticAdvertisings();
    }

    public function delete(StaticAdvertising $static)
    {
        $static->delete();
        $this->getStaticAdvertisings();
    }
    
    public function render()
    {
        return view('livewire.admin.create-staticbanner');
    }
}
