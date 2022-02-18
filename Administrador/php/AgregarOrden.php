<?php

$folio = $_POST['folio'];
$cliente = $_POST['cliente'];
$fechaIn = $_POST['fechains'];
$tipo = $_POST['tipo'];
$insta = $_POST['instalacion'];
$Destino = $_SERVER['DOCUMENT_ROOT'] . '/M-net/Imagenes/';
//Informacion de imagen de la orden
$nombreOr = $_FILES['imagenord']['name'];
$tipoOr = $_FILES['imagenord']['type'];
$tamanoOr = $_FILES['imagenord']["size"];
$ext = pathinfo($nombreOr, PATHINFO_EXTENSION);
$orden = $folio."orden.".$ext;
//Informacion de la imagen de la credencial
$nombreCr = $_FILES['imagencre']['name'];
$tipoCr = $_FILES['imagencre']['type'];
$tamanoCr = $_FILES['imagencre']["size"];
$ext2 = pathinfo($nombreCr, PATHINFO_EXTENSION);
$credencial = $folio."credencial.".$ext2;




if($tamanoOr <=500000 and $tamanoCr <= 500000){
    
    if(($tipoOr == "image/jpeg" || $tipoOr == "image/jpg" || $tipoOr == "image/png" || $tipoOr == "image/gif") and ($tipoCr == "image/jpeg" || $tipoCr == "image/jpg" || $tipoCr == "image/png" || $tipoCr == "image/gif" || $tipoCr == "")){
    
        
        //movemos la imagen del directorio temporal al directorio escogido
        move_uploaded_file($_FILES['imagenord']['tmp_name'],$Destino.$folio."orden.".$ext);
        if($tipoCr == ""){
            $credencial = "";
        }else{
            move_uploaded_file($_FILES['imagencre']['tmp_name'],$Destino.$folio."credencial.".$ext2);
        }
        
        include '../php/Conexion.php';
        $consulta = "INSERT INTO ordenes (Folio, Cliente, FechaIns, Tipo, Instalacion, ImgOrden, ImgCredencial) VALUES ('$folio','$cliente','$fechaIn','$tipo','$insta','$orden','$credencial')";
        $agregar = mysqli_query($Conexion, $consulta);

        if($agregar){
            echo json_encode('Agregado');
        }else{
            echo json_encode('error');
        }
    }else{
        echo json_encode('tipo');
    }
    
    
}else{
    echo json_encode('tamano');
}

?>