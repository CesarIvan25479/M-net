
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
        url:'php/FiltrarClientes.php',
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
                document.getElementById('zona').value=data.infoclie.ZONA;  
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
                var router = data.infoRouter.Nombre;
                var plan = data.velocidad;
                var Cliente = data.infoCliente;
                var mensaje = document.getElementById('menActivar');
                var texto = "<div class='alert alert-success  alert-dismissible' role='alert'>"+
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                Cliente+" Activado<strong> Router "+ router +" Plan "+ plan +"</strong></div>";
                mensaje.innerHTML = texto;
            }else{
                $('.user-content').slideUp();
                alert("User not found...");
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
                var router = data.infoRouter.Nombre;
                var plan = data.velocidad;
                var Cliente = data.infoCliente;
                var mensaje = document.getElementById('menActivar');
                var texto = "<div class='alert alert-error  alert-dismissible' role='alert'>"+
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                Cliente +" Desactivado<strong> Router "+ router +" Plan "+ plan +"</strong></div>";
                mensaje.innerHTML = texto;
            }else{
                $('.user-content').slideUp();
                alert("User not found...");
            } 
        }
    }); 
}