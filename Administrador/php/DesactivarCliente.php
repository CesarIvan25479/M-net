<?php 
set_time_limit(0);
$data = array();
require_once "../php/Conexion.php";
include '../php/Api Mikrotik.php';
require_once "../php/ConexionSQLC.php";
$clave = $_POST['clave'];

$consulta2 = "SELECT C.CLIENTE, C.PRECIO, C.ZONA, C.TIPO, C.NOMBRE FROM clients C INNER JOIN ventas V ON C.CLIENTE=V.CLIENTE where C.CLIENTE='$clave'";
$resultado2 = sqlsrv_query($Conn, $consulta2);
$infoCliente = sqlsrv_fetch_array($resultado2);
$zona = $infoCliente['ZONA'];
$tipo = $infoCliente['TIPO'];

$consulta3 =$Conexion ->query("SELECT *FROM router WHERE FIND_IN_SET('$zona', Zonas) AND Tipo='$tipo'");
$infoRouter = $consulta3 ->fetch_assoc();
$Velocidad = '1K/1K';
$ipRouteros=$infoRouter['IP']; 
$Username=$infoRouter['Usuario'];
$Pass=$infoRouter['Pwd'];        
$api_puerto=$infoRouter['PuertoAPI'];

$data['estado'] = 'si';
$data['infoRouter'] = $infoRouter;
$data['velocidad'] = $Velocidad;
$data['infoCliente'] = $infoCliente['CLIENTE'];
echo json_encode($data);
?>