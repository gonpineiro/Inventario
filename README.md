# Inventario

## Proyecto
Es un proyecto creado gracias a la necesidad de poder realizar un inventario completo del parque tecnologico en el que se vincula con clientes

### Esta rama esta en  modo de prueba

  1.  Se Agrego la libreria de shinobi.

  ```
  composer require caffeinated/shinobi
  ```

  2.  Publish de la configuracion para traer las migration

  ```
  php artisan vendor:publish --provider="Caffeinated\Shinobi\ShinobiServiceProvider" --tag="config"
  ```

  3. Hay que agregar la siguente funcion en el Modelo del Rol dentro de la libreria:

  ```
  public function persmissions(){

    return $this->belongsToMany('Caffeinated\Shinobi\Models\Permission');
  }
  ```

  Ubicación:

  ```
  config/shinobi
  ```  


  4. Modifico la linea 90 del archivo: config/shinobi

  ```
  /vendor/caffeinated/shinobi/src/Models/Role.php
  ```

  ```
  'migrate' => false,
  ```

  5. Creacion del Seeder de PermissionsTable

  ```
  ohp artisan db:seed --class="PermissionsTableSeeder"
  ```


## Referencias

### Host de usuarios:

  1 Computadoras <br>
  2 Notebooks <br>
  3 Print/Scan  <br>
  4 Telefonos IP  <br>

### Networking:

  10 Modems <br>
  11 Routers <br>
  12 Switchs <br>
  13 AccesPoint <br>  

### Dispositivos de Seguridad:

  20 Camara IP <br>
  21 DVRs <br>
  22 NVRs <br>
  23 XVRs <br>
  24 Camaras Analogicas <br>

### Perifericos:

  30 Monitor <br>
  31 Televisor <br>
  32 Teclado <br>
  33 Mouse <br>
  34 Camara Web <br>

### SDI

  40 Paneles <br>
  41 Expansoras <br>
  42 Comunicadores <br>
  43 Sensores <br>
  44 Teclados <br>
  45 Sirenas <br>
