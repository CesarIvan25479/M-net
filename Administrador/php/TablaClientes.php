<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <table id="Clientes" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>NOMBRE</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    set_time_limit(0);
                    include 'ConexionSQL.php';
                    session_start();
                    $zona = $_SESSION['zona'];
                    $clasificacion = $_SESSION['clasificacion'];
                    if($zona=='' && $clasificacion == ''){
                        $consulta = "SELECT NOMBRE, CLIENTE, TIPO FROM clients";
                        $mostrar = sqlsrv_query($Conn, $consulta);
                        while($Clientes = sqlsrv_fetch_array($mostrar)){
                        ?>
                            <tr>
                                <td onclick="InfoCliente('<?php echo $Clientes['CLIENTE'];?>')"><?php echo $Clientes['CLIENTE'];?></td>
                                <td onclick="InfoCliente('<?php echo $Clientes['CLIENTE'];?>')"><?php echo $Clientes['NOMBRE'];?></td>
                                <td>
                                <?php
                                if($Clientes['TIPO'] == "BAJA"){ ?>
                                                                 
                                <?php }else{?>
                                    <button class="btn btn-success btn-sm" onclick="activar('<?php echo $Clientes['CLIENTE'];?>')"><a class="fa fa-power-off"></a></button>
                                    <button class="btn btn-danger btn-sm" onclick="desactivar('<?php echo $Clientes['CLIENTE'];?>')"><a class="fa fa-power-off"></a></button>
                                <?php }?>
                                </td>
                            </tr>
                    <?php }}else if($zona != '' && $clasificacion == ''){
                        $consulta = "SELECT NOMBRE, CLIENTE, TIPO FROM clients WHERE ZONA='$zona'";
                        $mostrar = sqlsrv_query($Conn, $consulta);
                        while($Clientes = sqlsrv_fetch_array($mostrar)){
                        ?>
                            <tr>
                                <td onclick="InfoCliente('<?php echo $Clientes['CLIENTE'];?>')"><?php echo $Clientes['CLIENTE'];?></td>
                                <td onclick="InfoCliente('<?php echo $Clientes['CLIENTE'];?>')"><?php echo $Clientes['NOMBRE'];?></td>
                                <td>
                                <?php
                                if($Clientes['TIPO'] == "BAJA"){ ?>
                                                                 
                                <?php }else{?>
                                    <button class="btn btn-success btn-sm" onclick="activar('<?php echo $Clientes['CLIENTE'];?>')"><a class="fa fa-power-off"></a></button>
                                    <button class="btn btn-danger btn-sm" onclick="desactivar('<?php echo $Clientes['CLIENTE'];?>')"><a class="fa fa-power-off"></a></button>
                                <?php }?>
                                </td>
                            </tr>
                        <?php }}else if($zona == '' && $clasificacion != ''){
                            $consulta = "SELECT NOMBRE, CLIENTE, TIPO FROM clients WHERE TIPO='$clasificacion'";
                            $mostrar = sqlsrv_query($Conn, $consulta);
                            while($Clientes = sqlsrv_fetch_array($mostrar)){
                            ?>
                            <tr>
                                <td onclick="InfoCliente('<?php echo $Clientes['CLIENTE'];?>')"><?php echo $Clientes['CLIENTE'];?></td>
                                <td onclick="InfoCliente('<?php echo $Clientes['CLIENTE'];?>')"><?php echo $Clientes['NOMBRE'];?></td>
                                    <td>
                                    <?php
                                if($Clientes['TIPO'] == "BAJA"){ ?>
                                                                 
                                <?php }else{?>
                                    <button class="btn btn-success btn-sm" onclick="activar('<?php echo $Clientes['CLIENTE'];?>')"><a class="fa fa-power-off"></a></button>
                                    <button class="btn btn-danger btn-sm" onclick="desactivar('<?php echo $Clientes['CLIENTE'];?>')"><a class="fa fa-power-off"></a></button>
                                <?php }?>
                                    </td>
                            </tr>
                            <?php }}else if($zona != '' && $clasificacion != ''){
                            $consulta = "SELECT NOMBRE, CLIENTE, TIPO FROM clients WHERE ZONA='$zona' AND TIPO='$clasificacion'";
                            $mostrar = sqlsrv_query($Conn, $consulta);
                            while($Clientes = sqlsrv_fetch_array($mostrar)){
                            ?>
                            <tr>
                                <td onclick="InfoCliente('<?php echo $Clientes['CLIENTE'];?>')"><?php echo $Clientes['CLIENTE'];?></td>
                                <td onclick="InfoCliente('<?php echo $Clientes['CLIENTE'];?>')"><?php echo $Clientes['NOMBRE'];?></td>
                                <td>
                                    <?php
                                if($Clientes['TIPO'] == "BAJA"){ ?>
                                                                 
                                <?php }else{?>
                                    <button class="btn btn-success btn-sm" onclick="activar('<?php echo $Clientes['CLIENTE'];?>')"><a class="fa fa-power-off"></a></button>
                                    <button class="btn btn-danger btn-sm" onclick="desactivar('<?php echo $Clientes['CLIENTE'];?>')"><a class="fa fa-power-off"></a></button>
                                <?php }?>
                                </td>
                            </tr>
                            <?php }}?>
                                                        
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
     $(document).ready(function() {
	$('#Clientes').DataTable({
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
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["todos"]],
        scrollY:        '80vh',
        scrollCollapse: true
	});
});
    </script>