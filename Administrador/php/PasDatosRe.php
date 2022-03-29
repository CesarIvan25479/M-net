
<?php
session_start();
include 'ConexionSQL.php';
$cliente=$_POST['cliente'];
$Fecha=$_POST['FechaCliente'];
$Opcion = $_POST['opcion'];
$Fecha=str_replace("-","",$Fecha);
$TodaFechas = $_POST["TodasFechas"];
if ($TodaFechas === "on" ){
    if($_POST['TodasFechas'] != ""){
        $todas="20150101";
        if(strlen ($Fecha)>0|| $cliente>0){
            $_SESSION['FechaRepCli']=$todas;
            $_SESSION['Cliente']=$cliente;
            $_SESSION['Opcion'] = $Opcion;
        }else{
            echo json_encode('No');
        }
    }
}else{
    if(strlen ($Fecha)>0|| $cliente>0){
        $_SESSION['FechaRepCli']=$Fecha;
        $_SESSION['Cliente']=$cliente;
        $_SESSION['Opcion'] = $Opcion;
    }else{
        echo json_encode('No');
    }
}

$consulta = "SELECT  OBSERV, DATOS =
CASE CHARINDEX ('(', OBSERV)
WHEN 0 THEN ''
ELSE SUBSTRING (OBSERV,
CHARINDEX('(',OBSERV)+1,
CHARINDEX(')',OBSERV)-CHARINDEX('(',OBSERV)-1)
END
FROM clients WHERE CLIENTE = '$cliente'";
$resulado = sqlsrv_query($Conn, $consulta);
$Servicios = sqlsrv_fetch_array($resulado);
$servicioTel = substr_count($Servicios["DATOS"], "TEL");
$servicioCam = substr_count($Servicios["DATOS"], "CAM");

if($Servicios["DATOS"] == "" || $Servicios["DATOS"] == null ){
    echo 1;
}else{
    if($servicioTel != 0 && $servicioCam != 0){
        $_SESSION['servicioTel']=$servicioTel;
        $_SESSION['servicioCam']=$servicioCam;
        echo 2;
    }else if($servicioTel == 0 && $servicioCam != 0){
        $_SESSION['servicioCam']=$servicioCam;
        echo 3;
    }else if($servicioTel != 0 && $servicioCam == 0){
        $_SESSION['servicioTel']=$servicioTel;
        echo 4;
    }
}

?>
