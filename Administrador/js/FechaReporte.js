var PasarFecha = document.getElementById("PasarFecha");
PasarFecha.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(PasarFecha);
    fetch('php/PasarFecha.php',{
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(data =>{
        if(data === 'no'){
            
        }else{
            window.open('ReportesPagos.php', '_self');
                
            }
    })
})

function AgregarOrden() {
    var AgregaOrden = document.getElementById('AgregarOrden');
    var datos = new FormData(AgregaOrden);
    fetch('php/AgregarOrden.php',{
        method: 'POST',
        body: datos    
    })
    .then(res=> res.json())
    .then(data=>{
          if(data==='Agregado'){
            window.open('Ordenes.php', '_self');
            document.getElementById("AgregarOrden").reset();
          }else if(data==='tamano'){
            new PNotify({
            title: 'Error',
            text: 'El Tamaño de la imagen es demasiado grande',
            type: 'error',
            styling: 'bootstrap3'
            });
          }else if(data==='tipo'){
            new PNotify({
            title: 'Error',
            text: 'El tipo de archvio no es una imagen',
            type: 'error',
            styling: 'bootstrap3'
            });
          }else if(data==='error'){
            new PNotify({
            title: 'Error',
            text: 'No se pudo insertar en la base de datos',
            type: 'error',
            styling: 'bootstrap3'
            });
          }
    })
}

function mostrarImagen(nombre){
    var mos = document.getElementById('mostrar'); 
    var img = "<img src=../Imagenes/"+nombre+" width='100%'>";
    mos.innerHTML = img;
}
