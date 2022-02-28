<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/icono.png">

    <title>Lista de Ordenes</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- Paginar Tabla-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- ********************* -->
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="images/logo2111.png" width="50px"> <span>Comunicaciones</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Usuario</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-tachometer"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Administracion</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Clientes.php">Lista de Clientes</a></li>
                      <li><a>Clientes Router<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <?php 
                            include './php/Conexion.php';
                            $consulta = 'SELECT  id, Nombre FROM router';
                            $mostrar = mysqli_query($Conexion, $consulta);
                            while($Router = mysqli_fetch_array($mostrar)){?>
                              
                                <li><a href="#" onclick="PasRuter('<?php echo $Router['id'];?>')"><?php echo $Router['Nombre'];?></a></li>
                            <?php }?>
                          </ul>
                        </li>
                      <li><a data-toggle="modal" data-target="#IntFecha">Reporte Pagos</a></li>
                      <li><a href="../Administrador/Ordenes.php">Ordenes Instalación</a></li>
                    </ul>
                  </li>
                    <li><a><i class="fa fa-line-chart"></i> Cobranza<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="AztecaPagos.php">Pagos</a></li>
                            <li><a href="Facturas.php">Facturas</a></li>
                        </ul>
                    </li>
                    
                  <li><a><i class="fa fa-sitemap"></i> Sistema <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Routers.php">Router</a></li>
                      <li><a href="#">Planes Internet</a></li>
                      <li><a href="#">AP</a></li>
                      <li><a href="#">Zonas</a></li>
                      <li><a>Corte<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <?php 
                            include './php/Conexion.php';
                            $consulta = 'SELECT  id, Nombre FROM router';
                            $mostrar = mysqli_query($Conexion, $consulta);
                            while($Router = mysqli_fetch_array($mostrar)){?>
                              
                                <li><a href="#" onclick="DatosCorte('<?php echo $Router['id'];?>')"><?php echo $Router['Nombre'];?></a></li>
                            <?php }?>
                          </ul>
                        </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-wifi"></i> HotsPot <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Router</a></li>
                      <li><a href="#">Lista Planes </a></li>
                      <li><a href="#">Crear Fichas </a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-cloud"></i> AdminOLT <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Proximamente...</a></li>
                      <li><a href="#">Proximamente...</a></li>
                      <li><a href="#">Proximamente...</a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#">Proximamente...</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-archive"></i>Almacen <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Proximamente...</a></li>
                      <li><a href="#">Proximamente...</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Configuración">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Cerrar" href="index.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt="">Usuario
                  </a>
                  
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <section id="web-application">
                <h2 class="page-header">Ordenes de Instalación</h2>
                  <div class="row fontawesome-icon-list">
                      <div class="fa-hover col-md-2 col-sm-4"><a href="../Administrador/OrdenAgregar.php"><i class="fa fa-plus"></i>Agregar</a>
                    </div>
                      
                </div>
                <br>
            </section>
            <div class="clearfix"></div>
        
                <div class="container cropper">
                  
                  <div class="row">
                    <div class="col-md-9 docs-buttons">
                      <!-- Show the cropped image in modal -->
                      <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.png">Download</a>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.modal -->

                    </div><!-- /.docs-buttons -->
                  </div>
                </div>
            
              
          </div>
            <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-3">
                        <div class="input-prepend input-group">
                            <?php
                            $textinicio = date("m/01/Y");
                            $textfin = date("m/t/Y");
                            $textrango = $textinicio." - ".$textfin; 
                            ?>
                            <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control form-control-sm" value="<?php echo $textrango; ?>" />
                            </div> 
                      </div>
                    
                    <div class="col-md-2">
                    <div class="input-prepend input-group">
                        <select name="tipo" class="form-control form-control-sm" id="filtrotipo">
                            <option>--Selecciona--</option>
                            <option>Inalámbrico</option>
                            <option>Fibra óptica</option>
                        </select>
                            </div>
                      </div>
                    
                    <div class="col-md-2">
                        <select name="instalacion" class="form-control form-control-sm" id="filtroins">
                            <option>--Selecciona--</option>
                            <option>Nueva</option>
                            <option>Cambio</option>
                        </select>
                      </div>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                </div>
                <div class="x_content">
                                    
      <div id="tablaOrdenes">                            
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
                            include './php/Conexion.php';
                            $inicio = date("Y-m-01");
                            $fin = date("Y-m-t");
                            $consulta = "SELECT * FROM ordenes WHERE FechaIns BETWEEN '$inicio' AND '$fin'";
                            $mostrar = mysqli_query($Conexion, $consulta);
                            while($orden = mysqli_fetch_array($mostrar)){
                              $datos = $orden['Folio'].'||'.
                                      $orden['Cliente'].'||'.
                                      $orden['FechaIns'].'||'.
                                      $orden['Tipo'].'||'.
                                      $orden['Instalacion'];
                              ?>
                            <tr>
                                <td><?php echo $orden['Folio'];?></td>
                                <td><?php echo $orden['Cliente'];?></td>
                                <td><?php echo $orden['FechaIns'];?></td>
                                <td><?php echo $orden['Tipo'];?></td>
                                <td><?php echo $orden['Instalacion'];?></td>
                                
                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg"  onclick="mostrarImagen('<?php echo $orden['ImgOrden'];?>')">
                                    <span data-toggle="tooltip" title="Orden"><a class="fa fa-file-image-o"></a></span></button>
                                    <?php if($orden['ImgCredencial'] != ""){ ?>
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="mostrarImagen('<?php echo $orden['ImgCredencial'];?>')">
                                    <span data-toggle="tooltip" title="Credencial"><a class="fa fa-user"></a></span></button>
                                    <?php } ?>
                                    <button class="btn btn-info btn-sm" onclick="PasEditarOrden('<?php echo $datos;?>')">
                                    <span data-toggle="tooltip" title="Editar Cliente"><a class="fa fa-edit"></a></span></button>
                                </td>
                            </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                            </div>       
                </div>
            </div>            
        </div>
        </div>
        <!-- /page content -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Documentos</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="mostrar">
            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
                        </div>

                      </div>
                    </div>
                  </div>

                     <!--Modal Pasar Fecha-->
      <div class="modal fade bs-example-modal-sm" id="IntFecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
      <form id="PasarFecha">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fecha Inicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
      $FechaActual = date("Y-m-01");
      $fechaAnterior = date("Y-m-d",strtotime($FechaActual."- 8 month"));
      ?>
        <input class="form-control" type="date" name="FechaRep" value="<?php echo $fechaAnterior; ?>">
          <div class="mt-3" id='respuesta1'>
                      <!--Muestra Cliente-->          
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar</button>
      </div>
    </div>
          </form>
  </div>
</div>

         <!-- footer content -->
         <footer>
                <div class="pull-right">
                    M-net Sistemas - Admin WISP 
                </div>
                <div class="clearfix"></div>
            </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="js/Funciones.js"></script>
    <script src="js/FechaReporte.js"></script>
    <script>
      $(document).ready(function(){
        $("#reservation").on('change', function(){
          var rangoFecha = $("#reservation").val();
          var filtroTipo = $("#filtrotipo").val();
          var filtroins = $("#filtroins").val();
          var cadena = "rangoFecha=" + rangoFecha +
                      "&filtroTipo=" + filtroTipo + 
                      "&filtroIns=" + filtroins;
          $.ajax({
            type:"POST",
            url:"php/FiltrarOrdenes.php",
            data:cadena,
            success:function(r){
              if (r == true){
                $('#tablaOrdenes').load('php/TablaOrdenes.php');
              }else{
                alert("Sin Conexión")
              }
            }
          });
        })

        $("#filtrotipo").on('change', function(){
          var rangoFecha = $("#reservation").val();
          var filtroTipo = $("#filtrotipo").val();
          var filtroins = $("#filtroins").val();
          var cadena = "rangoFecha=" + rangoFecha +
                      "&filtroTipo=" + filtroTipo + 
                      "&filtroIns=" + filtroins;
          $.ajax({
            type:"POST",
            url:"php/FiltrarOrdenes.php",
            data:cadena,
            success:function(r){
              if (r == true){
                $('#tablaOrdenes').load('php/TablaOrdenes.php');
              }else{
                alert("Sin Conexión")
              }
            }
          });
        })
        

        $("#filtroins").on('change', function(){
          var rangoFecha = $("#reservation").val();
          var filtroTipo = $("#filtrotipo").val();
          var filtroins = $("#filtroins").val();
          var cadena = "rangoFecha=" + rangoFecha +
                      "&filtroTipo=" + filtroTipo + 
                      "&filtroIns=" + filtroins;
          $.ajax({
            type:"POST",
            url:"php/FiltrarOrdenes.php",
            data:cadena,
            success:function(r){
              if (r == true){
                $('#tablaOrdenes').load('php/TablaOrdenes.php');
              }else{
                alert("Sin Conexión")
              }
            }
          });
        })

      });
    </script>
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

  </body>
</html>
