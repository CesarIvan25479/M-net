

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icono.png">
    <title>Clientes</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Paginar Tabla-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- ********************* -->
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><img src="images/logo2111.png" width="50px"> <span>Comunicaciones</span></a>
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
                      <li><a href="javascript:MostrarCliente()">Clientes MyBusiness</a></li>
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
                      <li><a href="AztecaPagos.php">Pagos Azteca</a></li>
                      <li><a href="../Administrador/Ordenes.php">Ordenes Instalación</a></li>
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
                      <li><a href="#">Proximamente...</a></li>
                      <li><a href="#">Proximamente...</a></li>
                      <li><a href="#">Proximamente...</a></li>
                      <li><a href="#">Proximamente...</a></li>
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

        <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                <div class="col-sm-3 my-1"><h5>Filtrar</h5></div>
                                <div class="col-sm-4 my-1">
                                    <input list=zona class="form-control form-control-sm" id="filtrozona" placeholder="Zonas">
                                        <datalist id="zona">
                                            <?php
                                              set_time_limit(0);
                                              include './php/ConexionSQL.php';  
                                              $consulta = "SELECT ZONA, Descrip FROM zonas";
                                              $mostrar = sqlsrv_query($Conn, $consulta); 
                                              while($zona = sqlsrv_fetch_array($mostrar)){
                                                  $datos=$zona[1]."||".
                                                  $zona[0];?>
                                                  <option value="<?php echo $zona["ZONA"]; ?>"><?php echo $zona["Descrip"]; ?></option>
                                                           
                                                    <?php }?>
                                                         
                                                </datalist>
                                        </div>
                                    
                                    <div class="col-sm-4 my-1">
                                    <input list=clasi class="form-control form-control-sm" id="filtroclasi" placeholder="Clasificación">
                                        <datalist id="clasi">
                                            <?php
                                              set_time_limit(0);
                                              include './php/ConexionSQL.php';  
                                              $consulta = "SELECT Tipo, Descrip FROM tipos";
                                              $mostrar = sqlsrv_query($Conn, $consulta); 
                                              while($clasi = sqlsrv_fetch_array($mostrar)){
                                                  $datos=$clasi[1]."||".
                                                  $clasi[0];?>
                                                  <option value="<?php echo $clasi["Tipo"]; ?>"><?php echo $clasi["Descrip"]; ?></option>
                                                           
                                                    <?php }?>
                                                         
                                                </datalist>
                                        </div>
                                    
                        
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="tablaClientes">
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
                                                         include './php/ConexionSQL.php';
                    
                                                         $consulta = "SELECT NOMBRE, CLIENTE,TIPO FROM clients";
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
                        
                        <div class="col-md-7 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Información</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="forminfo">
                                    <form>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="">Clave</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="CLIENTE" id="clave" name="clave" readonly>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="">Nombre del cliente</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="NOMBRE" id="nombre" name="nombre" readonly>
                                    </div>
                                </div>
            
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="">Estado</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="ESTADO" id="estado" name="estado" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Código Postal</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="C. POSTAL" id="cp" name="cp" readonly>
      
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="">Población</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="POBLACIÓN" id="poblacion" name="poblacion" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Colonia</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="COLONIA" id="colonia" name="colonia" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Calle</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="CALLE" id="calle" name="calle" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">N. Exterior</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="NÚMERO EXTERIOR" id="numero" name="numero" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="">Teléfono</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="TELÉFONO" id="telefono" name="telefono" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Clasificacíon</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="CLASIFICACIÓN" id="clasificacion" name="clasificacion" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Zona</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="ZONA" id="zon" name="zon" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">L. Precio</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="PRECIO" id="precio" name="precio" readonly>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="">Observaciones</label>
                                        <textarea  name='observaciones' rows="4" cols="50" style="min-width: 100%" readonly id="obsr"></textarea>
                                    </div>
                                </div>
                                    </form>
                                    
                                </div> 
                                    
                                    
                                </div>
                            </div>
                        <div id="menActivar"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /page content -->
            
            
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
          
        <input class="form-control" type="date" name="FechaRep" value="2021-01-01">
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Paginar Tabla-->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    
    <script src="js/FechaReporte.js"></script>
    <script src="js/Funciones.js"></script>
    <script>
        $(document).ready(function(){
            $("#filtrozona").on('change', function(){
                var filtrozona = $(this).val();
                var filtroclasi = $("#filtroclasi").val();
                cadena = 'zona=' + filtrozona + 
                        '&clasificacion='+ filtroclasi;      
		            $.ajax({
			            type:"POST",
			            url:"php/FiltrarClientes.php",
			            data:cadena,
			            success:function(r){
				          if(r == true){
					          $('#tablaClientes').load('php/TablaClientes.php');
				          }else{
					          alertify.error("Fallo el servidor :(");
				          }
			          }
		        });
          })

          $("#filtroclasi").on('change', function(){
                var filtroclasi = $(this).val();
                var filtrozona = $("#filtrozona").val();
                cadena = 'zona=' + filtrozona + 
                        '&clasificacion='+ filtroclasi;      
		            $.ajax({
			            type:"POST",
			            url:"php/FiltrarClientes.php",
			            data:cadena,
			            success:function(r){
				          if(r == true){
					          $('#tablaClientes').load('php/TablaClientes.php');
				          }else{
					          alertify.error("Fallo el servidor :(");
				          }
			          }
		        });
          })
          
        });
    </script>
    
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
    <!-- ******************* -->

</body>

</html>
