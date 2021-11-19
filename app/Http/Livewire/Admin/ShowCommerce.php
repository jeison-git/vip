<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Commerce;
use App\Models\Claim;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ShowCommerce extends Component
{

    //Funciones para registrar o Añadir, editar y eliminar comercios 

    use WithFileUploads; 

    public $commerce, $claims, $claim, $rand;

    protected $listeners = ['delete'];

    protected $rules = [
        'createForm.name'     => 'required',
        'createForm.slug'     => 'required|unique:claims,slug',
        'createForm.icon'     => 'required',
        'createForm.image'    => 'required|image|max:1024',
        'createForm.manager'  => 'required',
        'createForm.document' => 'required', 
        'createForm.number_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
        'createForm.email'        => 'required|email',
        'createForm.target'       => 'required',
        'createForm.url'          => 'nullable|url',
        'createForm.description'  => 'required',
        'createForm.address'      => 'required',
        'createForm.observation'  => 'required',
    ];

    protected $validationAttributes = [
        'createForm.name'     => 'nombre',
        'createForm.slug'     => 'slug',
        'createForm.icon'     => 'ícono',
        'createForm.image'    => 'imagen',
        'createForm.manager'  => 'gerente',
        'createForm.document' => 'documento_de_identidad',
        'createForm.number_phone' => 'numero_de_telefono',
        'createForm.email'        => 'correo',
        'createForm.target'       => 'a_quien_te_diriges',
        'createForm.url'          => 'link',
        'createForm.description'  => 'descripcion',
        'createForm.address'      => 'direccion',
        'createForm.observation'  => 'observaciones',
        'editForm.name' => 'nombre',
        'editForm.slug' => 'slug',
        'editForm.icon' => 'ícono',
        'editImage'     => 'imagen',
        'editForm.manager'  => 'gerente',
        'editForm.document' => 'documento_de_identidad',
        'editForm.number_phone' => 'numero_de_telefono',
        'editForm.email'        => 'correo',
        'editForm.target'       => 'a_quien_te_diriges',
        'editForm.url'          => 'link',
        'editForm.description'  => 'descripcion',
        'editForm.address'      => 'direccion',
        'editForm.observation'  => 'observaciones',
    ];

    public $createForm = [
        'name'         => null,
        'slug'         => null,
        'icon'         => null,
        'image'        => null,
        'manager'      => null,
        'document'     => null,
        'number_phone' => null,
        'email'        => null,
        'target'       => null,
        'url'          => null,
        'description'  => null,
        'address'      => null,
        'observation'  => null,
    ];

    public $editForm = [
        'open'         => false,
        'name'         => null,
        'slug'         => null,
        'icon'         => null,
        'image'        => null,
        'manager'      => null,
        'document'     => null,
        'number_phone' => null,
        'email'        => null,
        'target'       => null,
        'url'          => null,
        'description'  => null,
        'address'      => null,
        'observation'  => null,
    ];

    public $editImage;

    public function mount(Commerce $commerce)
    {
        $this->commerce = $commerce;
        $this->getClaims();
        $this->rand = rand();
    }


    public function updatedCreateFormName($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatedEditFormName($value)
    {
        $this->editForm['slug'] = Str::slug($value);
    }

    public function getClaims()
    {
        $this->claims = Claim::where('commerce_id', $this->commerce->id)->get();
    }

    public function save()
    {

        $this->validate();

        //$image = 

        $image = $this->createForm['image']->store('allies'); //ojo carpeta storage/app/public/allies

        $this->commerce->claims()->create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
            'icon' => $this->createForm['icon'],
            'manager'      => $this->createForm['manager'],
            'document'     => $this->createForm['document'],
            'number_phone' => $this->createForm['number_phone'],
            'email'  => $this->createForm['email'],
            'target' => $this->createForm['target'],
            'url'    => $this->createForm['url'],
            'description' => $this->createForm['description'],
            'address'     => $this->createForm['address'],
            'observation' => $this->createForm['observation'],
            'image'       => $image,
        ]);

        $this->rand = rand();

        //$this->commerce->claims()->create($this->createForm);

        $this->reset('createForm');
        $this->getClaims();
    }

    public function edit(Claim $claim)
    {

        $this->resetValidation();

        $this->claim = $claim;

        $this->editForm['open']     = true;

        $this->editForm['name']     = $claim->name;
        $this->editForm['slug']     = $claim->slug;
        $this->editForm['image']    = $claim->image;
        $this->editForm['icon']     = $claim->icon;
        $this->editForm['manager']  = $claim->manager;
        $this->editForm['document'] = $claim->document;
        $this->editForm['number_phone'] = $claim->number_phone;
        $this->editForm['email']        = $claim->email;
        $this->editForm['target']       = $claim->target;
        $this->editForm['url']          = $claim->url;
        $this->editForm['description']  = $claim->description;
        $this->editForm['address']      = $claim->address;
        $this->editForm['observation']  = $claim->observation;
    }

    public function update()
    {
        $rules = [
            'editForm.name' => 'required',
            'editForm.slug' => 'required|unique:claims,slug,' . $this->claim->id,
            'editForm.icon'     => 'required',
            'editForm.manager'  => 'required',
            'editForm.document' => 'required',
            'editForm.number_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'editForm.email'        => 'required|email',
            'editForm.target'       => 'required',
            'editForm.url'          => 'nullable|url',
            'editForm.description'  => 'required',
            'editForm.address'      => 'required',
            'editForm.observation'  => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('allies');
        }

        $this->claim->update($this->editForm);
        
        $this->getClaims();
        $this->reset('editForm', 'editImage');
        
    }

    public function delete(Claim $claim)
    {
        $claim->delete();
        $this->getClaims();
    }

    public function render()
    {
        return view('livewire.admin.show-commerce')->layout('layouts.admin');
    }
}
