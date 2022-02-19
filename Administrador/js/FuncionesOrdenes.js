if(sessionStorage.getItem("folio") == null){
    window.open('Ordenes.php', '_self');
}else{
  
    document.getElementById("folio").value = sessionStorage.getItem("folio");
    document.getElementById("cliente").value = sessionStorage.getItem("cliente");
    document.getElementById("fechains").value = sessionStorage.getItem("fechains");
    document.getElementById("folio2").value = sessionStorage.getItem("folio");

    if("Fibra óptica" == sessionStorage.getItem("Tipo")){
        $('#ina').text(sessionStorage.getItem("Tipo"));
        $("#fib").text("Inalámbrico");
    }
    if("Cambio" == sessionStorage.getItem("instalacion")){
        $('#nue').text(sessionStorage.getItem("instalacion"));
        $('#cam').text("Nueva");
    }

    
}
function ActualizaOrden(){
    var ActualizarOrden = document.getElementById('ActualizarOrden');
    var datos = new FormData(ActualizarOrden);
    fetch('php/ActualizarOrden.php',{
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

function BorrarOrden(){
  var folio = document.getElementById("folio").value;
  var cadena = "folio="+folio;
  if(confirm("¿Estas Seguro de Borrar el folio "+folio+" ?")){
    $.ajax({
      type:"POST",
      url:"php/BorrarOrden.php",
      dataType: "json",
      data:cadena,
      success:function(data){
        if(data.estado == "si"){
          window.open("ordenes.php","_self");
        }else if(data.estado == "no"){
          new PNotify({
            title: "Error",
            text: "No se Pudo Borrar de la base de datos",
            type: "error",
            styling: "bootstrap3"
          })
        }
      }
    });
  }else{
    new PNotify({
      title: 'Cancelado',
      text: 'No se Realizo ningun cambio',
      type: 'error',
      styling: 'bootstrap3'
      });
  }
}




