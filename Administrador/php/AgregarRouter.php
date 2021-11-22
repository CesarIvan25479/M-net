<?php
include '../php/Conexion.php';
$nombre = $_POST["Nombre"];
$ip = $_POST["IP"];
$usuario = $_POST["Usuario"];
$pwd = $_POST["PWD"];
$puerto = $_POST["PuertoAPI"];
$rangos = $_POST["RangoIP"];
$tipo = $_POST["TipoRouter"];
if($nombre == '' || $ip == '' || $usuario == '' || $pwd == '' || $puerto ==''){
    echo json_encode("LLenar");
}else{
    $consulta = "INSERT INTO router (id, Nombre, IP, Usuario, Pwd, PuertoAPI, Zonas, Tipo) VALUES (NULL,'$nombre','$ip','$usuario','$pwd','$puerto','$rangos', '$tipo')";
    $agregar = mysqli_query($Conexion, $consulta);
    if($agregar){
    echo json_encode("Agregado");
}
    
}

?>