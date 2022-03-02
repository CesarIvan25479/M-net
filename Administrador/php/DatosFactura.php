<?php
include "Conexion.php";
$cliente = $_POST["cliente"];
$datos = array();
$consulta = "SELECT *FROM facturascliente WHERE Cliente='$cliente'";
$resultado = mysqli_query($Conexion, $consulta);

if($resultado){
    $Clientefac = mysqli_fetch_array($resultado);
    $datos["infofac"] = $Clientefac;
    $datos["estado"] ="si";
    echo json_encode($datos);
}



?>