<?php
include "ConexionSQL.php";
$ClaveCli = $_POST["cliente"];
$data = array();

$consulta="SELECT NOMBRE, CLIENTE, TELEFONO, COLONIA,PRECIO FROM clients WHERE CLIENTE='$ClaveCli'";
$resultado = sqlsrv_query($Conn, $consulta);
$info = sqlsrv_fetch_array($resultado);
switch ($info['PRECIO']){
    case '1':
        $data['precio'] = "450";
        break;
    case '2':
        $data['precio'] = "400";
        break;
    case '3':
        $data['precio'] = "350";
        break;
    case '4':
        $data['precio'] = "300";
        break;
    case '5':
        $data['precio'] = "250";
        break;
    case '6':
        $data['precio'] = "250";
        break;
    case '7':
        $data['precio'] = "150";
        break;
    case '8':
        $data['precio'] = "500";
        break;
    case '9':
        $data['precio'] = "450";
        break;
    case '10':
        $data['precio'] = "600";
        break;
}
$data['estado'] = "si";
$data['infoclie'] = $info;
echo json_encode($data); 

?>