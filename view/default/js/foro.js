window.onload = function () {

    mostrarMenu(); 
    $('#tablaPreguntas').DataTable();
    $('#tablaRespuestas').DataTable();
    mostrarPreguntas();
    mostrarRespuestas();

    $('#btn_cancelar_pregunta').on('click', function () {
        $('#modal_pregunta').modal('hide');
    })

    $('#btn_cancelar_respuesta').on('click', function () {
        $('#modal_question').modal('hide');
    })

    $('#btn_cancelar_editar_respuesta').on('click', function () {
        $('#modal_answer').modal('hide');
    })

}

$(function () {
	
    $('#btn_enviar_respuesta').on('click', function () {
        var opcion      = 'registrar_respuesta';
        var id_pregunta = document.getElementById('codigo_pregunta').value;
        var mensaje     = document.getElementById('respuesta_pregunta').value;        
        $.ajax({
            type     : 'POST',
            data     : 'opcion='+opcion+'&id_pregunta='+id_pregunta+'&mensaje='+mensaje,
            dataType : 'json',
            encode   : true,
            url      : '../../controller/controlForo/respuesta_controller.php',
            success : function(data){                           
                if (data == 1)  {       
                    $('#modal_question').modal('hide');                         
                    $('#mensaje2').html('<p class="alert alert-success">La respuesta se ENVÍO Y PUBLICÓ CORRECTAMENTE.</p>').show(200).delay(2000).hide(200);
                    mostrarPreguntas();
                } else {
                    $('#mensaje2').html('<p class="alert alert-danger">Ocurrió un problema técnico.</p>').show(200).delay(2000).hide(200);
                }
            }
        });        
    });

    $('#btn_actualizar_respuesta').on('click', function ()  {
        var opcion            = 'editar_respuesta';
        var id_respuesta      = document.getElementById('codigo_respuesta').value;
        var mensaje_respuesta = document.getElementById('respuesta_publicada').value;
        if (mensaje_respuesta.length == 0){ 
            $('#mensaje_answer').html('<p class="alert alert-danger">Ingrese el mensaje de respuesta a la pregunta y/o comentario (*)</p>').show(200).delay(1500).hide(200);
        } else {
            $.ajax({
                type     : 'POST',
                data     : 'opcion='+opcion+'&id_respuesta='+id_respuesta+'&mensaje='+mensaje_respuesta,
                dataType : 'json',
                encode   : true,
                url      : '../../controller/controlForo/respuesta_controller.php',
                success : function(data){                           
                    if (data == 1)  {       
                        $('#modal_answer').modal('hide');                         
                        $('#mensaje_answer2').html('<p class="alert alert-success">La respuesta se ACTUALIZÓ CORRECTAMENTE.</p>').show(200).delay(2000).hide(200);
                        mostrarRespuestas();
                    } else {
                        $('#mensaje_answer2').html('<p class="alert alert-danger">Ocurrió un problema técnico.</p>').show(200).delay(2000).hide(200);
                    }
                }
            });
        }
    });

});

function mostrarMenu()
{    
    var grupo = document.getElementById('NombreGrupo').value;
    var tarea = document.getElementById('NombreTarea').value;
     $.ajax({
        type:'POST',
        data: 'opcion=mostrarMenu&grupo='+grupo+'&tarea='+tarea,        
        url: "../../controller/controlusuario/usuario.php",
        success:function(data){                              
            $('#permisos').html(data);                
        }
    });
    
}

function mostrarPreguntas()
{
    var opcion = 'mostrar_preguntas';
    $.ajax({
        type:'POST',
        data: 'opcion='+opcion,
        url: "../../controller/controlForo/pregunta_controller.php",
        success:function(data){         
            $('#tablaPreguntas').DataTable().destroy();                     
            $('#cuerpoPreguntas').html(data);  
            $('#tablaPreguntas').DataTable();              
        }
    });
}

function mostrarRespuestas()
{
    var opcion = 'mostrar_respuestas';
    $.ajax({
        type:'POST',
        data: 'opcion='+opcion,
        url: "../../controller/controlForo/respuesta_controller.php",
        success:function(data){         
            $('#tablaRespuestas').DataTable().destroy();                     
            $('#cuerpoRespuestas').html(data);  
            $('#tablaRespuestas').DataTable();              
        }
    });
}

