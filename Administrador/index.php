<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icono.png">

    <title>M-net Sistemas</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
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
                      <li><a href="Clientes.php">Clientes MyBusiness</a></li>
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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <!-- page title -->

            <h1 class="pull-left">
                <i class="fa fa-tachometer"></i>
                <span>Dashboard</span>
            </h1>
        </div>
    </div>
</div>

<div class="row">    
 
    <!--Pagos-->
    
        <div class="col-sm-4">
            <div class="box">
                <div class="box-header">
                    <div class="title">
                        <div class="fa fa-dollar"></div>
                        Pagos Internet
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        
                            <a class="links-panel" href="/facturas/?pagos_fecha=26/02/2022&estado=pagada">
                                <div class="box-content box-statistic">
                                    <h3 class="title text-success">$0.00
                                        </h3>
                                    <small>Hoy - 0 pagos</small>
                                   
                                    <div class="text-success fa fa-money align-right"></div>
                                </div>
                            </a>
                        
                        
                            <a class="links-panel" href="/pagos/">
                                <div class="box-content box-statistic">
                                    <h3 class="title text-warning">$705.00 </h3>
                                    <small>Pendiente - 3 pagos</small>
                                    <div class="text-warning fa fa-clock-o align-right"></div>
                                </div>
                            </a>
                        
                        
                            <a class="links-panel" href="/facturas/?pagos_fecha=02/2022&estado=pagada">
                                <div class="box-content box-statistic">
                                    <h3 class="title text-primary">$0.00 </h3>
                                    <small>Febrero - 0 pagos</small>
                                    <div class="text-primary fa fa-calendar align-right"></div>
                                </div>
                            </a>
                        
                    </div>
                </div>                    
            </div>
        </div>
    
    <!--Clientes-->
    
        <div class="col-sm-4">
            <div class="box">
                <div class="box-header">
                    <div class="title">
                        <i class="fa fa-users"></i> Clientes
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-sm-12">
                        <!--a class="links-panel" href="/clientes2/?clientes_fecha=2022-02-26"-->
                        <a class="links-panel" href="/clientes/?clientes_fecha=26/02/2022">
                            <div class="box-content box-statistic text-right">
                                <h3 class="title text-success">0</h3>
                                <small>Hoy</small>
                                <div class="text-success fa fa-user-plus align-left"></div>
                            </div>
                        </a>
                        
                        <!--a class="links-panel" href="/clientes2/?clientes_fecha=2022-02"-->
                        <a class="links-panel" href="/clientes/?clientes_fecha=02/2022">
                            <div class="box-content box-statistic text-right">
                                <h3 class="title text-primary">0</h3>
                                <small>Febrero</small>
                                <div class="text-primary fa fa-calendar align-left"></div>
                            </div>
                        </a>
                        <a class="links-panel" href="/clientes/">
                            <div class="box-content box-statistic text-right">
                                <h3 class="title text-primary">1</h3>
                                <small>Total</small>
                                <div class="text-primary fa fa-users align-left"></div>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    

    <!--Tickets-->
    
        <div class="col-sm-4">
            <div class="box">
                <div class="box-header">
                    <div class="title">
                        <i class="fa fa-support"></i> Tickets 
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-sm-12">
                        <a class="links-panel" href="/tickets/?tickets_fecha=26/02/2022">
                            <div class="box-content box-statistic">
                                <h3 class="title text-error">0</h3>
                                <small>Hoy</small>
                                <div class="text-error fa fa-plus-circle align-right"></div>
                            </div>
                        </a>
                        <a class="links-panel" href="/tickets/?estado=nuevo">
                            <div class="box-content box-statistic">
                                <h3 class="title text-warning">0</h3>
                                <small>Pendientes</small>
                                <div class="text-warning fa fa-clock-o align-right"></div>
                            </div>
                        </a>
                        <a class="links-panel" href="/tickets/?tickets_fecha=02/2022">
                            <div class="box-content box-statistic">
                                <h3 class="title text-success">0</h3>
                                <small>Febrero</small>
                                <div class="text-success fa fa-calendar align-right"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    

    <!--Trafico-->
    
        <div class="col-sm-12">
            <div class="box" style="margin-bottom:0 !important">
                <div class="box-header">
                    <div class="title">
                        <i class="fa fa-refresh"></i> Trafico 
                    </div>                    
                </div>                
            </div>
            <small style="font-size: 10px;">Última actualización: 26/02/2022 15:20</small>
        </div>
        
        <div class="col-sm-4">
            <div class="box">                
                <div class="row">
                    <a class="links-panel" href="/trafico/">
                        <div class="col-sm-12">
                            <div class="box-content box-statistic text-right">
                                <h3 class="title text-primary">0 GiB</h3>
                                <small>Total Descarga</small>
                                <div class="text-primary fa fa-cloud-download align-left"></div>
                            </div>                        
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box">                
                <div class="row">
                    <a class="links-panel" href="/trafico/">
                        <div class="col-sm-12">
                            <div class="box-content box-statistic text-right">
                                <h3 class="title text-primary">0 GiB</h3>
                                <small>Total Subida</small>
                                <div class="text-warning fa fa-cloud-upload align-left"></div>
                            </div>
                        </div>
                    </a>
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
      
      <script src="js/FechaReporte.js"></script>
      <script src="js/Funciones.js"></script>
	
  </body>
</html>
