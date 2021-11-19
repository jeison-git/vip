<?php

namespace  App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateBanner extends Component
{
    //Crear, Editar, Actualizar y eliminar Publicidad

    use WithFileUploads; 

    public $banners, $banner, $rand;

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
        'createForm.title'   => 'required',
        'createForm.owner'   => 'required',
        'createForm.image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=640,max_height=480',                
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

    public function mount(){
        $this->getBanners();
        $this->rand = rand();
    }

    
    public function getBanners(){
        $this->banners = Banner::all();
    }

    public function save(){
        
        $this->validate();

        $image = $this->createForm['image']->store('banners');

        Banner::create([
            'title' => $this->createForm['title'],
            'owner' => $this->createForm['owner'],                        
            'finished_at' => $this->createForm['finished_at'],
            'image' => $image
            
        ]);

        $this->rand = rand();
        $this->reset('createForm');

        $this->getBanners();
        $this->emit('saved');
    }

    public function edit(Banner $banner){

        $this->reset(['editImage']);
        $this->resetValidation();

        $this->banner = $banner; 

        $this->editForm['open']   = true;
        $this->editForm['title']  = $banner->title;
        $this->editForm['owner']  = $banner->owner;                
        $this->editForm['finished_at']  = $banner->finished_at;        
        $this->editForm['image']  = $banner->image;
    }

    public function update(){

        $rules = [
            'editForm.title'  => 'required',
            'editForm.owner'  => 'required',                        
            'editForm.finished_at'  => 'nullable',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=640px,max_height=480px';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('banners');
        }

        $this->banner->update($this->editForm);

        $this->reset(['editForm', 'editImage']);

        $this->getBanners();
    }

    public function delete(Banner $banner){
        $banner->delete();
        $this->getBanners();
    }

    public function render()
    {
        return view('livewire.admin.create-banner');
    } 
}
