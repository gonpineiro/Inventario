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

     DB::table('host_types')->insert(['name' => 'Panel de alarma','id' => 40]);
      DB::table('host_types')->insert(['name' => 'Expansora','id' => 41]);
      DB::table('host_types')->insert(['name' => 'Comunicador','id' => 42]);
      DB::table('host_types')->insert(['name' => 'Sensor','id' => 43]);
      DB::table('host_types')->insert(['name' => 'Teclado (SDI)','id' => 44]);
      DB::table('host_types')->insert(['name' => 'Sirena','id' => 45]);


    }
}
