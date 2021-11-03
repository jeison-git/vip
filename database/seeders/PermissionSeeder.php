<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permisos para gestionar productos
        /* 1 */
        Permission::create([
            'name' => 'Crear productos',
        ]);
        /* 2 */
        Permission::create([
            'name' => 'Editar productos',
        ]);
        /* 3*/
        Permission::create([
            'name' => 'Eliminar productos',
        ]);
        //permisos para gestinar roles
        /* 4 */
        Permission::create([
            'name' => 'Crear role',
        ]);
        /* 5 */
        Permission::create([
            'name' => 'Listar role',
        ]);
        /* 6 */
        Permission::create([
            'name' => 'Editar role',
        ]);
        /* 7 */
        Permission::create([
            'name' => 'Eliminar role',
        ]);
        //permisos para gestionar usuarios
        /* 8 */
        Permission::create([
            'name' => 'Ver usuarios',
        ]);
        /* 9 */
        Permission::create([
            'name' => 'Editar usuarios',
        ]);
        /* 10 */
        Permission::create([
            'name' => 'Eliminar usuarios',
        ]);
        //permisos para gestionar los dos tipos de comercios
        /* 11 */
        Permission::create([
            'name' => 'Crear tipo comercio',
        ]);
        /* 12 */
        Permission::create([
            'name' => 'Editar tipo comercio',
        ]);
        /* 13 */
        Permission::create([
            'name' => 'Eliminar tipo comercio',
        ]);
        //permisos para gestionas los registros de comercios        
        /* 14 */
        Permission::create([
            'name' => 'Crear comercios',
        ]);
        /* 15 */
        Permission::create([
            'name' => 'Editar comercios',
        ]);
        /* 16 */
        Permission::create([
            'name' => 'Eliminar comercios',
        ]);
        //permisos para gestionas los registros de ordenes  
        /* 17 */
        Permission::create([
            'name' => 'Actualizar ordenes',
        ]);
        /* 18 */
        Permission::create([
            'name' => 'Anular ordenes',
        ]);
        //permisos para gestionas los registros de categorias
        /* 19 */
        Permission::create([
            'name' => 'Crear categoria',
        ]);
        /* 20 */
        Permission::create([
            'name' => 'Editar categorias',
        ]);
        /* 21 */
        Permission::create([
            'name' => 'Eliminar categoria',
        ]);
        //permisos para gestionas los registros de subcategorias
        /* 22 */
        Permission::create([
            'name' => 'Crear subcategoria',
        ]);
        /* 23 */
        Permission::create([
            'name' => 'Editar subcategoria',
        ]);
        /* 24 */
        Permission::create([
            'name' => 'Eliminar subcategoria',
        ]);
        //permisos para gestionas los registros de marcas
        /* 25 */
        Permission::create([
            'name' => 'Crear marcas',
        ]);
        /* 26 */
        Permission::create([
            'name' => 'Editar marcas',
        ]);
        /* 27 */
        Permission::create([
            'name' => 'Eliminar marcas',
        ]);
        //permisos para gestionas los registros de publicidad
        /* 28 */
        Permission::create([
            'name' => 'Crear publicidad',
        ]);
        /* 29 */
        Permission::create([
            'name' => 'Editar publicidad',
        ]);
        /* 30 */
        Permission::create([
            'name' => 'Eliminar publicidad',
        ]);
        //permisos para gestionas los registros de estados, municipios y parroquias
        /* 31 */
        Permission::create([
            'name' => 'Crear estado',
        ]);
        /* 32 */
        Permission::create([
            'name' => 'Editar estado',
        ]);
        /* 33 */
        Permission::create([
            'name' => 'Eliminar estado',
        ]);


        /* 34 */
        Permission::create([
            'name' => 'Ver dashboard',
        ]);
        /* 35 */
        Permission::create([
            'name' => 'Only admin',
        ]);
    }
}
