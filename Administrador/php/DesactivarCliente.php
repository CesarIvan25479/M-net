<?php 
set_time_limit(0);
$data = array();
require_once "../php/Conexion.php";
include '../php/Api Mikrotik.php';
require_once "../php/ConexionSQLC.php";
$clave = $_POST['clave'];

$consulta2 = "SELECT C.CLIENTE, C.PRECIO, C.ZONA, C.TIPO, C.NOMBRE FROM clients C INNER JOIN ventas V ON C.CLIENTE=V.CLIENTE where C.CLIENTE='$clave'";
$resultado2 = sqlsrv_query($ConnC, $consulta2);
$infoCliente = sqlsrv_fetch_array($resultado2);
$zona = $infoCliente['ZONA'];
$tipo = $infoCliente['TIPO'];

$consulta3 =$Conexion ->query("SELECT *FROM router WHERE FIND_IN_SET('$zona', Zonas) AND Tipo='$tipo'");
$infoRouter = $consulta3 ->fetch_assoc();

if($tipo != "BAJA"){
    
    $Velocidad = '1K/1K';
    $ipRouteros=$infoRouter['IP']; 
    $Username=$infoRouter['Usuario'];
    $Pass=$infoRouter['Pwd'];        
    $api_puerto=$infoRouter['PuertoAPI'];
    $tipo = $infoRouter['Tipo'];
    $data['estado'] = 'si';
    $data['infoRouter'] = $infoRouter;
    $data['velocidad'] = $Velocidad;
    $data['infoCliente'] = $infoCliente['CLIENTE'];

    $API = new routeros_api();
    $API->debug = false;
    if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
    $API->write("/system/ident/getall",true);
    $READ = $API->read(false);
    $ARRAY = $API->comm("/queue/simple/enable",
    array("numbers"=>$infoCliente['NOMBRE']));   
    $ARRAY = $API->comm("/queue/simple/set",  
    array("numbers"=>$infoCliente['NOMBRE'],"max-limit" =>'1K/1K'));
    
}else{
    $data['estado'] ='no';
    $data['infoRouter'] = $infoRouter;
}
echo json_encode($data);
}else{
    $data['estado']= 'si';
    $data['infoCliente'] = "BAJA";
    echo json_encode($data);
}


?>