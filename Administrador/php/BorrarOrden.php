<?php
include "Conexion.php";
$folio = $_POST['folio'];
$data = array();
$consulta = "DELETE FROM ordenes WHERE Folio='$folio'";
if(mysqli_query($Conexion,$consulta)){
    $data["estado"] = "si";
    echo json_encode($data);
}else{
    $data["estado"] = "no";
    echo json_encode($data);
}

?>