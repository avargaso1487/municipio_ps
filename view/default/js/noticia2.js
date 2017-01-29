window.onload = function(){    
   
    
    mostrarNoticiasInformacion2();
    
};


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

