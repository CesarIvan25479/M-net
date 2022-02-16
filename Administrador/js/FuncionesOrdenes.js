var cadena;
$.ajax({
    type:'POST',
    url:'php/TablaOrdenes.php',
    dataType: "json",
    data: cadena,
    success:function(data){
        if(data.estado == 'si'){
            var num = Object.keys(data).length - 2;
            var tablaord = document.getElementById("ordenes");
            var cuerpoTabla = document.createElement("tbody")
            for(var i=0;i<=num;i++){
                let fila = document.createElement('tr');
                let td = document.createElement('td');
                td.innerText = data[i].Cliente;
                fila.appendChild(td);
                cuerpoTabla.appendChild(fila);
            }
            tablaord.appendChild(cuerpoTabla);
        }else{
            alert("Error");
        }
    }
});
