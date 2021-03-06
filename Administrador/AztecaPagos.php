<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icono.png">
    <title>Pagos</title>

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
                      <li><a href="../Administrador/Ordenes.php">Ordenes Instalaci??n</a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Configuraci??n">
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
                                    <h2>Informaci??n</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form id="Registrar">
                                <div class="form-row">
                                    <div class="form-group col-md-1">
                                    <input list="mostrar" class="form-control form-control-sm" id="clien">
                                      <datalist id="mostrar">
                                        <?php
                                        set_time_limit(0);
                                        include './php/ConexionSQL.php';
                                        include './php/meses.php';
                                        date_default_timezone_set('America/Mexico_City');
                                        $fecha=date('Y-m-d');
                                        $FechaActual=date('Ymd');             
                                        setlocale(LC_ALL,"es_ES");
                                        $Mes=strftime("%b %Y");
                                        $Mes=str_replace(".","",$Mes);
                                        $Mes=strtoupper($Mes);
                                        $PasFecha=$_SESSION['FechaReporte'];  
                                        $consulta = "SELECT NOMBRE, CLIENTE FROM clients";
                                        $mostrar3 = sqlsrv_query($Conn , $consulta); 
                                        while($Clientes = sqlsrv_fetch_array($mostrar3)){
                                          $datos=$Clientes[1]; ?>
                                                         
                                          <option value="<?php echo $Clientes["CLIENTE"]; ?>"><?php echo $Clientes["NOMBRE"]; ?></option>
                                                           
                                          <?php }?>
                                                         
                                        </datalist>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-control-sm" placeholder="Cliente" id="Nombre" name="nombre" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <select name="mes" class="form-control form-control-sm" id="selectMes">
                                            <option id="mes"><?php echo $mes[0];?></option>
                                            <option><?php echo $mes[1];?></option>
                                            <option><?php echo $mes[2];?></option>
                                            <option><?php echo $mes[3];?></option>
                                            <option><?php echo $mes[4];?></option>
                                            <option><?php echo $mes[5];?></option>
                                            <option><?php echo $mes[6];?></option>
                                            <option><?php echo $mes[7];?></option>
                                            <option><?php echo $mes[8];?></option>
                                            <option><?php echo $mes[9];?></option>
                                            <option><?php echo $mes[10];?></option>
                                            <option><?php echo $mes[11];?></option>
                                            <option><?php echo $mes[12];?></option>
                                            <option><?php echo $mes[13];?></option>
                                            <option >OTRO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" class="form-control form-control-sm" name="importe" placeholder="$0.00" id='importe' required >
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="Num. Operaci??n" name="numoperacion" id="NumOpe">
                                    </div>
                                </div>
            
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <select name="formapago" id="SelectFormP" class="form-control form-control-sm">
                                            <option id="dep">Deposito</option>
                                            <option id="tran">Transferencia</option>
                                            <option id="efe">Efectivo Almoloya</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" class="form-control form-control-sm" value="<?php echo $fecha;?>" name="fechapago" id='fechapago'>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control form-control-sm" placeholder="Observaci??n" name="observacion" id="observacion">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control form-control-sm" placeholder="Telefono" id="Telefono" name="telefono">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control form-control-sm" id="Poblacion" name="poblacion" placeholder="Poblaci??n" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success btn-sm" id="Guardar">Guardar</button>
                                        <button type="button" class="btn btn-warning btn-sm" id="AtualizarInfo" onclick="Aztualizar()">Actualizar</button>
                                        <input type="hidden" class="form-control form-control-sm" placeholder="Cliente" id="idpago" name="idpago">
                                    </div>
                                    
                                </div>
                                    </form>
                                </div> 
                                
                            </div>
                            
                            <div class="x_panel">
                                <div class="x_title">
                                    <div class="col-12">
                    <form id="GenerarPagos">
                        <div class="form-row align-items-center">
                            <div class="col-sm-4 my-1">
                                <select name="Estatus" class="form-control form-control-sm">
                                    <option>PENDIENTE</option>
                                        <option>REGISTRADO</option>
                                        <option>FINALIZADO</option>
                                    <option>TODOS</option>
                                </select>
                            </div>
                            <div class="col-sm-3 my-1">
                                <select name="meses" class="form-control form-control-sm">
                                    <option id="mes"><?php echo $mes[0];?></option>
                                    <option><?php echo $mes[1];?></option>
                                    <option><?php echo $mes[2];?></option>
                                    <option><?php echo $mes[3];?></option>
                                    <option><?php echo $mes[4];?></option>
                                    <option><?php echo $mes[5];?></option>
                                    <option><?php echo $mes[6];?></option>
                                    <option><?php echo $mes[7];?></option>
                                    <option><?php echo $mes[8];?></option>
                                    <option><?php echo $mes[9];?></option>
                                    <option><?php echo $mes[10];?></option>
                                    <option><?php echo $mes[11];?></option>
                                    <option><?php echo $mes[12];?></option>
                                    <option><?php echo $mes[13];?></option>
                                    <option >OTRO</option>
                                </select>
    
                            </div>
                            <div class="col-auto my-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="TodosMeses" id="TodosMeses">
                                    <label class="form-check-label" for="TodosMeses">Todas los Meses</label>
                                </div>
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-link" id="GenerarPgos"><img src="images/table.png" width="20px"></button>
                            </div>
                        </div>
                    </form>
                    <!--Muestra TablaPagos.php-->
                    <div id="tablaPagos"></div>
                </div>
                                   
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <!--Muestra TablaPagos.php-->
                                <div id="tablaPagos"></div>
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
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <script src="js/PagoAzteca.js"></script>
    <script src="js/FechaReporte.js"></script>
    <script src="js/Funciones.js"></script>
    <script type="text/javascript"> 
    
