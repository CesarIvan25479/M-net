
<?php 
session_start();
$idRouter = $_SESSION['idrouter'];
if ($idRouter == null || $idRouter==''){
    header("location:index.php");
    die();
}

include './php/MesActual.php';
include './php/Conexion.php';
$consulta = "SELECT *FROM router WHERE id='$idRouter'";
$generar = mysqli_query($Conexion, $consulta);
$router = mysqli_fetch_array($generar);
$zonas = explode(",", $router['Zonas']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icono.png">
    <title>Corte <?php echo $router['Nombre'];?></title>

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
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                <h2>Corte Router <?php echo $router['Nombre'];?> <small>Mes <?php echo $MesActual;?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                       <div class="row">
                                           <div class="col-sm-12">
                                               <div class="card-box table-responsive">
                                               <table id="Clientes" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE</th>
                                            <th>MESES</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            set_time_limit(0);
                                            
                                            include './php/Api Mikrotik.php';
                                            $ipRouteros=$router['IP']; 
                                            $Username=$router['Usuario'];
                                            $Pass=$router['Pwd'];
                                            $api_puerto=$router['PuertoAPI'];
                                            $tipo = $router['Tipo'];
                                            $API = new routeros_api();
                                            $API->debug = false;
                                            if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
                                                $API->write("/system/ident/getall",true);
                                                $READ = $API->read(false);
                                                include './php/ConexionSQLC.php';
                                                date_default_timezone_set('America/Mexico_City');
                                                $FechaActual=date('Ymd');
                                                $contador = 0;
                                                for ($i = 0; $i < count($zonas); $i++){ 
                                                $consulta = "SELECT DISTINCT clients.CLIENTE ,clients.NOMBRE, clients.PRECIO FROM clients 
                                                INNER JOIN ventas ON clients.CLIENTE = ventas.CLIENTE WHERE ventas.CLIENTE not in (SELECT DISTINCT CLIENTE FROM ventas WHERE comodin = '$MesActual') AND ZONA='$zonas[$i]' AND clients.TIPO='$tipo'";
                                                $mostrar = sqlsrv_query($ConnC, $consulta);
                                                while($Cliente = sqlsrv_fetch_array($mostrar)){
                                                $contador +=1;
                                                   
                                                $ARRAY = $API->comm("/queue/simple/enable",
                                                array("numbers"=>$Cliente['NOMBRE']));   
                                                $ARRAY = $API->comm("/queue/simple/set",  
                                                array("numbers"=>$Cliente['NOMBRE'],"max-limit" =>'1K/1K'));
                                                 
                                                ?>
                                            <tr>
                                                <td><?php echo $contador;?></td>
                                                <td><?php echo $Cliente['NOMBRE'];?></td>
                                                <?php
                                                $meses='';
                                                $consulta2 = "SELECT top(15) P.OBSERV ,V.NO_REFEREN, C.NOMBRE, F_EMISION, V.IMPORTE, V.TIPO_DOC,
                                                P.ARTICULO,V.comodin FROM clients C 
                                                INNER JOIN ventas V ON 
                                                C.CLIENTE=V.CLIENTE INNER JOIN
                                                partvta P ON V.VENTA=P.VENTA 
                                                WHERE C.CLIENTE='".$Cliente['CLIENTE']."' AND V.F_EMISION 
                                                BETWEEN '20210601' AND '$FechaActual' AND ARTICULO='RI' AND V.TIPO_DOC!='PE' order by V.F_EMISION  desc";
                                                $mostrar2 = sqlsrv_query($ConnC, $consulta2);
                                                while($pagos = sqlsrv_fetch_array($mostrar2)){
                                                $meses = $meses.$pagos['comodin'].",<br>";
                                                }
                                                ?>
                                                <td><?php echo $meses;?></td>
                                                             
                                            </tr>
                                        
                                            <?php } 
                                                }
                                                }else{
                                                include './php/ConexionSQL.php';
                                                date_default_timezone_set('America/Mexico_City');
                                                $FechaActual=date('Ymd');
                                                echo 'No Conectado al Router';
                                                
                                                $contador = 0;
                                                for ($i = 0; $i < count($zonas); $i++){ 
                                                $consulta = "SELECT DISTINCT clients.CLIENTE, clients.NOMBRE, clients.PRECIO FROM clients 
                                                INNER JOIN ventas ON clients.CLIENTE = ventas.CLIENTE WHERE ventas.CLIENTE not in (SELECT DISTINCT CLIENTE FROM ventas WHERE comodin = '$MesActual') AND ZONA='$zonas[$i]' AND clients.TIPO='$tipo'";
                                                $mostrar = sqlsrv_query($Conn, $consulta);
                                                while($Cliente = sqlsrv_fetch_array($mostrar)){
                                                $contador +=1;
                                                ?>
                                            <tr>
                                                <td><?php echo $contador;?></td>
                                                <td><?php echo $Cliente['NOMBRE'];?></td>
                                                <?php
                                                $meses='';
                                                $consulta2 = "SELECT top(15) P.OBSERV ,V.NO_REFEREN, C.NOMBRE, F_EMISION, V.IMPORTE, V.TIPO_DOC,
                                                P.ARTICULO,V.comodin FROM clients C 
                                                INNER JOIN ventas V ON 
                                                C.CLIENTE=V.CLIENTE INNER JOIN
                                                partvta P ON V.VENTA=P.VENTA 
                                                WHERE C.CLIENTE='".$Cliente['CLIENTE']."' AND V.F_EMISION 
                                                BETWEEN '20210601' AND '$FechaActual' AND ARTICULO='RI' AND V.TIPO_DOC!='PE' order by V.F_EMISION  asc";
                                                $mostrar2 = sqlsrv_query($Conn, $consulta2);
                                                while($pagos = sqlsrv_fetch_array($mostrar2)){
                                                $meses = $meses.$pagos['comodin'].",<br>";
                                                }
                                                ?>
                                                <td><?php echo $meses;?></td>
                                                             
                                            </tr>
                                        <?php }}}?>
                                            
                                            
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
