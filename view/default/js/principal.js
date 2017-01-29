window.onload = function () {

    mostrarForo();
    alerta_spa();
    mostrarNoticias();
	$('*').bind("cut copy paste",function(e) {
		e.preventDefault();
    });

    $('#btn_nueva_pregunta').on('click', function () {
    	document.getElementById('nombre_estudiante').value = '';
    	document.getElementById('apellido_estudiante').value = '';
    	document.getElementById('codigo_estudiante').value = '';
    	document.getElementById('mensaje_estudiante').value = '';
    	document.getElementById('codigo_captcha').value = '';
    	codigoCaptcha();
    	$('#modal_pregunta').modal({
            show:true,
            backdrop:'static',
        });

    });

    $('#btn_cancelar_pregunta').on('click', function () {
        $('#modal_pregunta').modal('hide');
    })
    
}

$(function () {

	$('#btn_enviar_pregunta').on('click', function () {
        var opcion				= 'registrar_pregunta';
        var nombre_estudiante   = document.getElementById('nombre_estudiante').value;
    	var apellido_estudiante = document.getElementById('apellido_estudiante').value;
    	var codigo_estudiante   = document.getElementById('codigo_estudiante').value;
    	var mensaje_estudiante  = document.getElementById('mensaje_estudiante').value;
    	var codigo_captcha 		= document.getElementById('codigo_captcha').value;
    	var captcha  	        = document.getElementById('captcha').value;
    	if (nombre_estudiante.length == 0 || apellido_estudiante.length == 0 || codigo_estudiante.length == 0 || mensaje_estudiante.length == 0 ||
    		codigo_captcha.length == 0) {
    		$('#mensaje').html('<p class="alert alert-danger">Ingrese los campos obligatorios (*)</p>').show(200).delay(1500).hide(200);
    	} else {
    		if (codigo_captcha != captcha) {    			
    			$('#mensaje').html('<p class="alert alert-danger">Código captha erróneo</p>').show(200).delay(1500).hide(200);
    			codigoCaptcha();
    			document.getElementById('codigo_captcha').value = '';
    			document.getElementById('codigo_captcha').focus();
    		} else {
    			$.ajax({
    				type 	 : 'POST',
    				data 	 : 'opcion='+opcion+'&nombre_estudiante='+nombre_estudiante+'&apellido_estudiante='+apellido_estudiante
    							+'&codigo_estudiante='+codigo_estudiante+'&mensaje_estudiante='+mensaje_estudiante,
    				dataType : 'json',
    				encode   : true,
    				url		 : 'controller/controlForo/foro_controller.php',
    				success : function(data){	    					
						if (data == 1)	{		
							$('#modal_pregunta').modal('hide');							
							alert('Sus datos fueron enviados. Espera la respuesta a tu consulta.');
						} else {
							alert('Error al enviar sus datos');	
						}
					}
    			});
    		}
    	}
    });
   

});

function mostrarForo()
{    
    var opcion = 'mostrar_foro';
     $.ajax({
        type:'POST',
        data: 'opcion='+opcion,        
        url: "controller/controlForo/foro_controller.php",
        success:function(data){                              
            $('#cuerpo_foro').html(data);                
        }
    });
    
}

function codigoCaptcha () {
	var opcion = 'codigo_captcha';
	$.ajax({
		type : 'POST',
		data : 'opcion='+opcion,
		dataType : 'json',
		encode : true,	
		url  : 'controller/controlForo/captcha_controller.php',
		success : function(data){			
			document.getElementById('captcha').value = data.captcha;			
		}
	})
}

function mostrarNoticias() {
    $.ajax({
        type:'POST',
        data: {param_opcion:'listar_noticias2'},        
        url: "controller/controlNoticia/noticia_controller.php",
        success:function(data){                  
            $('#noticias').html(data);                                                        
        }
    });
}

function soloNumeros(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    numeros = "0123456789";
    especiales = "8-37-38-46"
    teclado_especial=false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial= true;
        }
    }

    if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
        return false;
    }
}

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function alerta_spa()
{
    $.ajax({
        type:'POST',
        data: {opcion:'alerta_spa'},
        url: "controller/controlusuario/usuario.php",
        success:function(data){                          
            $('#alertaspa').html(data);
        }
    }); 
}