$(document).ready(function() {   
    
  $('#SelectFormP').change(function(e) {
    if ($(this).val() === "Efectivo Almoloya") {
      $("#NumOpe").attr('readonly','readonly');
       $('#NumOpe').val('');
        $("#Telefono").attr('readonly','readonly');
       $('#Telefono').val('');
    }else{
        $("#NumOpe").removeAttr('readonly');
        $("#Telefono").removeAttr('readonly');
    }
  })
    
    $('#selectMes').change(function(e) {
        if ($(this).val() === "OTRO") {
            $("#observacion").prop('required',true);
        }else{
            $("#observacion").prop('required',false);
        }
    })
    
    $("#clien").on('change', function(){
        var cliente = $("#clien").val();
        var mesactu = $("#mes").val();
        var cadena = 'cliente=' + cliente;
        $("#NumOpe").removeAttr('readonly');
        $("#Telefono").removeAttr('readonly');
        document.getElementById('Registrar').reset();
        $.ajax({
            type:'POST',
            url:'php/InfoAzteca.php',
            dataType: "json",
            data:cadena,
            success:function(data){
                if(data.estado == 'si'){
                    document.getElementById("Nombre").value = data.infoclie.NOMBRE;
                    document.getElementById("Telefono").value = data.infoclie.TELEFONO;
                    document.getElementById("Poblacion").value = data.infoclie.COLONIA;
                    document.getElementById("importe").value = data.precio;
                    document.getElementById("mes").text = mesactu;
                    $('#dep').text('Deposito');
                    $('#tran').text('Transferencia');
                    $('#efe').text('Efectivo Almoloya');

                    document.getElementById('AtualizarInfo').disabled=true;
                    document.getElementById('Guardar').disabled=false;
                    
                  
                }else{
                $('.user-content').slideUp();
                alert("User not found...");
                } 
            }
        }); 
    })
}); 
        </script>
    <script>
     $(document).ready(function() {
         document.getElementById('Guardar').disabled=true;
         document.getElementById('AtualizarInfo').disabled=true;
	$('#Clientes').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ning??n dato disponible en esta tabla",
			"sInfo": "_START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "??ltimo",
				"sNext": "",
				"sPrevious": ""
			},   
		},
        "lengthMenu": [[-1], ["todos"]],
        scrollY:        '65vh',
        scrollCollapse: true
	});
});
    </script>
    <!-- ******************* -->

</body>

</html>
