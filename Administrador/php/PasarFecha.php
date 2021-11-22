<?php 
session_start();
$fecha = $_POST['FechaRep'];
$fecha = str_replace('-','',$fecha);
if(strlen ($fecha) > 0){
    $_SESSION['FechaReporte'] = $fecha;
    echo json_encode($_SESSION['FechaReporte']);
}else {
    echo json_encode('no');
}
?>