function responderPregunta(id)
{
    var opcion = 'datos_pregunta';
    document.getElementById('codigo_pregunta').value = ''; 
    document.getElementById('nombre_estudiante_pregunta').value = ''; 
    document.getElementById('apellido_estudiante_pregunta').value = ''; 
    document.getElementById('codigo_estudiante_pregunta').value = ''; 
    document.getElementById('fecha_registro_pregunta').value = ''; 
    document.getElementById('pregunta_estudiante').value = '';
    document.getElementById('respuesta_pregunta').value = ''; 
    $('#modal_question').modal({
        show:true,
        backdrop:'static',
    });    
     $.ajax({
        type     :'POST',
        data     : 'opcion='+opcion+'&id_pregunta='+id,
        dataType : 'json',
        encode   : true,
        url: "../../controller/controlForo/pregunta_controller.php",
        success:function(data){         
            if (data.length > 0) {
                $.each(data, function (i, value) {
                    $('#codigo_pregunta').val(value[0]);
                    $('#nombre_estudiante_pregunta').val(value[1]);
                    $('#apellido_estudiante_pregunta').val(value[2]);
                    $('#codigo_estudiante_pregunta').val(value[3]);
                    $('#fecha_registro_pregunta').val(value[4]);
                    $('#pregunta_estudiante').val(value[5]);   
                    document.getElementById('respuesta_pregunta').focus();                 
                })
            }               
        }
    });
}

function editarRespuesta(id) {
    var opcion = 'datos_respuesta';
    document.getElementById('pregunta_respondida').value = '';
    document.getElementById('respuesta_publicada').value = ''; 
    $('#modal_answer').modal({
        show:true,
        backdrop:'static',
    });
    $.ajax({
        type     :'POST',
        data     : 'opcion='+opcion+'&id_respuesta='+id,
        dataType : 'json',
        encode   : true,
        url: "../../controller/controlForo/respuesta_controller.php",
        success:function(data){         
            if (data.length > 0) {
                $.each(data, function (i, value) {
                    $('#codigo_respuesta').val(value[0]);
                    $('#pregunta_respondida').val(value[1]);
                    $('#respuesta_publicada').val(value[2]);                      
                })
            }               
        }
    });
}


function eliminar() {
    var codigo_pregunta = document.getElementById('codigo_pregunta').value;
    console.log(codigo_pregunta);
    eliminarPregunta(codigo_pregunta);
    $('#modal_question').modal('hide');
}

function eliminarPregunta(id){
    var respuesta = confirm('¿Desea ELIMINAR la pregunta y/o comentario?');
    if (respuesta == true) {
        var opcion = 'eliminar_pregunta';
        var estado = 0;
        $.ajax({
            type: 'POST',
            data:  'opcion='+opcion+'&id_pregunta='+id+'&estado_pregunta='+estado,
            url: "../../controller/controlForo/pregunta_controller.php",
            success: function(data){                
                mostrarPreguntas();
                $('#mensaje2').html('<p class="alert alert-danger">Se ELIMINÓ la pregunta y/o comentario seleccionado.</p>').show(200).delay(2000).hide(200);
            },
            error: function(data){
                $('#cuerpoPreguntas').html(data);
            }
        });
    }
}

function activarPregunta(id){
    var respuesta = confirm('¿Desea ACTIVAR la pregunta y/o comentario?');
    if (respuesta == true) {
        var opcion = 'activar_pregunta';
        var estado = 1;
        $.ajax({
            type: 'POST',
            data:  'opcion='+opcion+'&id_pregunta='+id+'&estado_pregunta='+estado,
            url: "../../controller/controlForo/pregunta_controller.php",
            success: function(data){                
                mostrarPreguntas();
                $('#mensaje2').html('<p class="alert alert-success">Se ACTIVÓ la pregunta y/o comentario seleccionado.</p>').show(200).delay(2000).hide(200);
            },
            error: function(data){
                $('#cuerpoPreguntas').html(data);
            }
        });
    } else {
        // NADA
    }
}

function eliminarRespuesta(id){
    var respuesta = confirm('¿Desea ELIMINAR la respuesta publicada?');
    if (respuesta == true) {
        var opcion = 'eliminar_respuesta';
        var estado = 0;
        $.ajax({
            type: 'POST',
            data:  'opcion='+opcion+'&id_respuesta='+id+'&estado_respuesta='+estado,
            url: "../../controller/controlForo/respuesta_controller.php",
            success: function(data){                
                mostrarRespuestas();
                $('#mensaje_answer2').html('<p class="alert alert-danger">Se ELIMINÓ la publicación de la respuesta seleccionada.</p>').show(200).delay(2000).hide(200);
            },
            error: function(data){
                $('#cuerpoRespuestas').html(data);
            }
        });
    } else {
        // NADA
    }
}

function activarRespuesta(id){
    var respuesta = confirm('¿Desea ACTIVAR la publicación de la respuesta?');
    if (respuesta == true) {
        var opcion = 'activar_respuesta';
        var estado = 1;
        $.ajax({
            type: 'POST',
            data:  'opcion='+opcion+'&id_respuesta='+id+'&estado_respuesta='+estado,
            url: "../../controller/controlForo/respuesta_controller.php",
            success: function(data){                
                mostrarRespuestas();
                $('#mensaje_answer2').html('<p class="alert alert-success">Se ACTIVÓ la publicación respuesta seleccionada.</p>').show(200).delay(2000).hide(200);
            },
            error: function(data){
                $('#cuerpoRespuestas').html(data);
            }
        });
    } else {
        // NADA
    }
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
