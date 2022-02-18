if(sessionStorage.getItem("folio") == null){
    window.open('Ordenes.php', '_self');
}else{
  
    document.getElementById("folio").value = sessionStorage.getItem("folio");
    document.getElementById("cliente").value = sessionStorage.getItem("cliente");
    document.getElementById("fechains").value = sessionStorage.getItem("fechains");

    if("Fibra óptica" == sessionStorage.getItem("Tipo")){
        $('#ina').text(sessionStorage.getItem("Tipo"));
        $("#fib").text("Inalámbrico");
    }
    if("Cambio" == sessionStorage.getItem("instalacion")){
        $('#nue').text(sessionStorage.getItem("instalacion"));
        $('#cam').text("Nueva");
    }

    
}





