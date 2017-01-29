<?php 
	session_start();
	if(!isset($_SESSION['usuario']))
	{
		header("Location:../../index.php");
	}
	else
	{
		if ($_SESSION['usuarioExtraordinario'] == 0) {  ?>
			<script type="text/javascript">	
				alert('No puede ingresar a esta opcion, no cuenta con el permiso adecuado.');
				window.location.href = "noticia.php"; 
			</script>
		<?php 
		} else {
			date_default_timezone_set('America/Lima');

		
 ?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Gestionar Noticias</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../default/assets/css/bootstrap.min.css" />
	    <link rel="stylesheet" href="../default/assets/font-awesome/4.2.0/css/font-awesome.min.css" />
	    
	    <link rel="stylesheet" href="../default/assets/fonts/fonts.googleapis.com.css" />
	    <link rel="stylesheet" href="../default/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	    <link rel="stylesheet" href="../default/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	        
	    <link rel="stylesheet" href="../default/css/home.css" />
	    <link rel="stylesheet" href="../default/css/style.css" />

	    <script src="../default/assets/js/ace-extra.min.js"></script>
	</head>

	<body class="no-skin">


	<?php 
	require('../sup_layout.php');
	 ?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				
				<ul class="nav nav-list" id="permisos">                    
                                
                </ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Noticias</a>
							</li>

							<li>
								<a href="#" class="active">Registrar Noticia</a>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="page-header">
									<h1>
										Registrar Noticia											
									</h1>
								</div>	
								<div class="col-xs-12">
									<div class="table-header">
									NOTICIAS REGISTRADAS &nbsp;&nbsp;									
								</div>
								<div>
									<table id="tablaNoticias" class="table table-striped table-bordered">
										<thead>											
								            <tr>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">N°</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 40%;">TITULO</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 20%;">AUTOR</th>			
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">FECHA Y HORA</th>			
                								<th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">OPERACIONES</th>
								            </tr>							         
										</thead>
										<tbody id="cuerpoNoticias">																	
										</tbody>
									</table>
								</div>
								</div>																			
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<input type="hidden" dissabled="true" value="Noticias" id="NombreGrupo">
            <input type="hidden" dissabled="true" value="Gestionar Noticia" id="NombreTarea">
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">BSE</span>
							&copy; 2017
						</span>						
					</div>
				</div>					
			</div>
	
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<div class="modal fade" id="modalNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 78% !important;">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title text-center"><b>Editar Noticia</b></h4>
                </div>
                <div class="modal-body">               
               
                <form id="frmNoticia" class="form-horizontal">
                    <div class="row">
                    	<input class="form-control" id="noticia" name="noticia" type="hidden">
                        <div class="form-group">		                               
                           <label for="titulo" class="col-md-2 control-label" >TITULO:</label>
                           <div class="col-md-9">
                               <input class="form-control" placeholder="Ingrese título de la noticia" id="param_titulo" name="param_titulo" type="text" autofocus="" required >
                               
                           </div>				                                                   
                        </div> 
                        <div class="form-group">		                               
                           <label for="titulo" class="col-md-2 control-label" >RESUMEN:</label>
                           <div class="col-md-9">
                               <textarea name="param_resumen" id="param_resumen" cols="113" rows="3" placeholder="Ingrese un breve resumen sobre la noticia" required ></textarea>
                           </div>				                                                   
                        </div> 
                        <div class="form-group">			                               
                           <label for="socio" class="col-md-2 control-label">MULTIMEDIA: </label>
							<div class="col-md-9">
								<label class="radio-inline ace"><input type="radio" id="radio_I" name="param_multimedia" class="ace" onclick="seleccionarImagen()" value="I"><span class="lbl">&nbsp;SOLO IMAGEN</label>
								<label class="radio-inline ace"><input type="radio" id="radio_V" name="param_multimedia" class="ace" onclick="seleccionarvideo()" value="V"><span class="lbl">&nbsp;SOLO VIDEO</label>
								<label class="radio-inline ace"><input type="radio" id="radio_A" name="param_multimedia" class="ace" onclick="seleccionarAmbos()" value="A"><span class="lbl">&nbsp;AMBOS</label>
								<label class="radio-inline ace"><input type="radio" id="radio_N" name="param_multimedia" class="ace" onclick="seleccionarNinguno()" value="N"><span class="lbl">&nbsp;NINGUNO</label>
							</div>											
                        </div>
                        <div class="form-group"> 
                			<label for="socio" class="col-md-2 control-label">IMAGEN: </label>
                   			<div class="col-md-4">
                        		<input id="Imagen" name="Imagen" type="file">
                   			</div>  
                   			<label for="socio" class="col-md-1 control-label">VIDEO: </label>
                   			<div class="col-md-4">
                        		<input id="video" name="video" type="file">
                   			</div>                                           			
                		</div> 
                        <div class="form-group">		                               
                           <label for="titulo" class="col-md-2 control-label" >CONTENIDO:</label>
                           <div class="col-md-9">
		                        <textarea class="editor-plantilla" name="editor-plantilla" required ></textarea>
		                    </div>				                                                   
                        </div>	                          
                                                                                                                                                                                                                                                  		                          
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="cancel_noticia">Cancelar</button> 
                            <button type="button" class="btn btn-primary" id="modificar_noticia">Registrar</button>            
                        </div>
                </form>                       
                </div>
              </div>
            </div>
        </div>
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../default/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='Recursos/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../default/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>		
		<script src="../default/assets/js/jquery.2.1.1.min.js"></script>
		<script src="../default/assets/js/bootstrap.min.js"></script>
		<script src="../default/assets/js/chosen.jquery.min.js"></script>
		<script src="../default/assets/js/jquery.dataTables.min.js"></script>
		<script src="../default/assets/js/jquery.dataTables.bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<!-- ace scripts -->
		<script src="../default/assets/js/ace-elements.min.js"></script>
		<script src="../default/assets/js/ace.min.js"></script>
		<script src="../ckeditor/ckeditor.js"></script>
    	<script src="../default/js/noticia.js"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">	
			$('#id-input-file-1 , #Imagen').ace_file_input({
                no_file:'Ajuntar Imagen...',
                btn_choose:'Choose',
                btn_change:'Change',
                droppable:false,
                onchange:null,
                thumbnail:false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });

            $('#id-input-file-2 , #video').ace_file_input({
                no_file:'Ajuntar video...',
                btn_choose:'Choose',
                btn_change:'Change',
                droppable:false,
                onchange:null,
                thumbnail:false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });

            var objEditor;

	        window.onload = function(){    
			    $('#tablaNoticias').DataTable();   
			    mostrarMenu();
			    mostrarNoticia();  			    
			}


			$(function () {
				CKEDITOR.replace('editor-plantilla');
				objEditor = CKEDITOR.instances['editor-plantilla'];	

				$('#modificar_noticia').on('click', function(){  		
					var multimedia = $('input:radio[name=param_multimedia]:checked').val();   		
			        var contenido = objEditor.getData();
			        var param_opcion = 'update_noticia';

			        var param_titulo = document.getElementById('param_titulo').value;
			        var param_resumen = document.getElementById('param_resumen').value;
			        //var noticia = document.getElementById('noticia').value;

			        if (contenido == '' || param_titulo == '' || param_resumen == '') {
			        	alert('Todos los Campos son Obligatorios');
			        } else {
			        	var formData = new FormData($("#frmNoticia")[0]);
				      formData.append("multimedia", multimedia);    
				      formData.append("contenido", contenido);                
				      formData.append("param_opcion", param_opcion);
				      //formData.append("noticia", noticia); 
				        $.ajax({
				          url: '../../controller/controlNoticia/noticia_controller.php',
				          type:'POST',
				          data:formData,
				          cache:false,
				          processData:false,
				          contentType:false,
				        }).done(function(resp){            
				          	alert('Registro Correcto');	
				          	document.getElementById("param_titulo").value='';
				          	document.getElementById("param_resumen").value='';
				          	objEditor.setData('');
				          	$('#modalNoticia').modal('hide');        
        					mostrarNoticia();          
				        	$('#Imagen').ace_file_input('reset_input');
				        	$('#video').ace_file_input('reset_input');

				        	//window.location.href = "noticia.php"; 
				        
				        });
			        }		        
					//console.log(contenido); 
					
				}); 


				$('#cancel_noticia').on('click', function(){  		
					$('#modalNoticia').modal('hide');        
        			mostrarNoticia();					
				}); 
				

			});


			function mostrarNoticia() {
				$.ajax({
			        type:'POST',
			        data: {param_opcion:'listar_noticias_extraordinario'},        
			        url: "../../controller/controlNoticia/noticia_controller.php",
			        success:function(data){        		     
			        	$('#tablaNoticias').DataTable().destroy();
				        $('#cuerpoNoticias').html(data);
				        $('#tablaNoticias').DataTable();                                                       
			        }
			    });
			}

			function eliminar(noticia) {
				  var respuesta = confirm('¿Desea eliminar la noticia seleccionada?');
				  if (respuesta == true) {
				    //alert('Acepto');
			        var param_opcion = 'eliminar_noticia';
			        $.ajax({
			            type: 'POST',
			            data:'param_opcion='+param_opcion+'&noticia='+noticia,
			            url: "../../controller/controlNoticia/noticia_controller.php",
			            success: function(data){
			                alert('Noticia se elimino correctamente.');				                
			                mostrarNoticia();
			            }				            
			          });
				  } else {
				    if (respuesta == false) {
				      mostrarNoticia();
				    }
				  }   				
			}

			function editar(noticia) {
				  //alert(noticia);
				  $('#modalNoticia').modal({
		            show:true,
		            backdrop:'static',
		        });
				document.getElementById('noticia').value = noticia;
				var param_opcion = 'recuperar_datos'
				  $.ajax({
				      type: 'POST',
				      data:'param_opcion='+param_opcion+'&noticia='+noticia,
				      url: "../../controller/controlNoticia/noticia_controller.php",
				      success: function(data){
				        objeto=JSON.parse(data);
				        $("#param_titulo").val(objeto[0]);        
				        $("#param_resumen").val(objeto[1]);				       
				        objEditor.setData(objeto[2]);
				        document.getElementById('radio_'+objeto[3]).checked = true;
				        var multimedia = $('input:radio[name=param_multimedia]:checked').val(); 
				        //alert(multimedia);
				        if (multimedia == 'I') {
				        	document.getElementById('Imagen').disabled = false;
							document.getElementById('video').disabled = true;
				        } else {
				        	if (multimedia == 'V') {
				        		document.getElementById('Imagen').disabled = true;
								document.getElementById('video').disabled = false;
				        	} else {
				        		if (multimedia == 'A') {
				        			document.getElementById('Imagen').disabled = false;
									document.getElementById('video').disabled = false;
				        		} else {
				        			document.getElementById('Imagen').disabled = true;
									document.getElementById('video').disabled = true;
				        		}
				        	}
				        }

				        $('#imagen').ace_file_input('reset_input');				        
				      },
				      error: function(data){

				      }
				  });

			}
			
			function mostrarMenu() {    
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

			function seleccionarImagen() {	
				document.getElementById('Imagen').disabled = false;
				document.getElementById('video').disabled = true;
			}

			function seleccionarvideo() {	
				document.getElementById('Imagen').disabled = true;
				document.getElementById('video').disabled = false;
			}

			function seleccionarAmbos() {	
				document.getElementById('Imagen').disabled = false;
				document.getElementById('video').disabled = false;
			}

			function seleccionarNinguno() {	
				document.getElementById('Imagen').disabled = true;
				document.getElementById('video').disabled = true;
			}


    	</script>
	</body>
</html>
<?php } 
} ?>

<script src="../default/js/alertas.js"></script>
<script type="text/javascript">
	alerta_mensajes();
	alerta_actividades();
</script>