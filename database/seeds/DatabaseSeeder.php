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


      //DB::table('host_types')->insert(['name' => 'Tracker','id' => 47]);

      // DB::table('host_types')->insert(['name' => 'Panel de alarma','id' => 40]);
      // DB::table('host_types')->insert(['name' => 'Expansora','id' => 41]);
      // DB::table('host_types')->insert(['name' => 'Comunicador','id' => 42]);
      // DB::table('host_types')->insert(['name' => 'Sensor','id' => 43]);
      // DB::table('host_types')->insert(['name' => 'Teclado (SDI)','id' => 44]);
      // DB::table('host_types')->insert(['name' => 'Sirena','id' => 45]);
      // DB::table('host_types')->insert(['name' => 'Panico','id' => 46]);
      // DB::table('host_types')->insert(['name' => 'Tracker','id' => 47]);

      //TRACKERS
      DB::table('permissions')->insert(['name'  => 'Ver Trackers','slug'  => 'trackers.show','description'  => 'Tabla Trackers']);
      DB::table('permissions')->insert(['name'  => 'Detalle Tracker','slug'  => 'trackers.only','description'  => 'Detalle de Tracker']);
      DB::table('permissions')->insert(['name'  => 'Editar Tracker','slug'  => 'trackers.edit','description'  => 'Editar de Tracker']);
      DB::table('permissions')->insert(['name'  => 'Crear Tracker','slug'  => 'trackers.create','description'  => 'Crear de Tracker']);
      // //
      DB::table('permission_role')->insert(['permission_id'  => 101, 'role_id'  => 2]);
      DB::table('permission_role')->insert(['permission_id'  => 102, 'role_id'  => 2]);
      DB::table('permission_role')->insert(['permission_id'  => 103, 'role_id'  => 2]);
      DB::table('permission_role')->insert(['permission_id'  => 104, 'role_id'  => 2]);

      DB::table('permission_role')->insert(['permission_id'  => 150, 'role_id'  => 2]);
      DB::table('permission_role')->insert(['permission_id'  => 149, 'role_id'  => 2]);
      DB::table('permission_role')->insert(['permission_id'  => 148, 'role_id'  => 2]);
      DB::table('permission_role')->insert(['permission_id'  => 147, 'role_id'  => 2]);

    }
}
