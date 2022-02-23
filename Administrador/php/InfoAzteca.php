<?php
include "ConexionSQL.php";
$ClaveCli = $_POST["cliente"];
$data = array();

$consulta="SELECT NOMBRE, COLONIA,TELEFONO, TIPO FROM clients WHERE CLIENTE='$cliente'";
$resultado = sqlsrv_query($Conn, $consulta);
while($NombreCliente = sqlsrv_fetch_array($resultado))
$data['estado'] = "si";
echo json_encode($data); 

?>