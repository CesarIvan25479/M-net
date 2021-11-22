var deposito = document.getElementById('dep').value;
var transfe = document.getElementById('tran').value;
var efe = document.getElementById('efe').value; 
function AgregarDatos(datos){
    $("#NumOpe").removeAttr('readonly');
        $("#Telefono").removeAttr('readonly');
    document.getElementById('Registrar').reset();
    d=datos.split('||');
    $('#Poblacion').val(d[2]);
    $('#Telefono').val(d[1]);
    $('#Nombre').val(d[0]);
    $('#importe').val(d[3]);
    $('#dep').text('Deposito');
    $('#tran').text('Transferencia');
    $('#efe').text('Efectivo Almoloya');
    
    document.getElementById('AtualizarInfo').disabled=true;
    document.getElementById('Guardar').disabled=false;
}

var registrar = document.getElementById('Registrar');
registrar.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(registrar);
    fetch('php/AgregarPago.php',{
        method: 'POST',
        body: datos
    })
    .then(res=> res.json())
    .then(data=>{
        if(data==='ErrorMes'){
            new PNotify({
            title: 'Error Mes',
            text: 'El Pago del Mes ya fue Registrado',
            type: 'error',
            styling: 'bootstrap3'
            });
        }else if(data==='Registrado'){
           document.getElementById('Registrar').reset();
            document.getElementById('Guardar').disabled=true;
           new PNotify({
            title: 'Registrado',
            text: 'El Pago Fue Registrado',
            type: 'success',
            styling: 'bootstrap3'
            });
             $('#tablaPagos').load('php/TablaAzteca.php');
            $("#NumOpe").removeAttr('readonly');
        }else if(data==='ErrorOperacion'){
            new PNotify({
            title: 'Error Num. Operación',
            text: 'Verifica el numero de Operación',
            type: 'error',
            styling: 'bootstrap3'
            });
        }else if(data==='LlenarOpe'){
            new PNotify({
            title: 'Error Num. Operación',
            text: 'Por favor Coloca el numero de Operación',
            type: 'notice',
            styling: 'bootstrap3'
            });
        }
    })
})

var Registros = document.getElementById('GenerarPagos');
Registros.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(Registros);
    fetch('php/DatosPagos.php',{
        method: 'POST',
        body: datos
    })
    .then(res=> res.json())
    .then(data=>{
        if(data==='No'){
            Respuesta1.innerHTML=`
                   <div class="alert alert-danger" role="alert">
                     
                    </div>`
        }else{
          $('#tablaPagos').load('php/TablaAzteca.php');
        }
    })
})

function PasarDatosPen(datos){
    cadena= "id=" + datos;

		$.ajax({
			type:"POST",
			url:"php/PasaPen.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tablaPagos').load('php/TablaAzteca.php');
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
function PasarDatosReg(datos){
	cadena= "id=" + datos;
        
		$.ajax({
			type:"POST",
			url:"php/PasaReg.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tablaPagos').load('php/TablaAzteca.php');
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}

function Aztualizar(){
    var datos = new FormData(registrar);
    fetch('php/ActualizarPago.php',{
        method: 'POST',
        body: datos
    })
    .then(res=> res.json())
    .then(data=>{
        if(data==='ErrorMes'){
            new PNotify({
            title: 'Error Mes',
            text: 'El Pago del Mes ya fue Registrado',
            type: 'error',
            styling: 'bootstrap3'
            });
        }else if(data==='Actualizado'){
           document.getElementById('Registrar').reset();
            document.getElementById('AtualizarInfo').disabled=true;
           new PNotify({
            title: 'Actualizado',
            text: 'La información se a actulizado',
            type: 'success',
            styling: 'bootstrap3'
            });
             $('#tablaPagos').load('php/TablaAzteca.php');
            $("#NumOpe").removeAttr('readonly');
        }else if(data==='ErrorOperacion'){
            new PNotify({
            title: 'Error Num. Operación',
            text: 'Verifica el numero de Operación',
            type: 'error',
            styling: 'bootstrap3'
            });
        }else if(data==='LlenarOpe'){
            new PNotify({
            title: 'Error Num. Operación',
            text: 'Por favor Coloca el numero de Operación',
            type: 'notice',
            styling: 'bootstrap3'
            });
        }
    })
}

function PasarDatosBorrar(datos){
	cadena= "id=" + datos;
		$.ajax({
			type:"POST",
			url:"php/PasaBorrar.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tablaPagos').load('php/TablaAzteca.php');
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}

function ActualizaDatos(datos){
    document.getElementById('Registrar').reset();
    document.getElementById('AtualizarInfo').disabled=false;
    document.getElementById('Guardar').disabled=true; 
    d=datos.split('||');
    $('#Nombre').val(d[0]);
    $('#fechapago').val(d[1]);
    $('#mes').text(d[2]);
    $('#importe').val(d[3]);
    $('#NumOpe').val(d[4]);
    $('#Telefono').val(d[7]);
    $('#observacion').val(d[6]);
    $('#Poblacion').val(d[8]);
    $('#idpago').val(d[9]);
    
    
    
    console.log(d[1]);
    
    if(deposito == d[5]){
        $('#dep').text(d[5]);
        $('#tran').text('Transferencia');
        $('#efe').text('Efectivo Almoloya');
        $("#NumOpe").removeAttr('readonly');
        $("#Telefono").removeAttr('readonly');
    }else if(transfe == d[5]){
        $('#dep').text(d[5]);
        $('#tran').text('Deposito');
        $('#efe').text('Efectivo Almoloya');
        $("#NumOpe").removeAttr('readonly');
        $("#Telefono").removeAttr('readonly');
    }else if(efe == d[5]){
        $('#dep').text(d[5]);
        $('#tran').text('Deposito');
        $('#efe').text('Transferencia');
        $("#NumOpe").attr('readonly','readonly');
        $('#NumOpe').val('');
        $("#Telefono").attr('readonly','readonly');
        $('#Telefono').val('');
    }
   
}