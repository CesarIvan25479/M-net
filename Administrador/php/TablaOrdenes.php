<?php
$infor= array();
include 'Conexion.php';
$contador=0;
$consulta = "SELECT  *FROM ordenes";
$resultado = mysqli_query($Conexion,$consulta);    
while($datos = mysqli_fetch_array($resultado)){ 
    $infor[] = $datos;  
}
$infor['estado'] ='si';
header("Content-type: application/json; charset=utf-8");
echo json_encode($infor);
?>