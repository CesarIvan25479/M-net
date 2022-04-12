<?php 
session_start();
$idRouter = $_SESSION['idrouter'];
    if($idRouter ==null || $idRouter==''){
        header("location:index.php");
            die();
    }
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
    <title>Actualizar Router</title>

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
                                    <h2>Actualizar Router</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php
                                    include './php/Conexion.php';
                                    $idRouter = $_SESSION['idrouter'];
                                    $consulta = "SELECT * FROM router WHERE id='$idRouter'";
                                    $mostrar = mysqli_query($Conexion, $consulta);
                                    $Router = mysqli_fetch_array($mostrar);?>
                                    
                                    <form id="ActulizarRouter">
                                        <span class="section">Información General</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre Router<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control"  name="Nombre" placeholder="Ej: RB Zona" type="text" value="<?php echo $Router['Nombre'];?>" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">IP<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="IP" placeholder="Ej: 192.168.1.1" type="text" value="<?php echo $Router['IP'];?>"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Usuario del RB<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="Usuario" placeholder="Ej: Admin" type="text" value="<?php echo $Router['Usuario'];?>" /></div>
                                        </div>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Password del RB<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="password" id="password1" name="PWD" placeholder="Ej: 1234567" value="<?php echo $Router['Pwd'];?>"/>
												
												<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
													<i id="eye" class="fa fa-eye"></i>
												</span>
											</div>
										</div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Puerto API<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" class='number' name="PuertoAPI" value="<?php echo $Router['PuertoAPI']?>"></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo Router<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select name="TipoRouter" class="form-control form-control-sm" id="TipoRouter">
                                                    <option>INA</option>
                                                    <option>IFO</option>
                                                    <option>HostPot</option>
                                                </select></div>
                                        </div>
                                    
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Zonas<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <textarea  name='RangoIP' placeholder="Ej: a,b,c"><?php echo $Router['Zonas'];?></textarea></div>
                                        </div>
                                        
                                        <div class="ln_solid">
                                            <br>
                                            <div class="form-group">
                                                <div class="col-md-9 offset-md-3">
                                                    <input type="hidden" class="form-control form-control-sm" id="idRouter" name="idRouter" value="<?php echo $Router['id'];?>">
                                                    <button type='button' class="btn btn-primary" onclick='ActRouter()'>Actualizar</button>
                                                    <button type='button' class="btn btn-success" >Actualizar y Comprobar Conexion</button>
                                                    <button type='button' class="btn btn-danger" onclick="BorrarRouter('<?php echo $Router['id'];?>')">Borrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
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
      $fechaAnterior = date("Y-m-d",strtotime($FechaActual."- 5 month"));
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
    <script src="js/Funciones.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

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
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="js/Funciones.js"></script>
    <script src="js/FechaReporte.js"></script>

</body>

</html>
