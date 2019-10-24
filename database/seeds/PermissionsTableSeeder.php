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
        Permission::create(['name'  => 'Ver Computadoras','slug'  => 'computadoras.show','description'  => 'Tabla Computadoras',]);
        Permission::create(['name'  => 'Detalle Computadora','slug'  => 'computadoras.only','description'  => 'Detalle de Computadora',]);
        Permission::create(['name'  => 'Editar Computadora','slug'  => 'computadoras.edit','description'  => 'Editar de Computadora',]);
        Permission::create(['name'  => 'Crear Computadora','slug'  => 'computadoras.create','description'  => 'Crear de Computadora',]);

        //NOTEBOOK
        Permission::create(['name'  => 'Ver Notebooks','slug'  => 'notebooks.show','description'  => 'Tabla Notebooks',]);
        Permission::create(['name'  => 'Detalle Notebook','slug'  => 'notebooks.only','description'  => 'Detalle de Notebook',]);
        Permission::create(['name'  => 'Editar Notebook','slug'  => 'notebooks.edit','description'  => 'Editar de Notebook',]);
        Permission::create(['name'  => 'Crear Notebook','slug'  => 'notebooks.create','description'  => 'Crear de Notebook',]);

        //IMPRESORAS
        Permission::create(['name'  => 'Ver Impresoras','slug'  => 'impresoras.show','description'  => 'Tabla Impresoras',]);
        Permission::create(['name'  => 'Detalle Impresora','slug'  => 'impresoras.only','description'  => 'Detalle de Impresora',]);
        Permission::create(['name'  => 'Editar Impresora','slug'  => 'impresoras.edit','description'  => 'Editar de Impresora',]);
        Permission::create(['name'  => 'Crear Impresora','slug'  => 'impresoras.create','description'  => 'Crear de Impresora',]);

        //PHONE IP
        Permission::create(['name'  => 'Ver Telefonos-IP','slug'  => 'phoneips.show','description'  => 'Tabla Telefonos-IP',]);
        Permission::create(['name'  => 'Detalle Telefono-IP','slug'  => 'phoneips.only','description'  => 'Detalle de Telefono-IP',]);
        Permission::create(['name'  => 'Editar Telefono-IP','slug'  => 'phoneips.edit','description'  => 'Editar de Telefono-IP',]);
        Permission::create(['name'  => 'Crear Telefono-IP','slug'  => 'phoneips.create','description'  => 'Crear de Telefono-IP',]);
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




        //NETWORKING
        //MODEM
        Permission::create(['name'  => 'Ver Modems','slug'  => 'modems.show','description'  => 'Tabla Modems',]);
        Permission::create(['name'  => 'Detalle Modem','slug'  => 'modems.only','description'  => 'Detalle de Modem',]);
        Permission::create(['name'  => 'Editar Modem','slug'  => 'modems.edit','description'  => 'Editar de Modem',]);
        Permission::create(['name'  => 'Crear Modem','slug'  => 'modems.create','description'  => 'Crear de Modem',]);
        //ROUTER

        Permission::create(['name'  => 'Ver Routers','slug'  => 'routers.show','description'  => 'Tabla Routers',]);
        Permission::create(['name'  => 'Detalle Router','slug'  => 'routers.only','description'  => 'Detalle de Router',]);
        Permission::create(['name'  => 'Editar Router','slug'  => 'routers.edit','description'  => 'Editar de Router',]);
        Permission::create(['name'  => 'Crear Router','slug'  => 'routers.create','description'  => 'Crear de Router',]);

        //SWITCH
        Permission::create(['name'  => 'Ver Switchs','slug'  => 'switchs.show','description'  => 'Tabla Switchs',]);
        Permission::create(['name'  => 'Detalle Switch','slug'  => 'switchs.only','description'  => 'Detalle de Switch',]);
        Permission::create(['name'  => 'Editar Switch','slug'  => 'switchs.edit','description'  => 'Editar de Switch',]);
        Permission::create(['name'  => 'Crear Switch','slug'  => 'switchs.create','description'  => 'Crear de Switch',]);

        //ACCESPOINT
        Permission::create(['name'  => 'Ver Acces Point','slug'  => 'accespoints.show','description'  => 'Tabla Acces Points',]);
        Permission::create(['name'  => 'Detalle Acces Point','slug'  => 'accespoints.only','description'  => 'Detalle de Acces Point',]);
        Permission::create(['name'  => 'Editar Acces Point','slug'  => 'accespoints.edit','description'  => 'Editar de Acce Point',]);
        Permission::create(['name'  => 'Crear Acces Point','slug'  => 'accespoints.create','description'  => 'Crear de Acces Point',]);
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




        //CCTV
        //CAMARA-IP
        Permission::create(['name'  => 'Ver Camara-IP','slug'  => 'camaraips.show','description'  => 'Tabla Camara-IP',]);
        Permission::create(['name'  => 'Detalle Camara-IP','slug'  => 'camaraips.only','description'  => 'Detalle de Camara-IP',]);
        Permission::create(['name'  => 'Editar Camara-IP','slug'  => 'camaraips.edit','description'  => 'Editar de Camara-IP',]);
        Permission::create(['name'  => 'Crear Camara-IP','slug'  => 'camaraips.create','description'  => 'Crear de Camara-IP',]);
        //DVR

        Permission::create(['name'  => 'Ver DVRs','slug'  => 'dvrs.show','description'  => 'Tabla DVRs',]);
        Permission::create(['name'  => 'Detalle DVR','slug'  => 'dvrs.only','description'  => 'Detalle de DVR',]);
        Permission::create(['name'  => 'Editar DVR','slug'  => 'dvrs.edit','description'  => 'Editar de DVR',]);
        Permission::create(['name'  => 'Crear DVR','slug'  => 'dvrs.create','description'  => 'Crear de DVR',]);

        //CAMARAS ANALOGICAS
        Permission::create(['name'  => 'Ver Camaras Ana.','slug'  => 'camarasanas.show','description'  => 'Tabla Camaras Ana.',]);
        Permission::create(['name'  => 'Detalle Camara Ana.','slug'  => 'camarasanas.only','description'  => 'Detalle de Camara Ana.',]);
        Permission::create(['name'  => 'Editar Camara Ana.','slug'  => 'camarasanas.edit','description'  => 'Editar de Camara Ana.',]);
        Permission::create(['name'  => 'Crear Camara Ana.','slug'  => 'camarasanas.create','description'  => 'Crear de Camara Ana.',]);




        //PERIFERICOS
        //MONITOR
        Permission::create(['name'  => 'Ver Monitores','slug'  => 'monitors.show','description'  => 'Tabla Monitors',]);
        Permission::create(['name'  => 'Detalle Monitor','slug'  => 'monitors.only','description'  => 'Detalle de Monitor',]);
        Permission::create(['name'  => 'Editar Monitor','slug'  => 'monitors.edit','description'  => 'Editar de Monitor',]);
        Permission::create(['name'  => 'Crear Monitor','slug'  => 'monitors.create','description'  => 'Crear de Monitor',]);
        //TELEVISOR

        Permission::create(['name'  => 'Ver Televisores','slug'  => 'televisors.show','description'  => 'Tabla Televisores',]);
        Permission::create(['name'  => 'Detalle Televisor','slug'  => 'televisors.only','description'  => 'Detalle de Televisor',]);
        Permission::create(['name'  => 'Editar Televisor','slug'  => 'televisors.edit','description'  => 'Editar de Televisor',]);
        Permission::create(['name'  => 'Crear Televisor','slug'  => 'televisors.create','description'  => 'Crear de Televisor',]);
        //TELEVISOR

        Permission::create(['name'  => 'Ver Teclados','slug'  => 'teclados.show','description'  => 'Tabla Teclados',]);
        Permission::create(['name'  => 'Detalle Teclado','slug'  => 'teclados.only','description'  => 'Detalle de Teclado',]);
        Permission::create(['name'  => 'Editar Teclado','slug'  => 'teclados.edit','description'  => 'Editar de Teclado',]);
        Permission::create(['name'  => 'Crear Teclado','slug'  => 'teclados.create','description'  => 'Crear de Teclado',]);
        //MOUSE

        Permission::create(['name'  => 'Ver Mouse','slug'  => 'mouses.show','description'  => 'Tabla Mouses',]);
        Permission::create(['name'  => 'Detalle Mouse','slug'  => 'mouses.only','description'  => 'Detalle de Mouse',]);
        Permission::create(['name'  => 'Editar Mouse','slug'  => 'mouses.edit','description'  => 'Editar de Mouse',]);
        Permission::create(['name'  => 'Crear Mouse','slug'  => 'mouses.create','description'  => 'Crear de Mouse',]);




        //SDI
        //PANEL DE ALARMA
        Permission::create(['name'  => 'Ver Paneles','slug'  => 'panelalarm.show','description'  => 'Tabla Paneles',]);
        Permission::create(['name'  => 'Detalle Panel','slug'  => 'panelalarm.only','description'  => 'Detalle de Panel',]);
        Permission::create(['name'  => 'Editar Panel','slug'  => 'panelalarm.edit','description'  => 'Editar de Panel',]);
        Permission::create(['name'  => 'Crear Panel','slug'  => 'panelalarm.create','description'  => 'Crear de Panel',]);
        //EXPANSORA

        Permission::create(['name'  => 'Ver Expansoras','slug'  => 'expansoras.show','description'  => 'Tabla Expansoras',]);
        Permission::create(['name'  => 'Detalle Expansora','slug'  => 'expansoras.only','description'  => 'Detalle de Expansora',]);
        Permission::create(['name'  => 'Editar Expansora','slug'  => 'expansoras.edit','description'  => 'Editar de Expansora',]);
        Permission::create(['name'  => 'Crear Expansora','slug'  => 'expansoras.create','description'  => 'Crear de Expansora',]);
        //COMUNICADOR

        Permission::create(['name'  => 'Ver Comunicadores','slug'  => 'comunicators.show','description'  => 'Tabla Comunicadores',]);
        Permission::create(['name'  => 'Detalle Comunicador','slug'  => 'comunicators.only','description'  => 'Detalle de Comunicador',]);
        Permission::create(['name'  => 'Editar Comunicador','slug'  => 'comunicators.edit','description'  => 'Editar de Comunicador',]);
        Permission::create(['name'  => 'Crear Comunicador','slug'  => 'comunicators.create','description'  => 'Crear de Comunicador',]);
        //SENSOR

        Permission::create(['name'  => 'Ver Sensores','slug'  => 'sensors.show','description'  => 'Tabla Sensores',]);
        Permission::create(['name'  => 'Detalle Sensor','slug'  => 'sensors.only','description'  => 'Detalle de Sensor',]);
        Permission::create(['name'  => 'Editar Sensor','slug'  => 'sensors.edit','description'  => 'Editar de Sensor',]);
        Permission::create(['name'  => 'Crear Sensor','slug'  => 'sensors.create','description'  => 'Crear de Sensor',]);
        //TECLADO-SDI

        Permission::create(['name'  => 'Ver Teclados-SDI','slug'  => 'tecladosdis.show','description'  => 'Tabla Teclados-SDI',]);
        Permission::create(['name'  => 'Detalle Teclado-SDI','slug'  => 'tecladosdis.only','description'  => 'Detalle de Teclado-SDI',]);
        Permission::create(['name'  => 'Editar Teclado-SDI','slug'  => 'tecladosdis.edit','description'  => 'Editar de Teclado-SDI',]);
        Permission::create(['name'  => 'Crear Teclado-SDI','slug'  => 'tecladosdis.create','description'  => 'Crear de Teclado-SDI',]);
        //SIRENA

        Permission::create(['name'  => 'Ver Sirenas','slug'  => 'sirenas.show','description'  => 'Tabla Sirenas',]);
        Permission::create(['name'  => 'Detalle Sirena','slug'  => 'sirenas.only','description'  => 'Detalle de Sirena',]);
        Permission::create(['name'  => 'Editar Sirena','slug'  => 'sirenas.edit','description'  => 'Editar de Sirena',]);
        Permission::create(['name'  => 'Crear Sirena','slug'  => 'sirenas.create','description'  => 'Crear de Sirena',]);


    }
}
