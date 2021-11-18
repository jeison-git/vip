<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\StaticAdvertising;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class StaticBanner extends Component
{
    //Crear, Editar, Actualizar y eliminar Publicidad que se visualiza en aliados comerciales vip

    use WithFileUploads;

    public $statics, $static, $rand;

    protected $listeners = ['delete'];

    public $createForm = [

        'title'  => null,
        'owner'  => null,
        'image'  => null,
    ];

    public $editForm = [
        'open'   => false,
        'title'  => null,
        'owner'  => null,
        'image'  => null,
    ];

    public $editImage;

    protected $rules = [
        'createForm.title'   => 'nullable',
        'createForm.owner'   => 'nullable',
        'createForm.image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $validationAttributes = [
        'createForm.title'   => 'nombre',
        'createForm.owner'   => 'dueño',
        'createForm.image'   => 'imagen',
        'editForm.title'     => 'nombre',
        'editForm.owner'     => 'dueño',
        'editImage'          => 'imagen',
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
        $this->editForm['image']  = $static->image;
    }

    public function update()
    {

        $rules = [
            'editForm.title'  => 'required',
            'editForm.owner'  => 'required',
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
        $advertisings = StaticAdvertising::inRandomOrder()
            ->limit(10)
            ->get();

        $products = Product::where('status', 2) /* Mostrar productos donde el precio este entre 0 y 50, en el layout derecho  */
            ->whereBetween('price', [0, 50])
            ->inRandomOrder()
            ->take(2)
            ->get();

        return view('livewire.static-banner', compact('advertisings', 'products'));
    } 
}
