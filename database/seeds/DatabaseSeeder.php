<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      DB::table('host_types')->insert(['name' => 'Panel de alarma','id' => 40]);
      DB::table('host_types')->insert(['name' => 'Expansora','id' => 41]);
      DB::table('host_types')->insert(['name' => 'Comunicador','id' => 42]);
      DB::table('host_types')->insert(['name' => 'Sensor','id' => 43]);
      DB::table('host_types')->insert(['name' => 'Teclado (SDI)','id' => 44]);
    }
}
