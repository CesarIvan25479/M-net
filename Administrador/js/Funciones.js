
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
