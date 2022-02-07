<?php
include 'ConexionSQL.php';
$clave = $_POST['clave'];
$data = array();
$consulta="SELECT CLIENTE, NOMBRE, ESTADO, CP, POBLA, COLONIA, CALLE, NUMERO, TELEFONO, TIPO, ZONA, PRECIO, OBSERV FROM clients WHERE CLIENTE='$clave'";
$resultado = sqlsrv_query($Conn, $consulta);
$info = sqlsrv_fetch_array($resultado);
$data['estado'] = 'si';
$data['infoclie'] = $info;
echo json_encode($data);
?>