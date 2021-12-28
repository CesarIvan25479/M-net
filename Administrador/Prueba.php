<?php
include '/php/Api Mikrotik.php';
$ipRouteros="192.168.48.1"; 
$Username="mnet";
$Pass="mnet2020";
$api_puerto=9849;
$API = new routeros_api();
$API->debug = false;
if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
    $API->write("/system/ident/getall",true);                           $READ = $API->read(false);
    $ARRAY = $API->comm("/system/telnet",
    array("address"=>'172.16.28.2',"user name" =>'edmundom',"user password"=>'mundo16--'));  
    echo "conectado";
}else{
    echo "No conectado";
}
?>
