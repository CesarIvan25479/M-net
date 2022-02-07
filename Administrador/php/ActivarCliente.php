<?php
set_time_limit(0);
$data = array();
require_once "../php/Conexion.php";
include '../php/Api Mikrotik.php';
require_once "../php/ConexionSQLC.php";
$OpcionCorte=false;

$clave = $_POST['clave'];

$consulta2 = "SELECT C.CLIENTE, C.PRECIO, C.ZONA, C.TIPO, C.NOMBRE FROM clients C INNER JOIN ventas V ON C.CLIENTE=V.CLIENTE where C.CLIENTE='$clave'";
$resultado2 = sqlsrv_query($ConnC, $consulta2);
$infoCliente = sqlsrv_fetch_array($resultado2);
$zona = $infoCliente['ZONA'];
$tipo = $infoCliente['TIPO'];

$consulta3 =$Conexion ->query("SELECT *FROM router WHERE FIND_IN_SET('$zona', Zonas) AND Tipo='$tipo'");
$infoRouter = $consulta3 ->fetch_assoc();

if($tipo == "BAJA"){
    $data['estado']= 'si';
    $data['infoCliente'] = "BAJA";
    echo json_encode($data);
}else{
    
    $Velocidad = '';
    $ipRouteros=$infoRouter['IP']; 
    $Username=$infoRouter['Usuario'];
    $Pass=$infoRouter['Pwd'];        
    $api_puerto=$infoRouter['PuertoAPI'];

    if($tipo == 'INA'){
        if($zona == 'SM' || $zona == 'SL' || $zona == 'GB' || $zona == 'SJAT' || $zona == 'SAN' || $zona == 'LES' || $zona== 'COYO'){

            switch($infoCliente['PRECIO']){
                case 5:
                    $Velocidad = '3M/6M';  
                break;
                case 4:
                    $Velocidad = '5M/9M';  
                break;
                case 1:
                    $Velocidad = '5M/10M';  
                break;
                case 2:
                    $Velocidad = '5M/10M';  
                break;
                case 7:
                    $Velocidad = '3M/6M';  
                break;
            }  
        }else{
            switch($infoCliente['PRECIO']){
                case 1:
                    $Velocidad = '15M/30M';  
                break;
                case 2:
                    $Velocidad = '10M/20M';  
                break;
                case 3:
                    $Velocidad = '6M/12M';  
                    break;
                case 4:
                    $Velocidad = '5M/9M';  
                break;
                case 5:
                    $Velocidad = '3M/6M';  
                break;
                case 6:
                    $Velocidad = '3M/6M';  
                break;
                case 7:
                    $Velocidad = '3M/6M';  
                break;
                case 8:
                    $Velocidad = '15M/30M';  
                    break;
                case 9:
                    $Velocidad = '10M/15M';  
                    break;
                case 10:
                    $Velocidad = '25M/50M';  
                break;
            }
        
        }
}else if($tipo == 'IFO' and $ipRouteros=='192.168.48.1'){
     switch($infoCliente['PRECIO']){
        case 4:
            $Velocidad = '15M/15M';  
        break;
        case 3:
            $Velocidad = '15M/25M';  
        break;
        case 2:
            $Velocidad = '15M/35M';  
        break;
        case 8:
            $Velocidad = '15M/50M';  
        break;
    } 
    $OpcionCorte = true;
}else{
    switch($infoCliente['PRECIO']){
        case 4:
            $Velocidad = '15M/15M';  
        break;
        case 3:
            $Velocidad = '15M/25M';  
        break;
        case 2:
            $Velocidad = '15M/35M';  
        break;
        case 8:
            $Velocidad = '15M/50M';  
        break;
    } 
}
$data['estado'] = 'si';
$data['infoRouter'] = $infoRouter;
$data['velocidad'] = $Velocidad;
$data['infoCliente'] = $infoCliente['CLIENTE'];
if ($OpcionCorte == true){
    $API = new routeros_api();
    $API->debug = false;
    if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
        $API->write("/system/ident/getall",true);
        $READ = $API->read(false);
        $ARRAY = $API->comm("/queue/simple/disable",  
        array("numbers"=>$infoCliente['NOMBRE']));
        $ARRAY = $API->comm("/queue/simple/set",  
        array("numbers"=>$infoCliente['NOMBRE'],"max-limit" =>$Velocidad));
    }else{ 
        $data['estado'] ='no';
        $data['infoRouter'] = $infoRouter;
    }
}else {
    $API = new routeros_api();
    $API->debug = false;
    if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
        $API->write("/system/ident/getall",true);
        $READ = $API->read(false);
        $ARRAY = $API->comm("/queue/simple/set",  
        array("numbers"=>$infoCliente['NOMBRE'],"max-limit" =>$Velocidad)); }
    else{ 
        $data['estado'] ='no';
        $data['infoRouter'] = $infoRouter;
    }
}

echo json_encode($data);
}
?>