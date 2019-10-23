<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //HOSTS
        Permission::create([
          'name'  => 'Ver computadoras',
          'slug'  => 'hosts.index',
          'description'  => 'Listado de computadoras',
        ]);

        Permission::create([
          'name'  => 'Detalle computadoras',
          'slug'  => 'hosts.show',
          'description'  => 'Detalle de computadora',
        ]);

        Permission::create([
          'name'  => 'Editar computadoras',
          'slug'  => 'hosts.edit',
          'description'  => 'Editar de computadoras',
        ]);

        Permission::create([
          'name'  => 'Crear computadoras',
          'slug'  => 'hosts.create',
          'description'  => 'Crear de computadoras',
        ]);

        //ROLES
        Permission::create([
          'name'  => 'Ver roles',
          'slug'  => 'roles.index',
          'description'  => 'Listado de Roles',
        ]);

        Permission::create([
          'name'  => 'Detalle Roles',
          'slug'  => 'roles.show',
          'description'  => 'Detalle de Roles',
        ]);

        Permission::create([
          'name'  => 'Editar Roles',
          'slug'  => 'roles.edit',
          'description'  => 'Editar de Roles',
        ]);

        Permission::create([
          'name'  => 'Crear Roles',
          'slug'  => 'roles.create',
          'description'  => 'Crear de Roles',
        ]);
    }
}
