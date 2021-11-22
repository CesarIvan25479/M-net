<?php 
include 'Conexion.php';
$nombre=$_POST['nombre'];
$fechaPago=$_POST['fechapago'];
$formaPago=$_POST['formapago'];
$mes=$_POST['mes'];
$numOperacion=$_POST['numoperacion'];
$importe=$_POST['importe'];
$observacion=$_POST['observacion'];
$telefono=$_POST['telefono'];
$poblacion=$_POST['poblacion'];
setlocale(LC_ALL,"es_ES");

$Mes=strftime("%b %Y");
$Mes=str_replace(".","",$Mes);
$Mes=strtoupper($Mes);

if($formaPago=='Deposito'){
    if($numOperacion==''){
       echo json_encode('LlenarOpe'); 
    }else{
        $consultaOpe="SELECT * FROM pagosazteca WHERE NumOperacion='$numOperacion'";
        $verificarOpe=mysqli_query($Conexion,$consultaOpe);
        $counter=mysqli_num_rows($verificarOpe);
        if($counter==1){
            echo json_encode('ErrorOperacion');
        }else{
            if($mes != 'OTRO'){
                $consultaVer="SELECT * FROM `pagosazteca` WHERE Nombre='$nombre' AND Mes='$mes'";
                $verificar=mysqli_query($Conexion,$consultaVer);
                $counter=mysqli_num_rows($verificar);
                if($counter==1){
                    echo json_encode('ErrorMes');
                }else{
                    $consulta="INSERT INTO pagosazteca (id, Nombre, FechaPago, Mes, Importe, NumOperacion, FormaPago, Observacion, Telefono, Poblacion, Estado) VALUES (NULL, '$nombre', '$fechaPago', '$mes', '$importe', '$numOperacion', '$formaPago', '$observacion', '$telefono', '$poblacion', 'PENDIENTE')";
                    $registrar = mysqli_query($Conexion,$consulta);
                    if($registrar){
                        session_start();
                        $_SESSION['estados']="PENDIENTE";
                        $_SESSION['meses']=$Mes;
                        echo json_encode('Registrado');
                    }
                }
            }else{
                $consulta="INSERT INTO pagosazteca (id, Nombre, FechaPago, Mes, Importe, NumOperacion, FormaPago, Observacion, Telefono, Poblacion, Estado) VALUES (NULL, '$nombre', '$fechaPago', '$mes', '$importe', '$numOperacion', '$formaPago', '$observacion', '$telefono', '$poblacion', 'PENDIENTE')";
                $registrar = mysqli_query($Conexion,$consulta);
                if($registrar){
                    session_start();
                    $_SESSION['estados']="PENDIENTE";
                    $_SESSION['meses']=$Mes;
                    echo json_encode('Registrado');
                }
            }
        }
    }
}else if($formaPago=='Transferencia'){
        $consultaOpe="SELECT * FROM pagosazteca WHERE NumOperacion='$numOperacion' AND NumOperacion!=''";
        $verificarOpe=mysqli_query($Conexion,$consultaOpe);
        $counter=mysqli_num_rows($verificarOpe);
        if($counter==1){
            echo json_encode('ErrorOperacion');
        }else{
            if($mes != 'OTRO'){
            $consultaVer="SELECT * FROM `pagosazteca` WHERE Nombre='$nombre' AND Mes='$mes'";
            $verificar=mysqli_query($Conexion,$consultaVer);
            $counter=mysqli_num_rows($verificar);
            if($counter==1){
                echo json_encode('ErrorMes');
            }else{
                $consulta="INSERT INTO pagosazteca (id, Nombre, FechaPago, Mes, Importe, NumOperacion, FormaPago, Observacion, Telefono, Poblacion, Estado) VALUES (NULL, '$nombre', '$fechaPago', '$mes', '$importe', '$numOperacion', '$formaPago', '$observacion', '$telefono', '$poblacion', 'PENDIENTE')";
                $registrar = mysqli_query($Conexion,$consulta);
                if($registrar){
                    session_start();
                    $_SESSION['estados']="PENDIENTE";
                    $_SESSION['meses']=$Mes;
                echo json_encode('Registrado');
                }
            }
            }else{
                $consulta="INSERT INTO pagosazteca (id, Nombre, FechaPago, Mes, Importe, NumOperacion, FormaPago, Observacion, Telefono, Poblacion, Estado) VALUES (NULL, '$nombre', '$fechaPago', '$mes', '$importe', '$numOperacion', '$formaPago', '$observacion', '$telefono', '$poblacion', 'PENDIENTE')";
                $registrar = mysqli_query($Conexion,$consulta);
                if($registrar){
                    session_start();
                    $_SESSION['estados']="PENDIENTE";
                    $_SESSION['meses']=$Mes;
                    echo json_encode('Registrado');
                }
            }
        }
    
}else if($formaPago=='Efectivo Almoloya'){
        if($mes != 'OTRO'){
            $consultaVer="SELECT * FROM `pagosazteca` WHERE Nombre='$nombre' AND Mes='$mes'";
            $verificar=mysqli_query($Conexion,$consultaVer);
            $counter=mysqli_num_rows($verificar);
            if($counter==1){
                echo json_encode('ErrorMes');
            }else{
                $consulta="INSERT INTO pagosazteca (id, Nombre, FechaPago, Mes, Importe, NumOperacion, FormaPago, Observacion, Telefono, Poblacion, Estado) VALUES (NULL, '$nombre', '$fechaPago', '$mes', '$importe', '$numOperacion', '$formaPago', '$observacion', '$telefono', '$poblacion', 'PENDIENTE')";
                $registrar = mysqli_query($Conexion,$consulta);
                if($registrar){
                    session_start();
                    $_SESSION['estados']="PENDIENTE";
                    $_SESSION['meses']=$Mes;
                echo json_encode('Registrado');
                }
            }
        }else{
                $consulta="INSERT INTO pagosazteca (id, Nombre, FechaPago, Mes, Importe, NumOperacion, FormaPago, Observacion, Telefono, Poblacion, Estado) VALUES (NULL, '$nombre', '$fechaPago', '$mes', '$importe', '$numOperacion', '$formaPago', '$observacion', '$telefono', '$poblacion', 'PENDIENTE')";
                $registrar = mysqli_query($Conexion,$consulta);
                if($registrar){
                    session_start();
                    $_SESSION['estados']="PENDIENTE";
                    $_SESSION['meses']=$Mes;
                    echo json_encode('Registrado');
                }
            }
}

?>