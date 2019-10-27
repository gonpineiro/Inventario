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
      Role::create(['name'  => 'Admin','slug'  => 'admin','special'  => 'all-access',]);
      DB::table('role_user')->insert(['role_id' => '1','user_id' => 1]);

      DB::table('host_types')->insert(['name' => 'Panel de alarma','id' => 40]);
      DB::table('host_types')->insert(['name' => 'Expansora','id' => 41]);
      DB::table('host_types')->insert(['name' => 'Comunicador','id' => 42]);
      DB::table('host_types')->insert(['name' => 'Sensor','id' => 43]);
      DB::table('host_types')->insert(['name' => 'Teclado (SDI)','id' => 44]);
      DB::table('host_types')->insert(['name' => 'Sirena','id' => 45]);
    }
}
