<?php

use Illuminate\Database\Seeder;

class StartSRV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()  {
      //unserialize
    #  DB::table('users')->insert(['name' => 'Gonzalo Piñeiro'],['email' => 'gonzalopineiro@sab5.com.ar'],['password' => '$10$IR3KNbtcV6MXrFq6KAvW2u6bX.T7kA7WaDj9I6S1XcO7.yk4A7JD.']);
      //estados
      DB::table('estados')->insert(['name' => 'Operando']);
      DB::table('estados')->insert(['name' => 'Baja']);
      //CLIENTES
      DB::table('clientes')->insert(['name' => 'SAB-5']);
      DB::table('clientes')->insert(['name' => 'Consisa']);
      DB::table('clientes')->insert(['name' => 'BrouClean']);
      DB::table('clientes')->insert(['name' => 'Netshoes']);
      DB::table('clientes')->insert(['name' => 'Sanatorio']);
      DB::table('clientes')->insert(['name' => 'Violetta']);


      //DEPARTAMENTS
      DB::table('departaments')->insert(['name' => 'IT','cliente_id' => 1]);
      DB::table('departaments')->insert(['name' => 'COP','cliente_id' => 1]);
      DB::table('departaments')->insert(['name' => 'Tesoreria','cliente_id' => 2]);
      DB::table('departaments')->insert(['name' => 'Legales','cliente_id' => 1]);
      DB::table('departaments')->insert(['name' => 'RRHH','cliente_id' => 2]);


      //HOST TYPE (Host de Usuarios)
      DB::table('host_types')->insert(['name' => 'Computadora','id' => 1]);
      DB::table('host_types')->insert(['name' => 'Notebook','id' => 2]);
      DB::table('host_types')->insert(['name' => 'Impresora','id' => 3]);
      DB::table('host_types')->insert(['name' => 'Teléfono IP','id' => 4]);

      //HOST TYPE (Networking)
      DB::table('host_types')->insert(['name' => 'Modem','id' => 10]);
      DB::table('host_types')->insert(['name' => 'Router','id' => 11]);
      DB::table('host_types')->insert(['name' => 'Switch','id' => 12]);
      DB::table('host_types')->insert(['name' => 'AccesPoint','id' => 13]);

      //HOST TYPE (Dispositivos de Seguridad)
      DB::table('host_types')->insert(['name' => 'Cámara ip','id' => 20]);
      DB::table('host_types')->insert(['name' => 'DVR','id' => 21]);
      DB::table('host_types')->insert(['name' => 'NVR','id' => 22]);
      DB::table('host_types')->insert(['name' => 'XVR','id' => 23]);
      DB::table('host_types')->insert(['name' => 'Cámara analógica','id' => 24]);
      //HOST TYPE (Perifericos)
      DB::table('host_types')->insert(['name' => 'Monitor','id' => 30]);
      DB::table('host_types')->insert(['name' => 'Televisor','id' => 31]);
      DB::table('host_types')->insert(['name' => 'Teclado','id' => 32]);
      DB::table('host_types')->insert(['name' => 'Mouse','id' => 33]);
      DB::table('host_types')->insert(['name' => 'Web cam','id' => 34]);

      DB::table('host_types')->insert(['name' => 'Panel de alarma','id' => 40]);
      DB::table('host_types')->insert(['name' => 'Expansora','id' => 41]);
      DB::table('host_types')->insert(['name' => 'Comunicador','id' => 42]);
      DB::table('host_types')->insert(['name' => 'Sensor','id' => 43]);
      DB::table('host_types')->insert(['name' => 'Teclado (SDI)','id' => 44]);
      DB::table('host_types')->insert(['name' => 'Sirena','id' => 45]);
    }

      DB::table('users')->insert(['name' => 'administrador','email' => 'administrador@sab5.com.ar','password' => '$2y$10$6gJTsnUyPc8XJ7J/C1f14euqL1pgDKnQt8xzPkNbkgZo53syKl3aK']);

      //MODELOS

      DB::table('modelos')->insert(['marca' => 'Dahua','name' => 'DVR-12CH720','host_type_id' => 21]);
      DB::table('modelos')->insert(['marca' => 'Dahua','name' => 'DVR-12CH1080','host_type_id' => 21]);
      DB::table('modelos')->insert(['marca' => 'Dahua','name' => 'CAMIP-720','host_type_id' => 20]);
      DB::table('modelos')->insert(['marca' => 'Dahua','name' => 'CAMIP-1080','host_type_id' => 20]);
      DB::table('modelos')->insert(['marca' => 'EPSON','name' => 'M234','host_type_id' => 3]);
      DB::table('modelos')->insert(['marca' => 'HP','name' => 'M500','host_type_id' => 3]);
      DB::table('modelos')->insert(['marca' => 'DELL','name' => 'ASUS1','host_type_id' => 2]);
      DB::table('modelos')->insert(['marca' => 'Net','name' => 'ASUS151','host_type_id' => 1]);
      DB::table('modelos')->insert(['marca' => 'ZAP','name' => 'E900','host_type_id' => 12]);

      //cctvs
      /*DB::table('cctvs')->insert(['name' => 'DV1']);
      DB::table('cctvs')->insert(['name' => 'DVR2']);
      DB::table('cctvs')->insert(['name' => 'DVR3']);
      DB::table('cctvs')->insert(['name' => 'NVR1']);
      DB::table('cctvs')->insert(['name' => 'NVR2']);
      DB::table('cctvs')->insert(['name' => 'NVR3']);
      DB::table('cctvs')->insert(['name' => 'XVR1']);
      DB::table('cctvs')->insert(['name' => 'XVR3']);*/






    }

}
