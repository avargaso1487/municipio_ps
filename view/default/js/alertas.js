function alerta_mensajes()
{
	$.ajax({
        type:'POST',
        data: {opcion:'alerta_mensajes'},
        url: "../../controller/controlusuario/usuario.php",
        success:function(data){ 		                 
            $('#alertamensajes').html(data);
        }
    });	
}

function alerta_actividades()
{
    $.ajax({
        type:'POST',
        data: {opcion:'alerta_actividades'},
        url: "../../controller/controlusuario/usuario.php",
        success:function(data){                          
            $('#alertaactividades').html(data);
        }
    }); 
}