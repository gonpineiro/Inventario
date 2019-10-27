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

        //CREDENCIALES_NETWORKING
        DB::table('permissions')->insert(['name'  => 'Ver Credenciales','slug'  => 'crednets.show','description'  => 'Tabla Credenciales']);
        DB::table('permissions')->insert(['name'  => 'Detalle Credencial','slug'  => 'crednets.only','description'  => 'Detalle de Credencial']);
        DB::table('permissions')->insert(['name'  => 'Editar Credencial','slug'  => 'crednets.edit','description'  => 'Editar de Credencial']);
        DB::table('permissions')->insert(['name'  => 'Crear Credencial','slug'  => 'crednets.create','description'  => 'Crear de Credencial']);
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

        //CREDENCIALES_CCTV
        DB::table('permissions')->insert(['name'  => 'Ver Credenciales','slug'  => 'credcctvs.show','description'  => 'Tabla Credenciales']);
        DB::table('permissions')->insert(['name'  => 'Detalle Credencial','slug'  => 'credcctvs.only','description'  => 'Detalle de Credencial']);
        DB::table('permissions')->insert(['name'  => 'Editar Credencial','slug'  => 'credcctvs.edit','description'  => 'Editar de Credencial']);
        DB::table('permissions')->insert(['name'  => 'Crear Credencial','slug'  => 'credcctvs.create','description'  => 'Crear de Credencial']);




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
        DB::table('permissions')->insert(['name'  => 'Ver Abonados','slug'  => 'abonados.show','description'  => 'Tabla Abonados']);
        DB::table('permissions')->insert(['name'  => 'Detalle Abonado','slug'  => 'abonados.only','description'  => 'Detalle de Abonado']);
        DB::table('permissions')->insert(['name'  => 'Editar Abonado','slug'  => 'abonados.edit','description'  => 'Editar de Abonado']);
        DB::table('permissions')->insert(['name'  => 'Crear Abonado','slug'  => 'abonados.create','description'  => 'Crear de Abonado']);

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
        //SIMS_CARDS

        DB::table('permissions')->insert(['name'  => 'Ver SIMs','slug'  => 'cardsims.show','description'  => 'Tabla SIMs']);
        DB::table('permissions')->insert(['name'  => 'Detalle SIM','slug'  => 'cardsims.only','description'  => 'Detalle de SIM']);
        DB::table('permissions')->insert(['name'  => 'Editar SIM','slug'  => 'cardsims.edit','description'  => 'Editar de SIM']);
        DB::table('permissions')->insert(['name'  => 'Crear SIM','slug'  => 'cardsims.create','description'  => 'Crear de SIM']);




        //ADMINISTRACION
        //USUARIOS DEL SISTEMA

        DB::table('permissions')->insert(['name'  => 'Ver Usuarios','slug'  => 'users.show','description'  => 'Tabla Usuarios']);
        DB::table('permissions')->insert(['name'  => 'Detalle Usuario','slug'  => 'users.only','description'  => 'Detalle de Usuario']);
        DB::table('permissions')->insert(['name'  => 'Editar Usuario','slug'  => 'users.edit','description'  => 'Editar de Usuario']);
        DB::table('permissions')->insert(['name'  => 'Crear Usuario','slug'  => 'users.create','description'  => 'Crear de Usuario']);
        //ROLES

        DB::table('permissions')->insert(['name'  => 'Ver Roles','slug'  => 'roles.show','description'  => 'Tabla Roles']);
        DB::table('permissions')->insert(['name'  => 'Detalle Rol','slug'  => 'roles.only','description'  => 'Detalle de Rol']);
        DB::table('permissions')->insert(['name'  => 'Editar Usuario','slug'  => 'roles.edit','description'  => 'Editar de Rol']);
        DB::table('permissions')->insert(['name'  => 'Crear Rol','slug'  => 'roles.create','description'  => 'Crear de Rol']);
        //USUARIOS DE HOST

        DB::table('permissions')->insert(['name'  => 'Ver Usuarios','slug'  => 'userhosts.show','description'  => 'Tabla Usuarios']);
        DB::table('permissions')->insert(['name'  => 'Detalle Usuario','slug'  => 'userhosts.only','description'  => 'Detalle de Usuario']);
        DB::table('permissions')->insert(['name'  => 'Editar Usuario','slug'  => 'userhosts.edit','description'  => 'Editar de Usuario']);
        DB::table('permissions')->insert(['name'  => 'Crear Usuario','slug'  => 'userhosts.create','description'  => 'Crear de Usuario']);
        //MARCAS

        DB::table('permissions')->insert(['name'  => 'Ver Marcas','slug'  => 'marcas.show','description'  => 'Tabla Marcas']);
        DB::table('permissions')->insert(['name'  => 'Detalle Marca','slug'  => 'marcas.only','description'  => 'Detalle de Marca']);
        DB::table('permissions')->insert(['name'  => 'Editar Marca','slug'  => 'marcas.edit','description'  => 'Editar de Marca']);
        DB::table('permissions')->insert(['name'  => 'Crear Marca','slug'  => 'marcas.create','description'  => 'Crear de Marca']);
        //DEPARTAMENTOS

        DB::table('permissions')->insert(['name'  => 'Ver Departamentos','slug'  => 'departaments.show','description'  => 'Tabla Departamentos']);
        DB::table('permissions')->insert(['name'  => 'Detalle Departamento','slug'  => 'departaments.only','description'  => 'Detalle de Departamento']);
        DB::table('permissions')->insert(['name'  => 'Editar Departamento','slug'  => 'departaments.edit','description'  => 'Editar de Departamento']);
        DB::table('permissions')->insert(['name'  => 'Crear Departamento','slug'  => 'departaments.create','description'  => 'Crear de Departamento']);
        //CLIENTES

        DB::table('permissions')->insert(['name'  => 'Ver Clientes','slug'  => 'clients.show','description'  => 'Tabla Clientes']);
        DB::table('permissions')->insert(['name'  => 'Detalle Cliente','slug'  => 'clients.only','description'  => 'Detalle de Cliente']);
        DB::table('permissions')->insert(['name'  => 'Editar Cliente','slug'  => 'clients.edit','description'  => 'Editar de Cliente']);
        DB::table('permissions')->insert(['name'  => 'Crear Cliente','slug'  => 'clients.create','description'  => 'Crear de Cliente']);
        //HISTORIAL

        DB::table('permissions')->insert(['name'  => 'Ver Historial','slug'  => 'historials.show','description'  => 'Tabla Historial']);
        //FICHA DE ENTREGA

        DB::table('permissions')->insert(['name'  => 'Ver Entregas','slug'  => 'entregas.show','description'  => 'Tabla Entregas']);
        DB::table('permissions')->insert(['name'  => 'Detalle Entrega','slug'  => 'entregas.only','description'  => 'Detalle de Entrega']);
        DB::table('permissions')->insert(['name'  => 'Editar Entrega','slug'  => 'entregas.edit','description'  => 'Editar de Entrega']);
        DB::table('permissions')->insert(['name'  => 'Crear Entrega','slug'  => 'entregas.create','description'  => 'Crear de Entrega']);
        //HOST_WORK

        DB::table('permissions')->insert(['name'  => 'Ver Registros de Trabajo','slug'  => 'hostworks.show','description'  => 'Tabla Registros de Trabajo']);
        DB::table('permissions')->insert(['name'  => 'Detalle Registro de Trabajo','slug'  => 'hostworks.only','description'  => 'Detalle de Registro de Trabajo']);
        DB::table('permissions')->insert(['name'  => 'Editar Registro de Trabajo','slug'  => 'hostworks.edit','description'  => 'Editar de Registro de Trabajo']);
        DB::table('permissions')->insert(['name'  => 'Crear Registro de Trabajo','slug'  => 'hostworks.create','description'  => 'Crear de Registro de Trabajo']);


    }
}
