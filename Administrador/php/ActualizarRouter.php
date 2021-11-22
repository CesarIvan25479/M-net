<?php
include '../php/Conexion.php';
$nombre = $_POST["Nombre"];
$ip = $_POST["IP"];
$usuario = $_POST["Usuario"];
$pwd = $_POST["PWD"];
$puerto = $_POST["PuertoAPI"];
$rangos = $_POST["RangoIP"];
$id = $_POST['idRouter'];
$tipo = $_POST["TipoRouter"];
if($nombre == '' || $ip == '' || $usuario == '' || $pwd == '' || $puerto ==''){
    echo json_encode("LLenar");
}else{
    $consulta = "UPDATE router SET Nombre='$nombre', IP='$ip', Usuario='$usuario', Pwd='$pwd', PuertoAPI='$puerto', Zonas='$rangos', Tipo='$tipo' WHERE id='$id'";
    $agregar = mysqli_query($Conexion, $consulta);
    if($agregar){
    echo json_encode("Agregado");
}
    
}

?>