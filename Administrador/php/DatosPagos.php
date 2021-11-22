<?php
session_start();
$estatus=$_POST['Estatus'];
$mes=$_POST['meses'];

if (isset($_POST['TodosMeses'])){
    if($_POST['TodosMeses'] != ""){
        if(strlen ($estatus)>0|| $mes>0){
            $_SESSION['estados']=$estatus;
            $_SESSION['meses']="";
            echo json_encode('Si');
        }else{
            echo json_encode('No');
        }
    }
}else{
    if(strlen ($estatus)>0|| $mes>0){
        $_SESSION['estados']=$estatus;
        $_SESSION['meses']=$mes;
        echo json_encode('Si');
    }else{
        echo json_encode('No');
    }
}


?>


