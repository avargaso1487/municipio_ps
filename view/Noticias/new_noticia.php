<?php 
	session_start();
	if(!isset($_SESSION['usuario']))
	{
		header("Location:../../index.php");
	}
	else
	{
		date_default_timezone_set('America/Lima');
 ?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blank Page - Ace Admin</title>

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
									<form id="frmNoticia" class="form-horizontal">				                        
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
												<label class="radio-inline ace"><input type="radio" id="param_multimedia" name="param_multimedia" class="ace" onclick="seleccionarImagen()" value="I"><span class="lbl">&nbsp;SOLO IMAGEN</label>
												<label class="radio-inline ace"><input type="radio" id="param_multimedia" name="param_multimedia" class="ace" onclick="seleccionarvideo()" value="V"><span class="lbl">&nbsp;SOLO video</label>
												<label class="radio-inline ace"><input type="radio" id="param_multimedia" name="param_multimedia" class="ace" onclick="seleccionarAmbos()" value="A"><span class="lbl">&nbsp;AMBOS</label>
											</div>											
			                            </div>
			                            <div class="form-group"> 
                                			<label for="socio" class="col-md-2 control-label">IMAGEN: </label>
                                   			<div class="col-md-4">
                                        		<input id="Imagen" name="Imagen" type="file" disabled="disabled">
                                   			</div>  
                                   			<label for="socio" class="col-md-1 control-label">VIDEO: </label>
                                   			<div class="col-md-4">
                                        		<input id="video" name="video" type="file" disabled="disabled">
                                   			</div>                                           			
                                		</div> 
			                            <div class="form-group">		                               
			                               <label for="titulo" class="col-md-2 control-label" >CONTENIDO:</label>
			                               <div class="col-md-9">
						                        <textarea class="editor-plantilla" name="editor-plantilla" required ></textarea>
						                    </div>				                                                   
			                            </div> 
			                            
			                            <div class="modal-footer">		                            		
		                            		<button type="button" class="btn btn-primary" id="register_inscripcion">Registrar</button> 		                            		          
		                        		</div>					                                      
				                    </form>
								</div>																			
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<input type="hidden" dissabled="true" value="Noticias" id="NombreGrupo">
            <input type="hidden" dissabled="true" value="Nueva Noticia" id="NombreTarea">
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

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

			$(function () {
				CKEDITOR.replace('editor-plantilla');
				objEditor = CKEDITOR.instances['editor-plantilla'];	

				$('#register_inscripcion').on('click', function(){  		
					var multimedia = $('input:radio[name=param_multimedia]:checked').val();   		
			        var contenido = objEditor.getData();
			        var param_opcion = 'register_noticia';

			        var param_titulo = document.getElementById('param_titulo').value;
			        var param_resumen = document.getElementById('param_resumen').value;

			        if (contenido == '' || param_titulo == '' || param_resumen == '') {
			        	alert('Todos los Campos son Obligatorios');
			        } else {
			        	var formData = new FormData($("#frmNoticia")[0]);
				      formData.append("multimedia", multimedia);    
				      formData.append("contenido", contenido);                
				      formData.append("param_opcion", param_opcion); 
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
				          	            
				        	$('#Imagen').ace_file_input('reset_input');
				        	$('#video').ace_file_input('reset_input');
				        
				        });
			        }		        
					//console.log(contenido); 
					
				}); 

			});


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


    	</script>


	</body>
</html>
<?php } ?>
<script src="../default/js/alertas.js"></script>
<script type="text/javascript">
	alerta_mensajes();
	//alerta_actividades();
</script>