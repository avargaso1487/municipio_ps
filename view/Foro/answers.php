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
		<title>Municipio PS | Foro</title>

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
								<a href="#">Foro</a>
							</li>

							<li>
								<a href="#" class="active">Preguntas Respondidas </a>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="page-header">
									<h1>
										Preguntas Respondidas y Publicadas											
									</h1>
								</div>	
								<div class="row">
				                    <div class="col-md-12">
				                        <div id="mensaje_answer2"></div>
				                        <div class="table-header">
				                            PREGUNTAS RESPONDIDAS Y PUBLICADAS EN EL FORO&nbsp;&nbsp;				                           
				                        </div>
				                        <div>
				                            <table id="tablaRespuestas" class="table table-striped table-bordered">
				                                <thead>
				                                <tr>
				                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 5%;">N°</th>
				                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 30%;">PREGUNTA/COMENTARIO</th>
				                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 30%;">RESPUESTA PUBLICADA</th>
				                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">F. PUBLICACIÓN</th>
				                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">ESTADO</th>				                                    
				                                    <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">OPERACIONES</th>
				                                </tr>
				                                </thead>
				                                <tbody id="cuerpoRespuestas">

				                                </tbody>
				                            </table>
				                        </div>
				                    </div>				                    
				                    <!-- FIN DE CONTENIDO DE PAGINA -->
				                </div><!-- /.col -->																										
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->

					<div id="modal_answer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width: 78% !important;">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                        <h4 class="modal-title text-center">
			                        	Editar Respuesta Publicada
			                        </h4>
			                    </div>
			                    <div class="modal-body">
			                        <div id="mensaje_answer"></div>
			                        <form role="form" class="form-horizontal">
			                            <div class="form-body">
			                                <div class="row">
			                                	<input type="hidden" id="codigo_respuesta" name="codigo_respuesta">      
			                                    <div class="form-group">
			                                        <label class="col-md-2 control-label">Pregunta/Coment. *</label>
			                                        <div class="col-md-9">
			                                            <textarea type="text" class="form-control" id="pregunta_respondida" name="pregunta_respondida" disabled="disabled"></textarea> 
			                                        </div>                                        
			                                    </div>                           
			                                    <div class="form-group">
			                                        <label class="col-md-2 control-label">Respuesta *</label>
			                                        <div class="col-md-9">
			                                            <textarea type="text" class="form-control" id="respuesta_publicada" name="respuesta_publicada"></textarea> 
			                                        </div>                                          
			                                    </div>                              
			                                </div>                               
			                                <div class="row">
			                                    <div class="col-md-offset-2 col-xs-offset-0">
			                                        <span style="font-size:12px;">(*) Campos obligatorios.</span>
			                                    </div>
			                                </div>
			                            </div>
			                        </form>
			                    </div>
			                    <div class="modal-footer">
			                        <button type="button" id="btn_cancelar_editar_respuesta" class="btn dark btn-outline" data-dismiss="modal">Cancelar</button>
			                        <button type="button" id="btn_actualizar_respuesta" class="btn btn-primary">Enviar</button>
			                    </div>
			                </div>
			            </div>
					</div>

				</div>
			</div><!-- /.main-content -->
			<input type="hidden" dissabled="true" value="Foro" id="NombreGrupo">
            <input type="hidden" dissabled="true" value="Respuestas" id="NombreTarea">
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
    	<script src="../default/js/foro.js"></script>
		<!-- inline scripts related to this page -->		

	</body>
</html>
<?php } ?>
<script src="../default/js/alertas.js"></script>
<script type="text/javascript">
	alerta_mensajes();
	alerta_actividades();
</script>