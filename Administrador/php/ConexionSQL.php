<?php
/*$servidor = '192.168.3.102\SQLEXPRESS,1400';
$infoConex = array("Database" => "C:\MyBusinessDatabase\MyBusinessPOS2011.mdf","UID" => "CesarIvan", "PWD" => "123456789","CharacterSet" => "UTF-8");
$Conn=sqlsrv_connect($servidor, $infoConex);
if( $Conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}*/
$servidor = '192.168.3.21\SQLEXPRESS,1400';
$infoConex = array("Database" => "C:\MyBusinessDatabase\MyBusinessPOS2011_cli.mdf","UID" => "Inicio001", "PWD" => "123456789","CharacterSet" => "UTF-8");
$Conn=sqlsrv_connect($servidor, $infoConex);

/* = '25.4.83.205\SQLEXPRESS,1433';
$infoConex = array("Database" => "C:\MyBusinessDatabase\MyBusinessPOS2011_cli.mdf","UID" => "Inicio2021", "PWD" => "CEsarivan123","CharacterSet" => "UTF-8");
$Conn=sqlsrv_connect($servidor, $infoConex);*/
?>