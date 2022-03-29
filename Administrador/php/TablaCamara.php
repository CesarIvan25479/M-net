<?php
    set_time_limit(0);
    session_start();
    require_once "../php/ConexionSQL.php";
    include '../php/MesActual.php';
    $FechaInCl=$_SESSION['FechaRepCli'];
    $cliente=$_SESSION['Cliente'];
    $Opcion = $_SESSION['Opcion'];
    $servicioCam = $_SESSION['servicioCam'];
?>
<div class="row">
	<div class="col-sm-12">
        <div class="col-md-12">
                    <h5><?php echo $servicioCam; ?> Camaras IP</h5>
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
            $consulta2 = "SELECT P.OBSERV ,V.NO_REFEREN, C.NOMBRE, F_EMISION, P.PRECIO, V.TIPO_DOC,
                         P.ARTICULO,V.comodin FROM clients C 
                         INNER JOIN ventas V ON 
                         C.CLIENTE=V.CLIENTE INNER JOIN
                         partvta P ON V.VENTA=P.VENTA WHERE C.CLIENTE='$cliente' AND V.F_EMISION BETWEEN '$FechaInCl' AND '$FechaActual' AND ARTICULO='RCAM' AND V.TIPO_DOC!='PE' order by V.F_EMISION  asc";
            $resultado2 = sqlsrv_query($Conn , $consulta2);    
            while($DatosPagos = sqlsrv_fetch_array($resultado2)){ 
                $result =$DatosPagos['F_EMISION']->format('d-m-Y');?>
                <tr class="table-primary">
                    <td><?php echo $DatosPagos["TIPO_DOC"],$DatosPagos["NO_REFEREN"]; ?></td>
                    <td><?php echo $result; ?></td>
                    <td><?php echo $DatosPagos["comodin"]; ?></td>
                    <td><?php echo $DatosPagos["ARTICULO"]; ?></td>
                    <td><?php echo $DatosPagos["OBSERV"]; ?></td>
                    <td><?php echo $DatosPagos["PRECIO"]; ?></td>
                </tr>
                <?php }?>      
        </table>
    </div>
</div>
