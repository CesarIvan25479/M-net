<?php
include "Conexion.php";
$cliente = $_POST["cliente"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$correo2 = $_POST["correo2"];
$formpago = $_POST["formpago"];
$cfdi = $_POST["cfdi"];
$pago = $_POST["pago"];

if ($cliente == "" || $nombre == "" || $correo == "" || $formpago == "" || $cfdi == "" || $pago == ""){
    echo "llena";
}else{
    $consulta = "INSERT INTO facturascliente (Cliente, Nombre, Correo, Correo2, FormaPago, CFDI, Importe) 
    VALUES ('$cliente', '$nombre', '$correo', '$correo2', '$formpago', '$cfdi', '$pago')";
    $resultado = mysqli_query($Conexion, $consulta);
    if($resultado){
        echo true;
    }
}
