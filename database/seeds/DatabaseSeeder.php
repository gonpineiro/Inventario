<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      //$this->call(StartSRV::class);
      //$this->call(PermissionsTableSeeder::class);


      DB::table('host_types')->insert(['name' => 'Panel de alarma','id' => 40]);
      DB::table('host_types')->insert(['name' => 'Expansora','id' => 41]);
      DB::table('host_types')->insert(['name' => 'Comunicador','id' => 42]);
      DB::table('host_types')->insert(['name' => 'Sensor','id' => 43]);
      DB::table('host_types')->insert(['name' => 'Teclado (SDI)','id' => 44]);
      DB::table('host_types')->insert(['name' => 'Sirena','id' => 45]);

      //LICENCIAS
      // 
      // DB::table('permissions')->insert(['name'  => 'Ver licencias','slug'  => 'licensekey.show','description'  => 'Tabla de Licencias']);
      // DB::table('permissions')->insert(['name'  => 'Detalle de Licencia','slug'  => 'licensekey.only','description'  => 'Detalle de Licencia']);
      // DB::table('permissions')->insert(['name'  => 'Editar de Licencia','slug'  => 'licensekey.edit','description'  => 'Editar de Licencia']);
      // DB::table('permissions')->insert(['name'  => 'Crear de Licencias','slug'  => 'licensekey.create','description'  => 'Crear de Licencias']);
      //
      // DB::table('permission_role')->insert(['permission_id'  => 142, 'role_id'  => 2]);
      // DB::table('permission_role')->insert(['permission_id'  => 143, 'role_id'  => 2]);
      // DB::table('permission_role')->insert(['permission_id'  => 144, 'role_id'  => 2]);
      // DB::table('permission_role')->insert(['permission_id'  => 145, 'role_id'  => 2]);

    }
}
