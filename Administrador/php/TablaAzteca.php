<?php
    session_start();
    $estatus=$_SESSION['estados'];
    $mes=$_SESSION['meses'];
    if($estatus=='PENDIENTE'){
    if($mes==''){?> 
<div class="row">
	<div class="col-sm-12">
        <table class="table table-striped table-bordered" style="width:100%" id="Pendiente">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>MES</th>            
                    <th>N. OPE</th>
                    <th>IMPORTE</th>
                    <th>FO. PAGO.</th>
                    <th>OBSERVACION</th>
                    <th>MOV.</th>
                </tr>
            </thead>
            <?php
            include 'Conexion.php';
            date_default_timezone_set('America/Mexico_City');
            $VAR=0;
            $consulta = "SELECT *FROM pagosazteca WHERE Estado='PENDIENTE'";
            $resultado = mysqli_query($Conexion,$consulta);    
            while($datos = mysqli_fetch_array($resultado)){ 
                 $dActualizar=$datos[1]."||".
                             $datos[2]."||".
                             $datos[3]."||".
                             $datos[4]."||".
                             $datos[5]."||".
                             $datos[6]."||".
                             $datos[7]."||".
                             $datos[8]."||".
                            $datos[9]."||".
                            $datos[0];
                 $dpasar=$datos[0];
                $VAR=$VAR+1;
                ?>
                <tr class="table-danger">
                    <td ><?php echo $VAR ?></td>
                    <td onclick="ActualizaDatos('<?php echo $dActualizar ?>')"><?php echo $datos["Nombre"]; ?></td>
                    <td ><?php echo $datos["FechaPago"]; ?></td>
                    <td ><?php echo $datos["Mes"]; ?></td>
                    <td ><?php echo $datos["NumOperacion"]; ?></td>
                    <td ><?php echo $datos["Importe"]; ?></td>
                    <td ><?php echo $datos["FormaPago"]; ?></td>
                    <td ><?php echo $datos["Observacion"]; ?></td>
                    <td><button type="submit" class="btn btn-link" id="GenerarPgos" onclick="PasarDatosPen('<?php echo $dpasar ?>')"><img src="images/enviar.png" width="20px"></button></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php }else{?>
<div class="row">
	<div class="col-sm-12">
        <table class="table table-striped table-bordered" style="width:100%" id="PendienteMes">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>MES</th>            
                    <th>N. OPE</th>
                    <th>IMPORTE</th>
                    <th>FO. PAGO.</th>
                    <th>OBSERVACION</th>
                    <th>MOV.</th>
                </tr>
            </thead>
            <?php
            include 'Conexion.php';
            date_default_timezone_set('America/Mexico_City');
            $VAR=0;
            $consulta = "SELECT *FROM pagosazteca WHERE Estado='PENDIENTE' AND Mes='$mes'";
            $resultado = mysqli_query($Conexion,$consulta);    
            while($datos = mysqli_fetch_array($resultado)){ 
                $dActualizar=$datos[1]."||".
                             $datos[2]."||".
                             $datos[3]."||".
                             $datos[4]."||".
                             $datos[5]."||".
                             $datos[6]."||".
                             $datos[7]."||".
                             $datos[8]."||".
                            $datos[9]."||".
                            $datos[0];
                $dpasar=$datos[0];
                $VAR=$VAR+1;
                ?>
                <tr class="table-danger">
                    <td ><?php echo $VAR ?></td>
                    <td onclick="ActualizaDatos('<?php echo $dActualizar ?>')"><?php echo $datos["Nombre"]; ?></td>
                    <td ><?php echo $datos["FechaPago"]; ?></td>
                    <td ><?php echo $datos["Mes"]; ?></td>
                    <td ><?php echo $datos["NumOperacion"]; ?></td>
                    <td ><?php echo $datos["Importe"]; ?></td>
                    <td ><?php echo $datos["FormaPago"]; ?></td>
                    <td ><?php echo $datos["Observacion"]; ?></td>
                    <td><button type="submit" class="btn btn-link" onclick="PasarDatosPen('<?php echo $dpasar ?>')"><img src="images/enviar.png" width="20px"></button></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php }?>
<?php }else if($estatus=='REGISTRADO'){    
    if($mes==''){?> 
<div class="row">
	<div class="col-sm-12">
        <table class="table table-striped table-bordered" style="width:100%" id="Registrado">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CLIENTE</th>
                    <th>MES</th>                       
                    <th>IMPORTE</th>
                    <th>FO. PAGO</th>
                    <th>TELEFONO</th>
                    <th>ENV.</th>
                    <th>MOV.</th>
                    
                </tr>
            </thead>
            <?php
            include 'Conexion.php';
            date_default_timezone_set('America/Mexico_City');
            $VAR=0;
            $consulta = "SELECT *FROM pagosazteca WHERE Estado='REGISTRADO'";
            $resultado = mysqli_query($Conexion,$consulta);    
            while($datos = mysqli_fetch_array($resultado)){ 
                $dpasar=$datos[0];
                $VAR=$VAR+1;
                ?>
                <tr class="table-warning">
                    <td><?php echo $VAR ?></td>
                    <td><?php echo $datos["Nombre"]; ?></td>
                    <td><?php echo $datos["Mes"]; ?></td>
                    <td><?php echo $datos["Importe"]; ?></td>
                    <td><?php echo $datos["FormaPago"]; ?></td>
                    <td><?php echo $datos["Telefono"]; ?></td>
                    
                    <td><a href="https://api.whatsapp.com/send?phone=+521<?php echo $datos["Telefono"];?>&text=Hola%20Buen%20D%C3%ADa%20enviamos%20comprobante%20de%20pago%20<?php echo $datos["Mes"];?>%20Gracias" target="_blank"><img src="images/whatsapp.png" width="15px"></a></td>
                    <td><button type="submit" class="btn btn-link" onclick="PasarDatosReg('<?php echo $dpasar ?>')"><img src="images/enviar.png" width="15px"></button></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php }else{?>
<div class="row">
	<div class="col-sm-12">
        <table class="table table-striped table-bordered" style="width:100%" id="RegistradoMes">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CLIENTE</th>
                    <th>MES</th>                       
                    <th>IMPORTE</th>
                    <th>FO. PAGO</th>
                    <th>TELEFONO</th>
                    <th>ENV.</th>
                    <th>MOV.</th>
                    
                </tr>
            </thead>
            <?php
            include 'Conexion.php';
            date_default_timezone_set('America/Mexico_City');
            $VAR=0;
            $consulta = "SELECT *FROM pagosazteca WHERE Estado='REGISTRADO' AND Mes='$mes'";
            $resultado = mysqli_query($Conexion,$consulta);    
            while($datos = mysqli_fetch_array($resultado)){ 
                $dpasar=$datos[0];
                $VAR=$VAR+1;
                ?>
                <tr class="table-warning">
                    <td><?php echo $VAR ?></td>
                    <td><?php echo $datos["Nombre"]; ?></td>
                    <td><?php echo $datos["Mes"]; ?></td>
                    <td><?php echo $datos["Importe"]; ?></td>
                    <td><?php echo $datos["FormaPago"]; ?></td>
                    <td><?php echo $datos["Telefono"]; ?></td>
                    <td><a href="https://api.whatsapp.com/send?phone=+521<?php echo $datos["Telefono"];?>&text=Hola%20Buen%20D%C3%ADa%20enviamos%20comprobante%20de%20pago%20<?php echo $datos["Mes"];?>%20Gracias" target="_blank"><img src="images/whatsapp.png" width="15px"></a></td>
                    <td><button type="submit" class="btn btn-link" onclick="PasarDatosReg('<?php echo $dpasar ?>')"><img src="images/enviar.png" width="15px"></button></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php }?>
<?php }else if($estatus=='FINALIZADO'){   
    if($mes==''){?> 
<div class="row">
	<div class="col-sm-12">
        <table class="table table-striped table-bordered" style="width:100%" id="Finalizado">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>MES</th>            
                    <th>N. OPE</th>
                    <th>IMPORTE</th>
                    <th>FO. PAGO.</th>
                    <th>OBSERVACION</th>
                    <th>POBLACION</th>
                </tr>
            </thead>
            <?php
            include 'Conexion.php';
            date_default_timezone_set('America/Mexico_City');
            $VAR=0;
            $consulta = "SELECT *FROM pagosazteca WHERE Estado='FINALIZADO'";
            $resultado = mysqli_query($Conexion,$consulta);    
            while($datos = mysqli_fetch_array($resultado)){ 
                $VAR=$VAR+1;
                ?>
                <tr class="table-success">
                    <td><?php echo $VAR ?></td>
                    <td><?php echo $datos["Nombre"]; ?></td>
                    <td><?php echo $datos["FechaPago"]; ?></td>
                    <td><?php echo $datos["Mes"]; ?></td>
                    <td><?php echo $datos["NumOperacion"]; ?></td>
                    <td><?php echo $datos["Importe"]; ?></td>
                    <td><?php echo $datos["FormaPago"]; ?></td>
                    <td><?php echo $datos["Observacion"]; ?></td>
                    <td><?php echo $datos["Poblacion"]; ?></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php }else{?>
<div class="row">
	<div class="col-sm-12">
        <table class="table table-striped table-bordered" style="width:100%" id="FinalizadoMes">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>MES</th>            
                    <th>N. OPE</th>
                    <th>IMPORTE</th>
                    <th>FO. PAGO.</th>
                    <th>OBSERVACION</th>
                    <th>POBLACION</th>
                </tr>
            </thead>
            <?php
            include 'Conexion.php';
            date_default_timezone_set('America/Mexico_City');
            $VAR=0;
            $consulta = "SELECT *FROM pagosazteca WHERE Estado='FINALIZADO' AND Mes='$mes'";
            $resultado = mysqli_query($Conexion,$consulta);    
            while($datos = mysqli_fetch_array($resultado)){ 
                $VAR=$VAR+1;
                ?>
                <tr class="table-success">
                    <td><?php echo $VAR ?></td>
                    <td><?php echo $datos["Nombre"]; ?></td>
                    <td><?php echo $datos["FechaPago"]; ?></td>
                    <td><?php echo $datos["Mes"]; ?></td>
                    <td><?php echo $datos["NumOperacion"]; ?></td>
                    <td><?php echo $datos["Importe"]; ?></td>
                    <td><?php echo $datos["FormaPago"]; ?></td>
                    <td><?php echo $datos["Observacion"]; ?></td>
                    <td><?php echo $datos["Poblacion"]; ?></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php }?>
<?php }else if($estatus=='TODOS'){   
    if($mes==''){?> 
<div class="row">
	<div class="col-sm-12">
        <table class="table table-striped table-bordered" style="width:100%" id="Todos">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>MES</th>            
                    <th>N. OPE</th>
                    <th>IMPORTE</th>
                    <th>FO. PAGO.</th>
                    
                    <th>POBLACION</th>
                    <th>MOV.</th>
                    <th>BORRAR</th>
                </tr>
            </thead>
            <?php
            include 'Conexion.php';
            date_default_timezone_set('America/Mexico_City');
            $VAR=0;
            $consulta = "SELECT *FROM pagosazteca";
            $resultado = mysqli_query($Conexion,$consulta);    
            while($datos = mysqli_fetch_array($resultado)){ 
                $VAR=$VAR+1;
                $dpasar=$datos[0];
                ?>
                <tr class="table-info">
                    <td><?php echo $VAR ?></td>
                    <td><?php echo $datos["Nombre"]; ?></td>
                    <td><?php echo $datos["FechaPago"]; ?></td>
                    <td><?php echo $datos["Mes"]; ?></td>
                    <td><?php echo $datos["NumOperacion"]; ?></td>
                    <td><?php echo $datos["Importe"]; ?></td>
                    <td><?php echo $datos["FormaPago"]; ?></td>
                    
                    <td><?php echo $datos["Poblacion"]; ?></td>
                    <td><?php echo $datos["Estado"]; ?></td>
                    <td><button type="submit" class="btn btn-link" onclick="PasarDatosBorrar('<?php echo $dpasar ?>')"><img src="images/Borrar.png" width="25px"></button></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php }else{?>
<div class="row">
	<div class="col-sm-12">
        <table class="table table-striped table-bordered" style="width:100%" id="TodosMes">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>MES</th>            
                    <th>N. OPE</th>
                    <th>IMPORTE</th>
                    <th>FO. PAGO.</th>
                    
                    <th>POBLACION</th>
                    <th>MOV.</th>
                    <th>BORRAR</th>
                    
                </tr>
            </thead>
            <?php
            include 'Conexion.php';
            date_default_timezone_set('America/Mexico_City');
            $VAR=0;
            $consulta = "SELECT *FROM pagosazteca WHERE Mes='$mes'";
            $resultado = mysqli_query($Conexion,$consulta);    
            while($datos = mysqli_fetch_array($resultado)){ 
                $VAR=$VAR+1;
                $dpasar=$datos[0];
                ?>
                <tr class="table-info">
                    <td><?php echo $VAR ?></td>
                    <td><?php echo $datos["Nombre"]; ?></td>
                    <td><?php echo $datos["FechaPago"]; ?></td>
                    <td><?php echo $datos["Mes"]; ?></td>
                    <td><?php echo $datos["NumOperacion"]; ?></td>
                    <td><?php echo $datos["Importe"]; ?></td>
                    <td><?php echo $datos["FormaPago"]; ?></td>
                    
                    <td><?php echo $datos["Poblacion"]; ?></td>
                    <td><?php echo $datos["Estado"]; ?></td>
                    <td><button type="submit" class="btn btn-link" onclick="PasarDatosBorrar('<?php echo $dpasar ?>')"><img src="images/Borrar.png" width="25px"></button></td>
                </tr>
                <?php }?>         
                 
        </table>
    </div>
</div>
<?php }?>
<?php }?>
<script>
     $(document).ready(function() {
	$('#PendienteMes').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "",
				"sLast": "",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["Todos"]],
        scrollY:        '70vh',
        scrollCollapse: true
	});
});
    </script>
<script>
     $(document).ready(function() {
	$('#Pendiente').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "",
				"sLast": "",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["Todos"]],
        scrollY:        '70vh',
        scrollCollapse: true
	});
});
    </script>
<script>
     $(document).ready(function() {
	$('#TodosMes').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "",
				"sLast": "",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["Todos"]],
        scrollY:        '70vh',
        scrollCollapse: true
	});
});
    </script>
<script>
     $(document).ready(function() {
	$('#Todos').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "",
				"sLast": "",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["Todos"]],
        scrollY:        '70vh',
        scrollCollapse: true
	});
});
    </script>
<script>
     $(document).ready(function() {
	$('#Registrado').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "",
				"sLast": "",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["Todos"]],
        scrollY:        '70vh',
        scrollCollapse: true
	});
});
    </script>
<script>
     $(document).ready(function() {
	$('#RegistradoMes').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "",
				"sLast": "",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["Todos"]],
        scrollY:        '70vh',
        scrollCollapse: true
	});
});
    </script>
<script>
     $(document).ready(function() {
	$('#Finalizado').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "",
				"sLast": "",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["Todos"]],
        scrollY:        '70vh',
        scrollCollapse: true
	});
});
    </script>
<script>
     $(document).ready(function() {
	$('#FinalizadoMes').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "",
				"sLast": "",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["Todos"]],
        scrollY:        '70vh',
        scrollCollapse: true
	});
});
    </script>






