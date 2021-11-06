<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

use App\Models\Commerce;

class CreateCommerce extends Component
{
    //Crear, Editar, Actualizar y eliminar Comercios Aliado y comercio vip solamente

    use WithFileUploads; 

    public $commerces, $commerce, $rand;

    protected $listeners = ['delete'];

    public $createForm = [
        
        'name' => null,
        'slug' => null,
        'description' => null,
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'slug' => null,
        'description' => null,
        
    ];    

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.slug' => 'required|unique:commerces,slug',
        'createForm.description' => 'required',
    ];

    protected $validationAttributes = [
        'createForm.name'        => 'nombre',
        'createForm.slug'        => 'slug',
        'createForm.description' => 'description',
        'editForm.name'          => 'nombre',
        'editForm.slug'          => 'slug',
        'editForm.description'   => 'description',
    ];

    public function mount(){
        $this->getcommerces();
        $this->rand = rand();
    }

    public function updatedCreateFormName($value){
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatedEditFormName($value){
        $this->editForm['slug'] = Str::slug($value);
    }
    
    public function getcommerces(){
        $this->commerces = Commerce::all();
    }

    public function save(){

        $this->validate();
        //ojo revisar aqui posibles problemas al guardar
        Commerce::create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
            'description' => $this->createForm['description'],
        ]);

        $this->rand = rand();
        $this->reset('createForm');

        $this->getcommerces();
        $this->emit('saved');
    }

    public function edit(Commerce $commerce){

        $this->resetValidation();

        $this->commerce = $commerce;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $commerce->name;
        $this->editForm['slug'] = $commerce->slug;
        $this->editForm['description'] = $commerce->description;
    }

    public function update(){

        $rules = [
            'editForm.name' => 'required',
            'editForm.slug' => 'required|unique:commerces,slug,' . $this->commerce->id,
            'editForm.description' => 'required',
        ];

        $this->validate($rules);

        $this->commerce->update($this->editForm);

        $this->reset(['editForm']);

        $this->getcommerces();
    }

    public function delete(Commerce $commerce){
        $commerce->delete();
        $this->getcommerces();
    }

    public function render()
    {
        return view('livewire.admin.create-commerce');
    } 
}
