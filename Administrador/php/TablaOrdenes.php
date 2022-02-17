<div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="ordenes" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>FOLIO</th>
                                <th>CLIENTE</th>
                                <th>F.INSTALACIÓN</th>
                                <th>TIPO</th>
                                <th>ORDEN</th>
                                <th>DOCUMENTOS</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../php/Conexion.php';
                            session_start();
                            $fechaIni = $_SESSION["finior"];
                            $fechaFin = $_SESSION["ffinor"];
                            $filtroTipo = $_SESSION["Filorti"];
                            $filtroIns = $_SESSION["Filorin"];
                            $consulta = "SELECT * FROM ordenes WHERE FechaIns BETWEEN '$fechaIni' AND '$fechaFin'";
                            $mostrar = mysqli_query($Conexion, $consulta);
                            while($orden = mysqli_fetch_array($mostrar)){?>
                            <tr>
                                <td><?php echo $orden['Folio'];?></td>
                                <td><?php echo $orden['Cliente'];?></td>
                                <td><?php echo $orden['FechaIns'];?></td>
                                <td><?php echo $orden['Folio'];?></td>
                                <td><?php echo $orden['Instalacion'];?></td>
                                
                                <td>
              
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="mostrarImagen('<?php echo $orden['ImgOrden'];?>')"><a class="fa fa-file-image-o"></a> Orden</button>
                                    
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="mostrarImagen('<?php echo $orden['ImgCredencial'];?>')"><a class="fa fa-user"></a> Credencial</button>
                                    
                                </td>
                            </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
</div>

<script>
     $(document).ready(function() {
	$('#ordenes').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "Resultados _START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar Cliente:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},   
		},
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
        scrollY:        '65vh',
        scrollCollapse: true
	});
});
    </script>