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

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //HOST DE USUARIOS
        //COMPUTADORAS
        DB::table('permissions')->insert(['name'  => 'Ver Computadoras'     ,'slug'  => 'computadoras.show'   ,'description'  => 'Tabla Computadoras']);
        DB::table('permissions')->insert(['name'  => 'Detalle Computadora'  ,'slug'  => 'computadoras.only'   ,'description'  => 'Detalle de Computadora']);
        DB::table('permissions')->insert(['name'  => 'Editar Computadora'   ,'slug'  => 'computadoras.edit'   ,'description'  => 'Editar de Computadora']);
        DB::table('permissions')->insert(['name'  => 'Crear Computadora'    ,'slug'  => 'computadoras.create' ,'description'  => 'Crear de Computadora']);

        //NOTEBOOK
        DB::table('permissions')->insert(['name'  => 'Ver Notebooks','slug'  => 'notebooks.show','description'  => 'Tabla Notebooks']);
        DB::table('permissions')->insert(['name'  => 'Detalle Notebook','slug'  => 'notebooks.only','description'  => 'Detalle de Notebook']);
        DB::table('permissions')->insert(['name'  => 'Editar Notebook','slug'  => 'notebooks.edit','description'  => 'Editar de Notebook']);
        DB::table('permissions')->insert(['name'  => 'Crear Notebook','slug'  => 'notebooks.create','description'  => 'Crear de Notebook']);

        //IMPRESORAS
        DB::table('permissions')->insert(['name'  => 'Ver Impresoras','slug'  => 'impresoras.show','description'  => 'Tabla Impresoras']);

        DB::table('permissions')->insert(['name'  => 'Detalle Impresora','slug'  => 'impresoras.only','description'  => 'Detalle de Impresora']);
        DB::table('permissions')->insert(['name'  => 'Editar Impresora','slug'  => 'impresoras.edit','description'  => 'Editar de Impresora']);
        DB::table('permissions')->insert(['name'  => 'Crear Impresora','slug'  => 'impresoras.create','description'  => 'Crear de Impresora']);

        //PHONE IP
        DB::table('permissions')->insert(['name'  => 'Ver Telefonos-IP','slug'  => 'phoneips.show','description'  => 'Tabla Telefonos-IP']);
        DB::table('permissions')->insert(['name'  => 'Detalle Telefono-IP','slug'  => 'phoneips.only','description'  => 'Detalle de Telefono-IP']);
        DB::table('permissions')->insert(['name'  => 'Editar Telefono-IP','slug'  => 'phoneips.edit','description'  => 'Editar de Telefono-IP']);
        DB::table('permissions')->insert(['name'  => 'Crear Telefono-IP','slug'  => 'phoneips.create','description'  => 'Crear de Telefono-IP']);
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




        //NETWORKING
        //MODEM
        DB::table('permissions')->insert(['name'  => 'Ver Modems','slug'  => 'modems.show','description'  => 'Tabla Modems']);
        DB::table('permissions')->insert(['name'  => 'Detalle Modem','slug'  => 'modems.only','description'  => 'Detalle de Modem']);
        DB::table('permissions')->insert(['name'  => 'Editar Modem','slug'  => 'modems.edit','description'  => 'Editar de Modem']);
        DB::table('permissions')->insert(['name'  => 'Crear Modem','slug'  => 'modems.create','description'  => 'Crear de Modem']);
        //ROUTER

        DB::table('permissions')->insert(['name'  => 'Ver Routers','slug'  => 'routers.show','description'  => 'Tabla Routers']);
        DB::table('permissions')->insert(['name'  => 'Detalle Router','slug'  => 'routers.only','description'  => 'Detalle de Router']);
        DB::table('permissions')->insert(['name'  => 'Editar Router','slug'  => 'routers.edit','description'  => 'Editar de Router']);
        DB::table('permissions')->insert(['name'  => 'Crear Router','slug'  => 'routers.create','description'  => 'Crear de Router']);

        //SWITCH
        DB::table('permissions')->insert(['name'  => 'Ver Switchs','slug'  => 'switchs.show','description'  => 'Tabla Switchs']);
        DB::table('permissions')->insert(['name'  => 'Detalle Switch','slug'  => 'switchs.only','description'  => 'Detalle de Switch']);
        DB::table('permissions')->insert(['name'  => 'Editar Switch','slug'  => 'switchs.edit','description'  => 'Editar de Switch']);
        DB::table('permissions')->insert(['name'  => 'Crear Switch','slug'  => 'switchs.create','description'  => 'Crear de Switch']);

        //ACCESPOINT
        DB::table('permissions')->insert(['name'  => 'Ver Acces Point','slug'  => 'accespoints.show','description'  => 'Tabla Acces Points']);
        DB::table('permissions')->insert(['name'  => 'Detalle Acces Point','slug'  => 'accespoints.only','description'  => 'Detalle de Acces Point']);
        DB::table('permissions')->insert(['name'  => 'Editar Acces Point','slug'  => 'accespoints.edit','description'  => 'Editar de Acce Point']);
        DB::table('permissions')->insert(['name'  => 'Crear Acces Point','slug'  => 'accespoints.create','description'  => 'Crear de Acces Point']);
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




        //CCTV
        //CAMARA-IP
        DB::table('permissions')->insert(['name'  => 'Ver Camara-IP','slug'  => 'camaraips.show','description'  => 'Tabla Camara-IP']);
        DB::table('permissions')->insert(['name'  => 'Detalle Camara-IP','slug'  => 'camaraips.only','description'  => 'Detalle de Camara-IP']);
        DB::table('permissions')->insert(['name'  => 'Editar Camara-IP','slug'  => 'camaraips.edit','description'  => 'Editar de Camara-IP']);
        DB::table('permissions')->insert(['name'  => 'Crear Camara-IP','slug'  => 'camaraips.create','description'  => 'Crear de Camara-IP']);
        //DVR

        DB::table('permissions')->insert(['name'  => 'Ver DVRs','slug'  => 'dvrs.show','description'  => 'Tabla DVRs']);
        DB::table('permissions')->insert(['name'  => 'Detalle DVR','slug'  => 'dvrs.only','description'  => 'Detalle de DVR']);
        DB::table('permissions')->insert(['name'  => 'Editar DVR','slug'  => 'dvrs.edit','description'  => 'Editar de DVR']);
        DB::table('permissions')->insert(['name'  => 'Crear DVR','slug'  => 'dvrs.create','description'  => 'Crear de DVR']);

        //CAMARAS ANALOGICAS
        DB::table('permissions')->insert(['name'  => 'Ver Camaras Ana.','slug'  => 'camarasanas.show','description'  => 'Tabla Camaras Ana.']);
        DB::table('permissions')->insert(['name'  => 'Detalle Camara Ana.','slug'  => 'camarasanas.only','description'  => 'Detalle de Camara Ana.']);
        DB::table('permissions')->insert(['name'  => 'Editar Camara Ana.','slug'  => 'camarasanas.edit','description'  => 'Editar de Camara Ana.']);
        DB::table('permissions')->insert(['name'  => 'Crear Camara Ana.','slug'  => 'camarasanas.create','description'  => 'Crear de Camara Ana.']);




        //PERIFERICOS
        //MONITOR
        DB::table('permissions')->insert(['name'  => 'Ver Monitores','slug'  => 'monitors.show','description'  => 'Tabla Monitors']);
        DB::table('permissions')->insert(['name'  => 'Detalle Monitor','slug'  => 'monitors.only','description'  => 'Detalle de Monitor']);
        DB::table('permissions')->insert(['name'  => 'Editar Monitor','slug'  => 'monitors.edit','description'  => 'Editar de Monitor']);
        DB::table('permissions')->insert(['name'  => 'Crear Monitor','slug'  => 'monitors.create','description'  => 'Crear de Monitor']);
        //TELEVISOR

        DB::table('permissions')->insert(['name'  => 'Ver Televisores','slug'  => 'televisors.show','description'  => 'Tabla Televisores']);
        DB::table('permissions')->insert(['name'  => 'Detalle Televisor','slug'  => 'televisors.only','description'  => 'Detalle de Televisor']);
        DB::table('permissions')->insert(['name'  => 'Editar Televisor','slug'  => 'televisors.edit','description'  => 'Editar de Televisor']);
        DB::table('permissions')->insert(['name'  => 'Crear Televisor','slug'  => 'televisors.create','description'  => 'Crear de Televisor']);
        //TELEVISOR

        DB::table('permissions')->insert(['name'  => 'Ver Teclados','slug'  => 'teclados.show','description'  => 'Tabla Teclados']);
        DB::table('permissions')->insert(['name'  => 'Detalle Teclado','slug'  => 'teclados.only','description'  => 'Detalle de Teclado']);
        DB::table('permissions')->insert(['name'  => 'Editar Teclado','slug'  => 'teclados.edit','description'  => 'Editar de Teclado']);
        DB::table('permissions')->insert(['name'  => 'Crear Teclado','slug'  => 'teclados.create','description'  => 'Crear de Teclado']);
        //MOUSE

        DB::table('permissions')->insert(['name'  => 'Ver Mouse','slug'  => 'mouses.show','description'  => 'Tabla Mouses']);
        DB::table('permissions')->insert(['name'  => 'Detalle Mouse','slug'  => 'mouses.only','description'  => 'Detalle de Mouse']);
        DB::table('permissions')->insert(['name'  => 'Editar Mouse','slug'  => 'mouses.edit','description'  => 'Editar de Mouse']);
        DB::table('permissions')->insert(['name'  => 'Crear Mouse','slug'  => 'mouses.create','description'  => 'Crear de Mouse']);
        //WEBCAMS

        DB::table('permissions')->insert(['name'  => 'Ver Web Cams','slug'  => 'webcams.show','description'  => 'Tabla Web Cams']);
        DB::table('permissions')->insert(['name'  => 'Detalle Web Cam','slug'  => 'webcams.only','description'  => 'Detalle de Web Cam']);
        DB::table('permissions')->insert(['name'  => 'Editar Web Cam','slug'  => 'webcams.edit','description'  => 'Editar de Web Cam']);
        DB::table('permissions')->insert(['name'  => 'Crear Web Cam','slug'  => 'webcams.create','description'  => 'Crear de Web Cam']);




        //SDI
        //PANEL DE ALARMA
        DB::table('permissions')->insert(['name'  => 'Ver Paneles','slug'  => 'panelalarms.show','description'  => 'Tabla Paneles']);
        DB::table('permissions')->insert(['name'  => 'Detalle Panel','slug'  => 'panelalarms.only','description'  => 'Detalle de Panel']);
        DB::table('permissions')->insert(['name'  => 'Editar Panel','slug'  => 'panelalarms.edit','description'  => 'Editar de Panel']);
        DB::table('permissions')->insert(['name'  => 'Crear Panel','slug'  => 'panelalarms.create','description'  => 'Crear de Panel']);
        //EXPANSORA

        DB::table('permissions')->insert(['name'  => 'Ver Expansoras','slug'  => 'expansoras.show','description'  => 'Tabla Expansoras']);
        DB::table('permissions')->insert(['name'  => 'Detalle Expansora','slug'  => 'expansoras.only','description'  => 'Detalle de Expansora']);
        DB::table('permissions')->insert(['name'  => 'Editar Expansora','slug'  => 'expansoras.edit','description'  => 'Editar de Expansora']);
        DB::table('permissions')->insert(['name'  => 'Crear Expansora','slug'  => 'expansoras.create','description'  => 'Crear de Expansora']);
        //COMUNICADOR

        DB::table('permissions')->insert(['name'  => 'Ver Comunicadores','slug'  => 'comunicators.show','description'  => 'Tabla Comunicadores']);
        DB::table('permissions')->insert(['name'  => 'Detalle Comunicador','slug'  => 'comunicators.only','description'  => 'Detalle de Comunicador']);
        DB::table('permissions')->insert(['name'  => 'Editar Comunicador','slug'  => 'comunicators.edit','description'  => 'Editar de Comunicador']);
        DB::table('permissions')->insert(['name'  => 'Crear Comunicador','slug'  => 'comunicators.create','description'  => 'Crear de Comunicador']);
        //SENSOR

        DB::table('permissions')->insert(['name'  => 'Ver Sensores','slug'  => 'sensors.show','description'  => 'Tabla Sensores']);
        DB::table('permissions')->insert(['name'  => 'Detalle Sensor','slug'  => 'sensors.only','description'  => 'Detalle de Sensor']);
        DB::table('permissions')->insert(['name'  => 'Editar Sensor','slug'  => 'sensors.edit','description'  => 'Editar de Sensor']);
        DB::table('permissions')->insert(['name'  => 'Crear Sensor','slug'  => 'sensors.create','description'  => 'Crear de Sensor']);
        //TECLADO-SDI

        DB::table('permissions')->insert(['name'  => 'Ver Teclados-SDI','slug'  => 'tecladosdis.show','description'  => 'Tabla Teclados-SDI']);
        DB::table('permissions')->insert(['name'  => 'Detalle Teclado-SDI','slug'  => 'tecladosdis.only','description'  => 'Detalle de Teclado-SDI']);
        DB::table('permissions')->insert(['name'  => 'Editar Teclado-SDI','slug'  => 'tecladosdis.edit','description'  => 'Editar de Teclado-SDI']);
        DB::table('permissions')->insert(['name'  => 'Crear Teclado-SDI','slug'  => 'tecladosdis.create','description'  => 'Crear de Teclado-SDI']);
        //SIRENA

        DB::table('permissions')->insert(['name'  => 'Ver Sirenas','slug'  => 'sirenas.show','description'  => 'Tabla Sirenas']);
        DB::table('permissions')->insert(['name'  => 'Detalle Sirena','slug'  => 'sirenas.only','description'  => 'Detalle de Sirena']);
        DB::table('permissions')->insert(['name'  => 'Editar Sirena','slug'  => 'sirenas.edit','description'  => 'Editar de Sirena']);
        DB::table('permissions')->insert(['name'  => 'Crear Sirena','slug'  => 'sirenas.create','description'  => 'Crear de Sirena']);


    }
}
