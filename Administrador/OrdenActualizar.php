<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icono.png">
    <title>Actualizar Orden</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- rmnt Awesome -->
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
                            include '/php/Conexion.php';
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
                            include '/php/Conexion.php';
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
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Información Orden</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <ul class="nav nav-tabs justify-content-end bar_tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-info-circle contrast"></i> Datos Orden</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-folder-open"></i> Datos Instalación</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-wifi contrast"></i> Datos Conexión</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                                            <form id="ActualizarOrden" enctype="multipart/form-data">
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Folio Orden<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control form-control-sm"  name="folio2" id="folio2" type="hidden" />
                                                        <input class="form-control form-control-sm"  name="folio" id="folio" placeholder="Ej: 00001" type="number" />
                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Cliente<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm" placeholder="NOMBRE" name="cliente" id="cliente">
                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha instalación<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6"><input class="form-control" name="fechains" id="fechains" value="2022-01-01" type="date" /></div>
                                                </div>
                                        
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <select name="tipo" class="form-control form-control-sm" id="TipoRouter">
                                                            <option id="ina">Inalámbrico</option>
                                                            <option id="fib">Fibra óptica</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Instalación<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <select name="instalacion" class="form-control form-control-sm" id="TipoRouter">
                                                            <option id="nue">Nueva</option>
                                                            <option id="cam">Cambio</option>
                                                        </select></div>
                                                </div>
                                    
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Imagen Orden<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="imagenord">
                                                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Imagen Credencial<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="imagencre">
                                                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ln_solid">
                                                    <div class="form-group">
                                                        <div class="col-md-6 offset-md-3">
                                                            <br>
                                                            <button type='button' class="btn btn-primary btn-sm" onclick='ActualizaOrden()'>Guardar</button>
                                                            <button type='button' class="btn btn-danger btn-sm" onclick='BorrarOrden()'>Borrar</button>
                                                            <a href="../Administrador/Ordenes.php"><button type='button' class="btn btn-success btn-sm" >Cancelar</button></a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                        <form class="form-label-left input_mask">

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name">
											<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
											<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="tel" class="form-control" id="inputSuccess5" placeholder="Phone">
											<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 ">Default Input</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" class="form-control" placeholder="Default Input">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 ">Disabled Input </label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 ">Read-Only Input</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 ">Date Of Birth <span class="required">*</span>
											</label>
											<div class="col-md-9 col-sm-9 ">
												<input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="button" class="btn btn-primary">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
                                        </div>
                                        <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                        <form id="demo-form" data-parsley-validate>
										<label for="fullname">Full Name * :</label>
										<input type="text" id="fullname" class="form-control" name="fullname" required />

										<label for="email">Email * :</label>
										<input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />

										<label>Gender *:</label>
										<p>
											M:
											<input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
											<input type="radio" class="flat" name="gender" id="genderF" value="F" />
										</p>

										<label>Hobbies (2 minimum):</label>
										<p style="padding: 5px;">
											<input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required class="flat" /> Skiing
											<br />

											<input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> Running
											<br />

											<input type="checkbox" name="hobbies[]" id="hobby3" value="eat" class="flat" /> Eating
											<br />

											<input type="checkbox" name="hobbies[]" id="hobby4" value="sleep" class="flat" /> Sleeping
											<br />
											<p>

												<label for="heard">Heard us by *:</label>
												<select id="heard" class="form-control" required>
													<option value="">Choose..</option>
													<option value="press">Press</option>
													<option value="net">Internet</option>
													<option value="mouth">Word of mouth</option>
												</select>

												<label for="message">Message (20 chars min, 100 max) :</label>
												<textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>

												<br />
												<span class="btn btn-primary">Validate form</span>

									</form>
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
    <script src="js/Funciones.js"></script>
    
 

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
    <script src="js/FuncionesOrdenes.js"></script>

</body>

</html>
