<?php

use Illuminate\Database\Seeder;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Computadoras
        DB::table('hosts')->insert(['departament_id' => 2,'host_type_id' => 1,'name' => 'COP_01','mac_adress' => 'DF-55-89-AA-AB-AC','ip_local' => '192.168.0.101','modelo_id' => 1,'serial' => 'JSJDN9539854','valor' => 7500,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 2,'host_type_id' => 1,'name' => 'COP_02','mac_adress' => 'DF-55-89-AA-AB-AC','ip_local' => '192.168.0.102','modelo_id' => 1,'serial' => 'JSJDN95345214','valor' => 8500,'estado_id' => 2]);
        DB::table('hosts')->insert(['departament_id' => 2,'host_type_id' => 2,'name' => 'NB_03','mac_adress' => 'DF-55-89-AA-AB-AC','ip_local' => '192.168.0.103','modelo_id' => 1,'serial' => 'JSJDN95453214','valor' => 9500,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 3,'host_type_id' => 1,'name' => 'NB_TESO01','mac_adress' => 'DF-55-89-AA-AB-AC','ip_local' => '192.168.0.104','modelo_id' => 1,'serial' => 'JSJDN95321499','valor' => 7500,'estado_id' => 1]);

        //Impresoras
        DB::table('hosts')->insert(['departament_id' => 3,'host_type_id' => 3,'name' => 'PRINT_TESO_01','mac_adress' => 'DF-55-89-AA-AB-AC','ip_local' => '192.168.0.105','modelo_id' => 1,'serial' => 'JSJDN9539854','valor' => 1200,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 3,'name' => 'PRINT_AMD_01','mac_adress' => 'DF-55-89-AA-AB-AC','ip_local' => '192.168.0.106','modelo_id' => 2,'serial' => 'JSJDN95345214','valor' => 1000,'estado_id' => 2]);
        DB::table('hosts')->insert(['departament_id' => 2,'host_type_id' => 3,'name' => 'PRINT_LIQ_01','mac_adress' => 'DF-55-89-AA-AB-AC','ip_local' => '192.168.0.107','modelo_id' => 5,'serial' => 'JSJDN95453214','valor' => 900,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 3,'name' => 'PRINT_COP02','mac_adress' => 'DF-55-89-AA-AB-AC','ip_local' => '192.168.0.108','modelo_id' => 6,'serial' => 'JSJDN95321499','valor' => 1700,'estado_id' => 2]);

        //Telefonos IP

        DB::table('hosts')->insert(['departament_id' => 3,'host_type_id' => 4,'name' => 'TEL-TESO01','mac_adress' => 'DF-55-89-AA-AB-AC','interno' => 104, 'ip_local' => '192.168.0.109','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 2500,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 4,'name' => 'TEL-ADM01','mac_adress' => 'DF-55-89-AA-AB-AC','interno' => 105, 'ip_local' => '192.168.0.110','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 3000,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 4,'name' => 'TEL-IT01','mac_adress' => 'DF-55-89-AA-AB-AC','interno' => 106, 'ip_local' => '192.168.0.111','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 3000,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 4,'name' => 'TEL-ADM02','mac_adress' => 'DF-55-89-AA-AB-AC','interno' => 104, 'ip_local' => '192.168.0.112','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 3000,'estado_id' => 1]);

        //Modems

        DB::table('hosts')->insert(['departament_id' => 3,'host_type_id' => 10,'name' => 'M-LAPIDA','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_publica' => '181.233.15.10','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 10,'name' => 'M-LOG','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_publica' => '191.233.77.10','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);

    		//Routers

    		DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 11,'name' => 'R-LAPIDA','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.100','acceso' => 'https://192.168.0.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
    		DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 11,'name' => 'R-RRHH','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.20.100','acceso' => 'https://192.168.20.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
    		DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 11,'name' => 'R-ADM','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.10.100','acceso' => 'https://192.168.10.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);

        //Switch

        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 12,'name' => 'SW-LAPIDA','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.113','acceso' => 'https://192.168.0.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 3,'host_type_id' => 12,'name' => 'SW-RRHH','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.114','acceso' => 'https://192.168.20.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 12,'name' => 'SW-ADM','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.115','acceso' => 'https://192.168.10.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        //AccesPoint

        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 13,'name' => 'AP_LAPIDA','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.114','ssids' => 'SAB5S','ssid_pass' => 'sec*7531','acceso' => 'https://192.168.0.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 13,'name' => 'AP-RRHH','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.115','ssids' => 'SAB5S','ssid_pass' => 'sec*7531','acceso' => 'https://192.168.20.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 5,'host_type_id' => 13,'name' => 'AP-ADM','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.116','ssids' => 'SAB5S','ssid_pass' => 'sec*7531','acceso' => 'https://192.168.10.100:4443','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);

        //CamarasIP

        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 20,'name' => 'CAM1-IP','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.115','ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 20,'name' => 'CAM2-IP','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.115','ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 20,'name' => 'CAM3','mac_adress' => 'DF-55-89-AA-AB-AC', 'ip_local' => '192.168.0.115','ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);

        //CamarasAnalog

        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 24,'name' => 'CAM1-A','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 24,'name' => 'CAM2-A','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 24,'name' => 'CAM3-A','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);

        //DVR

        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 21,'name' => 'DVR_01','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 21,'name' => 'DVR_02','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 1,'host_type_id' => 21,'name' => 'DVR_03','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 2,'host_type_id' => 22,'name' => 'NVR_01','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 2,'host_type_id' => 22,'name' => 'NVR_02','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 2,'host_type_id' => 22,'name' => 'NVR_03','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 3,'host_type_id' => 23,'name' => 'XVR_1','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 3,'host_type_id' => 23,'name' => 'XVR_2','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);
        DB::table('hosts')->insert(['departament_id' => 3,'host_type_id' => 23,'name' => 'XVR_3','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1,'ip_publica' => '201.134.245.190','tcp' => 37777,'udp' => 37778,'rtsp' => 554,'http' => 80, 'https' => 443, 'p2p' => '28JKSI283JDJ','acceso' => 'https://google.com.ar','modelo_id' => 6,'serial' => 'YTRL654515','valor' => 0,'estado_id' => 1]);

}

}
