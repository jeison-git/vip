<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {   //función para configurar los roles solo podran los que tienen los siguientes permisos
        $this->middleware('can:Listar role')->only('index'); 
        $this->middleware('can:Crear role')->only('create-role', 'save');
        $this->middleware('can:Editar role')->only('create-role', 'update');
        $this->middleware('can:Eliminar role')->only('create-role','destroy');
    }
    
    public function index()
    {
        return view('admin.roles.index');
    }

}
