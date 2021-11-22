<?php 
include 'Conexion.php';
$id=$_POST['idpago'];
$nombre=$_POST['nombre'];
$fechaPago=$_POST['fechapago'];
$formaPago=$_POST['formapago'];
$mes=$_POST['mes'];
$numOperacion=$_POST['numoperacion'];
$importe=$_POST['importe'];
$observacion=$_POST['observacion'];
$telefono=$_POST['telefono'];
$poblacion=$_POST['poblacion'];
$mesVer="";
$formaPagoVer="";
$consulta = "SELECT *FROM pagosazteca WHERE id='$id'";
$resultado = mysqli_query($Conexion,$consulta);    
while($datos = mysqli_fetch_array($resultado)){ 
    $mesVer=$datos["Mes"];
    $formaPagoVer=$datos["FormaPago"];
    $numOperacionVer=$datos["NumOperacion"];
}


if($mesVer===$mes){
    if($formaPagoVer===$formaPago){
        if($numOperacionVer===$numOperacion){
            $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
            $registrar = mysqli_query($Conexion,$consulta);
            if($registrar){
                echo json_encode('Actualizado');
            }
        }else{
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
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
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
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                }
                
            }
        }
        
        }else{
            if($formaPago=='Deposito'){
                if($numOperacion==''){
                    echo json_encode('LlenarOpe'); 
                }else{
                    if($numOperacionVer===$numOperacion){
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                    }else{
                        $consultaOpe="SELECT * FROM pagosazteca WHERE NumOperacion='$numOperacion'";
                        $verificarOpe=mysqli_query($Conexion,$consultaOpe);
                        $counter=mysqli_num_rows($verificarOpe);
                        if($counter==1){
                            echo json_encode('ErrorOperacion');
                        }else{
                            $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                            $registrar = mysqli_query($Conexion,$consulta);
                            if($registrar){
                                echo json_encode('Actualizado');
                            }
                        }
                    }
                }
            }else if($formaPago=='Transferencia'){
                if($numOperacionVer===$numOperacion){
                    $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe =     '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                     $registrar = mysqli_query($Conexion,$consulta);
                    if($registrar){
                         echo json_encode('Actualizado');
                    }
                }else{
                    $consultaOpe="SELECT * FROM pagosazteca WHERE NumOperacion='$numOperacion' AND NumOperacion!=''";
                    $verificarOpe=mysqli_query($Conexion,$consultaOpe);
                    $counter=mysqli_num_rows($verificarOpe);
                    if($counter==1){
                        echo json_encode('ErrorOperacion');
                    }else{
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe =    '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                    }
                }
            }else if($formaPago=='Efectivo Almoloya'){
                $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                $registrar = mysqli_query($Conexion,$consulta);
                if($registrar){
                echo json_encode('Actualizado');
                }
            }
        
        
    }
}else{
    if($mes != 'OTRO'){
        $consultaVer="SELECT * FROM `pagosazteca` WHERE Nombre='$nombre' AND Mes='$mes'";
        $verificar=mysqli_query($Conexion,$consultaVer);
        $counter=mysqli_num_rows($verificar);
        if($counter==1){
            echo json_encode('ErrorMes');
        }else{
            if($formaPagoVer===$formaPago){
        if($numOperacionVer===$numOperacion){
            $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
            $registrar = mysqli_query($Conexion,$consulta);
            if($registrar){
                echo json_encode('Actualizado');
            }
        }else{
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
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
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
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                }
                
            }
        }
        
        }else{
            if($formaPago=='Deposito'){
                if($numOperacion==''){
                    echo json_encode('LlenarOpe'); 
                }else{
                    if($numOperacionVer===$numOperacion){
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                    }else{
                        $consultaOpe="SELECT * FROM pagosazteca WHERE NumOperacion='$numOperacion'";
                        $verificarOpe=mysqli_query($Conexion,$consultaOpe);
                        $counter=mysqli_num_rows($verificarOpe);
                        if($counter==1){
                            echo json_encode('ErrorOperacion');
                        }else{
                            $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                            $registrar = mysqli_query($Conexion,$consulta);
                            if($registrar){
                                echo json_encode('Actualizado');
                            }
                        }
                    }
                }
            }else if($formaPago=='Transferencia'){
                if($numOperacionVer===$numOperacion){
                    $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe =     '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                     $registrar = mysqli_query($Conexion,$consulta);
                    if($registrar){
                         echo json_encode('Actualizado');
                    }
                }else{
                    $consultaOpe="SELECT * FROM pagosazteca WHERE NumOperacion='$numOperacion' AND NumOperacion!=''";
                    $verificarOpe=mysqli_query($Conexion,$consultaOpe);
                    $counter=mysqli_num_rows($verificarOpe);
                    if($counter==1){
                        echo json_encode('ErrorOperacion');
                    }else{
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe =    '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                    }
                }
            }else if($formaPago=='Efectivo Almoloya'){
                $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                $registrar = mysqli_query($Conexion,$consulta);
                if($registrar){
                echo json_encode('Actualizado');
                }
            }
        
        
    }
        }
    }else{
        if($formaPagoVer===$formaPago){
        if($numOperacionVer===$numOperacion){
            $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
            $registrar = mysqli_query($Conexion,$consulta);
            if($registrar){
                echo json_encode('Actualizado');
            }
        }else{
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
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
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
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                }
                
            }
        }
        
        }else{
            if($formaPago=='Deposito'){
                if($numOperacion==''){
                    echo json_encode('LlenarOpe'); 
                }else{
                    if($numOperacionVer===$numOperacion){
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                    }else{
                        $consultaOpe="SELECT * FROM pagosazteca WHERE NumOperacion='$numOperacion'";
                        $verificarOpe=mysqli_query($Conexion,$consultaOpe);
                        $counter=mysqli_num_rows($verificarOpe);
                        if($counter==1){
                            echo json_encode('ErrorOperacion');
                        }else{
                            $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                            $registrar = mysqli_query($Conexion,$consulta);
                            if($registrar){
                                echo json_encode('Actualizado');
                            }
                        }
                    }
                }
            }else if($formaPago=='Transferencia'){
                if($numOperacionVer===$numOperacion){
                    $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe =     '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                     $registrar = mysqli_query($Conexion,$consulta);
                    if($registrar){
                         echo json_encode('Actualizado');
                    }
                }else{
                    $consultaOpe="SELECT * FROM pagosazteca WHERE NumOperacion='$numOperacion' AND NumOperacion!=''";
                    $verificarOpe=mysqli_query($Conexion,$consultaOpe);
                    $counter=mysqli_num_rows($verificarOpe);
                    if($counter==1){
                        echo json_encode('ErrorOperacion');
                    }else{
                        $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe =    '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                        $registrar = mysqli_query($Conexion,$consulta);
                        if($registrar){
                            echo json_encode('Actualizado');
                        }
                    }
                }
            }else if($formaPago=='Efectivo Almoloya'){
                $consulta="UPDATE pagosazteca SET FechaPago = '$fechaPago', Mes = '$mes', Importe = '$importe', NumOperacion = '$numOperacion', FormaPago = '$formaPago', Observacion = '$observacion', Telefono = '$telefono', Poblacion = '$poblacion' WHERE id=$id";
                $registrar = mysqli_query($Conexion,$consulta);
                if($registrar){
                echo json_encode('Actualizado');
                }
            }
        
        
    }
    }
}

    
?>

