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


function agregaform(datos){
    d=datos.split('||');
    $('#Cliente').val(d[0]);
    $('#Nombre').val(d[1]);
    
    var datos = new FormData(Generar);
    fetch('php/PasDatosRe.php',{
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(data =>{
        if(data === 'no'){
            
        }else{
            $('#tabla').load('php/TablaPagos.php');
        }
    })
}