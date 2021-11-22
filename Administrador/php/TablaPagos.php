<?php
    set_time_limit(0);
    session_start();
    require_once "../php/ConexionSQL.php";
    include '../php/MesActual.php';
    $FechaInCl=$_SESSION['FechaRepCli'];
    $cliente=$_SESSION['Cliente'];
    $Opcion = $_SESSION['Opcion'];
    

if ($Opcion == 'Mostrar'){?>
<div class="row">
	<div class="col-sm-12">
        <?php
        $consulta="SELECT NOMBRE, COLONIA,TELEFONO, TIPO FROM clients WHERE CLIENTE='$cliente'";
        $resultado = sqlsrv_query($Conn, $consulta);
        while($NombreCliente = sqlsrv_fetch_array($resultado)){?>
        
        <div class="col-md-12">
                    <h5><?php echo $NombreCliente['NOMBRE']; ?> <small> <?php echo $NombreCliente['TELEFONO']," ", $NombreCliente['COLONIA']," ",$NombreCliente['TIPO'] ; }?></small></h5>
        </div>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>DOC</th>
                    <th>F. EM</th>
                    <th>MES-AÑO</th>            
                    <th>CLAVE</th>
                    <th>DESC.</th>
                    <th>TOTAL</th>            
                </tr>
            </thead>
            <?php
            date_default_timezone_set('America/Mexico_City');
            $FechaActual=date('Ymd');
            $consulta2 = "SELECT P.OBSERV ,V.NO_REFEREN, C.NOMBRE, F_EMISION, V.IMPORTE, V.TIPO_DOC,
                         P.ARTICULO,V.comodin FROM clients C 
                         INNER JOIN ventas V ON 
                         C.CLIENTE=V.CLIENTE INNER JOIN
                         partvta P ON V.VENTA=P.VENTA WHERE C.CLIENTE='$cliente' AND V.F_EMISION BETWEEN '$FechaInCl' AND '$FechaActual' AND ARTICULO='RI' AND V.TIPO_DOC!='PE' order by V.F_EMISION  asc";
            $resultado2 = sqlsrv_query($Conn , $consulta2);    
            while($DatosPagos = sqlsrv_fetch_array($resultado2)){ 
                $result =$DatosPagos['F_EMISION']->format('d-m-Y');?>
                <tr class="table-primary">
                    <td><?php echo $DatosPagos["TIPO_DOC"],$DatosPagos["NO_REFEREN"]; ?></td>
                    <td><?php echo $result; ?></td>
                    <td><?php echo $DatosPagos["comodin"]; ?></td>
                    <td><?php echo $DatosPagos["ARTICULO"]; ?></td>
                    <td><?php echo $DatosPagos["OBSERV"]; ?></td>
                    <td><?php echo $DatosPagos["IMPORTE"]; ?></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php  $_SESSION['Opcion'] = ''; }else if('Mostrar y Activar'){
require_once "../php/ConexionSQLC.php";
$consulta2 = "SELECT C.CLIENTE, C.PRECIO, V.comodin, C.ZONA, C.TIPO, C.NOMBRE FROM clients C INNER JOIN ventas V ON C.CLIENTE=V.CLIENTE where C.CLIENTE='$cliente' and V.comodin='$MesActual' AND V.TIPO_DOC!='PE'";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$resultado2 = sqlsrv_query($ConnC, $consulta2, $params, $options);
$DatosActivar = sqlsrv_fetch_array($resultado2);
$VerificaPago = sqlsrv_num_rows( $resultado2 );
$zona = $DatosActivar['ZONA'];
$tipo = $DatosActivar['TIPO'];


if($VerificaPago >= 1){
    require_once "../php/Conexion.php";
    include '../php/Api Mikrotik.php';
    $consulta3 = "SELECT *FROM router WHERE FIND_IN_SET('$zona', Zonas) AND Tipo='$tipo'";
    $resultado3 = mysqli_query($Conexion, $consulta3);
    $DatosRouter = mysqli_fetch_array($resultado3);
    $Velocidad = '';
    
    
    $ipRouteros=$DatosRouter['IP']; 
    $Username=$DatosRouter['Usuario'];
    $Pass=$DatosRouter['Pwd'];        
    $api_puerto=$DatosRouter['PuertoAPI'];
    if($zona == 'SM' || $zona == 'SL' || $zona == 'GB' || $zona == 'SJAT' || $zona == 'SAN' || $zona == 'LES'){
     
        switch($DatosActivar['PRECIO']){
            case 5:
                $Velocidad = '3M/6M';  
                break;
            case 4:
                $Velocidad = '3M/6M';  
                break;
            case 1:
                $Velocidad = '5M/10M';  
                break;
            case 2:
                $Velocidad = '5M/10M';  
                break;
            case 7:
                $Velocidad = '3M/6M';  
                break;
        }  
    }else{
        switch($DatosActivar['PRECIO']){
            case 1:
                $Velocidad = '15M/30M';  
                break;
            case 2:
                $Velocidad = '10M/20M';  
                break;
            case 3:
                $Velocidad = '6M/12M';  
                break;
            case 4:
                $Velocidad = '5M/9M';  
                break;
            case 5:
                $Velocidad = '3M/6M';  
                break;
            case 6:
                $Velocidad = '3M/6M';  
                break;
            case 7:
                $Velocidad = '3M/6M';  
                break;
            case 8:
                $Velocidad = '15M/30M';  
                break;
            case 9:
                $Velocidad = '10M/15M';  
                break;
            case 10:
                $Velocidad = '25M/50M';  
                break;
            
        }
    }
    
    $API = new routeros_api();
    $API->debug = false;
    if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
        $API->write("/system/ident/getall",true);
        $READ = $API->read(false);
        $ARRAY = $API->comm("/queue/simple/set",  
        array("numbers"=>$DatosActivar['NOMBRE'],"max-limit" =>$Velocidad));?>
        
        <div class="row">
	<div class="col-sm-12">
        <?php
        $consulta="SELECT NOMBRE, COLONIA,TELEFONO,TIPO FROM clients WHERE CLIENTE='$cliente'";
        $resultado = sqlsrv_query($Conn, $consulta);
        while($NombreCliente = sqlsrv_fetch_array($resultado)){?>
        
        <div class="col-md-12">
            <div class="alert alert-success  alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Cliente Activado<strong> Router <?php echo $DatosRouter['Nombre'];?> Plan <?php echo $Velocidad;?> </strong>
                  </div>
                    <h5><?php echo $NombreCliente['NOMBRE']; ?> <small> <?php echo $NombreCliente['TELEFONO']," ", $NombreCliente['COLONIA']," ",$NombreCliente['TIPO'] ; }?></small></h5>
        </div>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>DOC</th>
                    <th>F. EM</th>
                    <th>MES-AÑO</th>            
                    <th>CLAVE</th>
                    <th>DESC.</th>
                    <th>TOTAL</th>            
                </tr>
            </thead>
            <?php
            date_default_timezone_set('America/Mexico_City');
            $FechaActual=date('Ymd');
            $consulta2 = "SELECT P.OBSERV ,V.NO_REFEREN, C.NOMBRE, F_EMISION, V.IMPORTE, V.TIPO_DOC,
                         P.ARTICULO,V.comodin FROM clients C 
                         INNER JOIN ventas V ON 
                         C.CLIENTE=V.CLIENTE INNER JOIN
                         partvta P ON V.VENTA=P.VENTA WHERE C.CLIENTE='$cliente' AND V.F_EMISION BETWEEN '$FechaInCl' AND '$FechaActual' AND ARTICULO='RI' AND V.TIPO_DOC!='PE' order by V.F_EMISION  asc";
            $resultado2 = sqlsrv_query($Conn , $consulta2);    
            while($DatosPagos = sqlsrv_fetch_array($resultado2)){ 
                $result =$DatosPagos['F_EMISION']->format('d-m-Y');?>
                <tr class="table-primary">
                    <td><?php echo $DatosPagos["TIPO_DOC"],$DatosPagos["NO_REFEREN"]; ?></td>
                    <td><?php echo $result; ?></td>
                    <td><?php echo $DatosPagos["comodin"]; ?></td>
                    <td><?php echo $DatosPagos["ARTICULO"]; ?></td>
                    <td><?php echo $DatosPagos["OBSERV"]; ?></td>
                    <td><?php echo $DatosPagos["IMPORTE"]; ?></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
    <?php }else{?>
        <div class="row">
	<div class="col-sm-12">
        <?php
        $consulta="SELECT NOMBRE, COLONIA,TELEFONO,TIPO FROM clients WHERE CLIENTE='$cliente'";
        $resultado = sqlsrv_query($Conn, $consulta);
        while($NombreCliente = sqlsrv_fetch_array($resultado)){?>
        
        <div class="col-md-12">
            <div class="alert alert-error  alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Sin Conexión al Router de <strong><?php echo $DatosRouter['Nombre'];?></strong> Asegurate de que el API este encendido
                  </div>
                    <h5><?php echo $NombreCliente['NOMBRE']; ?> <small> <?php echo $NombreCliente['TELEFONO']," ", $NombreCliente['COLONIA']," ",$NombreCliente['TIPO'] ; }?></small></h5>
        </div>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>DOC</th>
                    <th>F. EM</th>
                    <th>MES-AÑO</th>            
                    <th>CLAVE</th>
                    <th>DESC.</th>
                    <th>TOTAL</th>            
                </tr>
            </thead>
            <?php
            date_default_timezone_set('America/Mexico_City');
            $FechaActual=date('Ymd');
            $consulta2 = "SELECT P.OBSERV ,V.NO_REFEREN, C.NOMBRE, F_EMISION, V.IMPORTE, V.TIPO_DOC,
                         P.ARTICULO,V.comodin FROM clients C 
                         INNER JOIN ventas V ON 
                         C.CLIENTE=V.CLIENTE INNER JOIN
                         partvta P ON V.VENTA=P.VENTA WHERE C.CLIENTE='$cliente' AND V.F_EMISION BETWEEN '$FechaInCl' AND '$FechaActual' AND ARTICULO='RI' AND V.TIPO_DOC!='PE' order by V.F_EMISION  asc";
            $resultado2 = sqlsrv_query($Conn , $consulta2);    
            while($DatosPagos = sqlsrv_fetch_array($resultado2)){ 
                $result =$DatosPagos['F_EMISION']->format('d-m-Y');?>
                <tr class="table-primary">
                    <td><?php echo $DatosPagos["TIPO_DOC"],$DatosPagos["NO_REFEREN"]; ?></td>
                    <td><?php echo $result; ?></td>
                    <td><?php echo $DatosPagos["comodin"]; ?></td>
                    <td><?php echo $DatosPagos["ARTICULO"]; ?></td>
                    <td><?php echo $DatosPagos["OBSERV"]; ?></td>
                    <td><?php echo $DatosPagos["IMPORTE"]; ?></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
    <?php }
    
}else{?>
<div class="row">
	<div class="col-sm-12">
        <?php
        $consulta="SELECT NOMBRE, COLONIA,TELEFONO,TIPO FROM clients WHERE CLIENTE='$cliente'";
        $resultado = sqlsrv_query($Conn, $consulta);
        while($NombreCliente = sqlsrv_fetch_array($resultado)){?>
        
        <div class="col-md-12">
                    <h5><?php echo $NombreCliente['NOMBRE']; ?> <small> <?php echo $NombreCliente['TELEFONO']," ", $NombreCliente['COLONIA']," ",$NombreCliente['TIPO'] ; }?></small></h5>
        </div>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>DOC</th>
                    <th>F. EM</th>
                    <th>MES-AÑO</th>            
                    <th>CLAVE</th>
                    <th>DESC.</th>
                    <th>TOTAL</th>            
                </tr>
            </thead>
            <?php
            date_default_timezone_set('America/Mexico_City');
            $FechaActual=date('Ymd');
            $consulta2 = "SELECT P.OBSERV ,V.NO_REFEREN, C.NOMBRE, F_EMISION, V.IMPORTE, V.TIPO_DOC,
                         P.ARTICULO,V.comodin FROM clients C 
                         INNER JOIN ventas V ON 
                         C.CLIENTE=V.CLIENTE INNER JOIN
                         partvta P ON V.VENTA=P.VENTA WHERE C.CLIENTE='$cliente' AND V.F_EMISION BETWEEN '$FechaInCl' AND '$FechaActual' AND ARTICULO='RI' AND V.TIPO_DOC!='PE' order by V.F_EMISION  asc";
            $resultado2 = sqlsrv_query($Conn , $consulta2);    
            while($DatosPagos = sqlsrv_fetch_array($resultado2)){ 
                $result =$DatosPagos['F_EMISION']->format('d-m-Y');?>
                <tr class="table-primary">
                    <td><?php echo $DatosPagos["TIPO_DOC"],$DatosPagos["NO_REFEREN"]; ?></td>
                    <td><?php echo $result; ?></td>
                    <td><?php echo $DatosPagos["comodin"]; ?></td>
                    <td><?php echo $DatosPagos["ARTICULO"]; ?></td>
                    <td><?php echo $DatosPagos["OBSERV"]; ?></td>
                    <td><?php echo $DatosPagos["IMPORTE"]; ?></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>

<?php } }?>     