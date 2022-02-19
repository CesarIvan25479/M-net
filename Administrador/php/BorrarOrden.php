<?php
include "Conexion.php";
$folio = $_POST['folio'];
$Destino = $_SERVER['DOCUMENT_ROOT'] . '/M-net/Imagenes/';
$data = array();

$consulta2 = "SELECT ImgOrden, ImgCredencial FROM ordenes WHERE folio='$folio'";
$resultado = mysqli_query($Conexion,$consulta2);
$datoimg = mysqli_fetch_array($resultado);

$consulta = "DELETE FROM ordenes WHERE Folio='$folio'";
if(mysqli_query($Conexion,$consulta)){
    unlink($Destino.$datoimg['ImgOrden']);
    unlink($Destino.$datoimg['ImgCredencial']);
    $data["estado"] = "si";
    echo json_encode($data);
}else{
    $data["estado"] = "no";
    echo json_encode($data);
}

?>