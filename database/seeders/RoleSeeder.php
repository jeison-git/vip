<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'Admin']);
        $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35]);

        $role = Role::create(['name' => 'ATC']);
        $role->syncPermissions([
            'Crear productos',
            'Editar productos',
            'Eliminar productos',
            'Ver usuarios',
            'Crear tipo comercio',
            'Editar tipo comercio',
            'Eliminar tipo comercio',
            'Crear comercios',
            'Editar comercios',
            'Eliminar comercios',
            'Actualizar ordenes',
            'Anular ordenes',
            'Crear categoria',
            'Editar categorias',
            'Eliminar categoria',
            'Crear subcategoria',
            'Editar subcategoria',
            'Eliminar subcategoria',
            'Crear marcas',
            'Editar marcas',
            'Eliminar marcas',
            'Crear publicidad',
            'Editar publicidad',
            'Eliminar publicidad',
            'Crear estado',
            'Editar estado',
            'Eliminar estado',
            'Ver dashboard'
        ]);
    }
}
