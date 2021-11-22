
<?php
session_start();
$cliente=$_POST['cliente'];
$Fecha=$_POST['FechaCliente'];
$Opcion = $_POST['opcion'];
$Fecha=str_replace("-","",$Fecha);

if (isset($_POST['TodasFechas']) ){
    if($_POST['TodasFechas'] != ""){
        $todas="20150101";
        if(strlen ($Fecha)>0|| $cliente>0){
            $_SESSION['FechaRepCli']=$todas;
            $_SESSION['Cliente']=$cliente;
            $_SESSION['Opcion'] = $Opcion;
            echo json_encode('Si');
        }else{
            echo json_encode('No');
        }
    }
}else{
    if(strlen ($Fecha)>0|| $cliente>0){
        $_SESSION['FechaRepCli']=$Fecha;
        $_SESSION['Cliente']=$cliente;
        $_SESSION['Opcion'] = $Opcion;
        echo json_encode('Si');
    }else{
        echo json_encode('No');
    }
}


?>
