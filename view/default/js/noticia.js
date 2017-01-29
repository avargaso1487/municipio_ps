window.onload = function(){    
    mostrarMenu(); 
    mostrarNoticiasTodas();
    mostrarNoticias();
    mostrarNoticiasInformacion();
    mostrarNoticiasInformacion2();
    
};


function todos() {
    window.location.href = "all_noticia.php"; 
    //alert('Ver todos');   
}



function mostrarNoticias() {
	$.ajax({
        type:'POST',
        data: {param_opcion:'listar_noticias'},        
        url: "../../controller/controlNoticia/noticia_controller.php",
        success:function(data){        		     
            $('#noticias').html(data);                                                        
        }
    });
}

function mostrarNoticiasInformacion() {

	var noticia = document.getElementById("param_noticiaID").value;
	var param_opcion = 'noticia_informacion';	
	$.ajax({
        type:'POST',        
        data:'param_opcion='+param_opcion+'&noticia=' +noticia,  
        url: "../../controller/controlNoticia/noticia_controller.php",
        success:function(data){        		                 
            $('#informacion').html(data);
        }
    });
	

}

function mostrarNoticiasInformacion2() {

    var noticia = document.getElementById("param_noticiaID").value;
    var param_opcion = 'noticia_informacion2';   
    $.ajax({
        type:'POST',        
        data:'param_opcion='+param_opcion+'&noticia=' +noticia,  
        url: "../../controller/controlNoticia/noticia_controller.php",
        success:function(data){                              
            $('#informacion2').html(data);
        }
    });
    

}


function mostrarMenu()
{    
    var grupo = document.getElementById('NombreGrupo').value;
    var tarea = document.getElementById('NombreTarea').value;
    //alert(grupo);
    $.ajax({
        type:'POST',
        data: 'opcion=mostrarMenu&grupo='+grupo+'&tarea='+tarea,        
        url: "../../controller/controlusuario/usuario.php",
        success:function(data){                              
            $('#permisos').html(data);                
        }
    });
    //alert("kjb");
}

function mostrarNoticiasTodas() {
    //alert('Ver todos');
    $.ajax({
        type:'POST',
        data: {param_opcion:'listar_all_noticias'},        
        url: "../../controller/controlNoticia/noticia_controller.php",
        success:function(data){                  
            $('#noticias_all').html(data);                                                        
        }
    });
}
