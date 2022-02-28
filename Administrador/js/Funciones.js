
function ActRouter(){
    var ActualizarRouter = document.getElementById('ActulizarRouter');
    var datos = new FormData(ActualizarRouter);
    fetch('php/ActualizarRouter.php',{
        method: 'POST',
        body: datos    
    })
    .then(res=> res.json())
    .then(data=>{
          if(data==='Agregado'){
            window.open('Routers.php', '_self');
            document.getElementById("AgregarRouter").reset();
          }else if(data==='LLenar'){
            new PNotify({
            title: 'Error',
            text: 'Por Favor LLena Todos los Campos',
            type: 'error',
            styling: 'bootstrap3'
            });
          }
    })
    
}

function PasRuter(datos){
    cadena = 'id=' + datos;
    $.ajax({
        type:"POST",
        url:"php/PasarIdRou.php",
        data: cadena,
        success: function(r){
        if(r == true){
            window.open('RouterActualizar.php', '_self');
        }else{
            alert('Nada');
        }
            
        }
    });
    
}

function BorrarRouter(datos){
    
    cadena = 'id=' + datos;
    $.ajax({
        type:"POST",
        url:'php/BorrarRouter.php',
        data: cadena,
        success: function(r){
            if (r == true){
                window.open('Routers.php', '_self');
            }else{
                
            }
        }
    })
}

function DatosCorte(datos){
    $.ajax({
        type: 'POST',
        url: 'php/DatosCorte.php',
        data: 'id=' + datos,
        success: function(r){
            if(r == true){
                window.open('Corte.php', '_self');
            }else{
                alert('Error');
            }
        }
    })
}

function AgregaRouter() {
    var AgregarRouter = document.getElementById('AgregarRouter')
    var datos = new FormData(AgregarRouter);
    fetch('php/AgregarRouter.php',{
        method: 'POST',
        body: datos    
    })
    .then(res=> res.json())
    .then(data=>{
          if(data==='Agregado'){
            window.open('Routers.php', '_self');
            document.getElementById("AgregarRouter").reset();
          }else if(data==='LLenar'){
            new PNotify({
            title: 'Error',
            text: 'Por Favor LLena Todos los Campos',
            type: 'error',
            styling: 'bootstrap3'
            });
          }
    })
}

function InfoCliente(clave){
    cadena = 'clave=' + clave;      
    $.ajax({
        type:'POST',
        url:'php/InfoCliente.php',
        dataType: "json",
        data:cadena,
        success:function(data){
            if(data.estado == 'si'){
                document.getElementById('clave').value=data.infoclie.CLIENTE;
                document.getElementById('nombre').value=data.infoclie.NOMBRE;   
                document.getElementById('estado').value=data.infoclie.ESTADO;   
                document.getElementById('cp').value=data.infoclie.CP;   
                document.getElementById('poblacion').value=data.infoclie.POBLA;   
                document.getElementById('colonia').value=data.infoclie.COLONIA;   
                document.getElementById('calle').value=data.infoclie.CALLE;   
                document.getElementById('numero').value=data.infoclie.NUMERO; 
                document.getElementById('telefono').value=data.infoclie.TELEFONO;
                document.getElementById('clasificacion').value=data.infoclie.TIPO;
                document.getElementById('zon').value=value=data.infoclie.ZONA;  
                document.getElementById('precio').value=data.infoclie.PRECIO;
                document.getElementById('obsr').value=data.infoclie.OBSERV;
            }else{
                $('.user-content').slideUp();
                alert("User not found...");
            } 
        }
    }); 
}
function activar(clave){
    cadena = 'clave=' + clave;      
    $.ajax({
        type:'POST',
        url:'php/ActivarCliente.php',
        dataType: "json",
        data:cadena,
        success:function(data){
            if(data.estado == 'si'){
                var Cliente = data.infoCliente;
                if(Cliente ==  "BAJA"){
                    var mensaje = document.getElementById('menActivar');
                    var texto = "<div class='alert alert-error  alert-dismissible' role='alert'>"+
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                    " Servicio Cancelado <strong> No se Hizo ningun Cambio</strong></div>";
                    mensaje.innerHTML = texto;
                }else{
                    var router = data.infoRouter.Nombre;
                    var plan = data.velocidad;
                    var mensaje = document.getElementById('menActivar');
                    var texto = "<div class='alert alert-success  alert-dismissible' role='alert'>"+
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                    Cliente+" Activado<strong> Router "+ router +" Plan "+ plan +"</strong></div>";
                    mensaje.innerHTML = texto;
                }
            }else if(data.estado == 'no'){
                var router = data.infoRouter.Nombre;
                var mensaje = document.getElementById('menActivar');
                var texto = "<div class='alert alert-error  alert-dismissible' role='alert'>"+
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                "No se tiene Conexíon al router <strong> Verifica el API de "+ router+"</strong></div>";
                mensaje.innerHTML = texto;
            }else{
                alert("No Hay Conexion");
            } 
        }
    });   
}
function desactivar(clave){
    cadena = 'clave=' + clave;      
    $.ajax({
        type:'POST',
        url:'php/DesactivarCliente.php',
        dataType: "json",
        data:cadena,
        success:function(data){
            if(data.estado == 'si'){
                var Cliente = data.infoCliente;
                if(Cliente ==  "BAJA"){
                    var mensaje = document.getElementById('menActivar');
                    var texto = "<div class='alert alert-dark  alert-dismissible' role='alert'>"+
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                    " Servicio Cancelado <strong> No se Hizo ningun Cambio</strong></div>";
                    mensaje.innerHTML = texto;
                }else{
                    var router = data.infoRouter.Nombre;
                    var plan = data.velocidad;
                    var mensaje = document.getElementById('menActivar');
                    var texto = "<div class='alert alert-dark  alert-dismissible' role='alert'>"+
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                    Cliente +" Desactivado<strong> Router "+ router +" Plan "+ plan +"</strong></div>";
                    mensaje.innerHTML = texto;
                }
            }else if(data.estado == 'no'){
                var router = data.infoRouter.Nombre;
                var mensaje = document.getElementById('menActivar');
                var texto = "<div class='alert alert-error  alert-dismissible' role='alert'>"+
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                "No se tiene Conexíon al router <strong> Verifica el API de "+ router+"</strong></div>";
                mensaje.innerHTML = texto;
            }else{
                alert("No Hay Conexion");
            } 
        }
    }); 
}
function PasEditarOrden(datos){
    d=datos.split('||');
    sessionStorage.setItem("folio",d[0]);
    sessionStorage.setItem("cliente",d[1]);
    sessionStorage.setItem("fechains",d[2]);
    sessionStorage.setItem("Tipo",d[3]);
    sessionStorage.setItem("instalacion",d[4]);
    window.open('OrdenActualizar.php', '_self');
}

function ClienteFactura(){
    var cliente = document.getElementById("clientefac").value;
    var nombre = document.getElementById("nombrefac").value;
    var correo = document.getElementById("correofac").value;
    var corre2 = document.getElementById("correofac2").value;
    var formpago = document.getElementById("formpago").value;
    var cfdi = document.getElementById("cfdi").value;
    var pago = document.getElementById("pago").value;
    alert(cliente);
    alert(nombre);
    alert(correo);
    alert(corre2);
    alert(formpago);
    alert(cfdi);
    alert(pago);
}