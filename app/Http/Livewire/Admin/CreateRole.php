<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRole extends Component
{  //Función para agregar roles, actualizar y eliminar, asociar permisos a un rol  
    public $roles, $role, $permissions, $rand;

    protected $listeners = ['delete'];

    public $createForm = [
        
        'name'        => null,
        'permissions' => [],
    ];

    public $editForm = [
        'open'   => false,
        'name'   => null,
        'permissions' => [],
    ];

    public $editImage;

    protected $rules = [
        'createForm.name'        => 'required',
        'createForm.permissions' => 'required',
    ];

    protected $validationAttributes = [
        'createForm.name'        => 'nombre',
        'createForm.permissions' => 'permisos',
        'editForm.name'          => 'nombre',
        'editForm.permissions'   => 'permisos'
    ];

    public function mount(){
        $this->getPermissions();
        $this->getRoles();
        $this->rand = rand();
    }

    public function getPermissions(){
        $this->permissions = Permission::all();
    }

    public function getRoles(){
        $this->roles = Role::all();
    }

    public function save(){
        $this->validate();

        $role = Role::create([
            'name' => $this->createForm['name'],
        ]);

        $role->permissions()->attach($this->createForm['permissions']);

        $this->rand = rand();
        $this->reset('createForm');

        $this->getRoles();
        $this->emit('saved');
    }

    public function edit(Role $role){

        $this->resetValidation();

        $this->role = $role;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $role->name;
        $this->editForm['permissions'] = $role->permissions()->pluck('id');
    }

    public function update(){

        $rules = [
            'editForm.name' => 'required',
            'editForm.permissions' => 'required',
        ];

        $this->validate($rules);

        $this->role->update($this->editForm);

        $this->role->permissions()->sync($this->editForm['permissions']);

        $this->reset(['editForm']);

        $this->getRoles();
    }

    public function delete(Role $role){
        $role->delete();
        $this->getRoles();
    }

    public function render() 
    {
        return view('livewire.admin.create-role');
    }
} 

