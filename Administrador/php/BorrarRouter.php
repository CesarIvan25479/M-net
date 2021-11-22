<?php
include '../php/Conexion.php';
$id = $_POST["id"];


$consulta = "DELETE FROM router WHERE id = '$id'";
$agregar = mysqli_query($Conexion, $consulta);
if($agregar){
    echo true;
}
    

?>