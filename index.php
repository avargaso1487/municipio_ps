<?php	
	
?>
<!DOCTYPE html>
<html lang="en">	
	<head>
		<title>Municipio PS - Foro</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/fonts/style.css">
		<link rel="stylesheet" href="assets/plugins/animate.css/animate.min.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/main-responsive.css">
		<link rel="stylesheet" href="assets/css/theme_blue.css" type="text/css" id="skin_color">
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" href="assets/plugins/summernote/build/summernote.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-social-buttons/social-buttons-3.css">
		<link rel="stylesheet" href="view/default/css/style.css" />
		<link rel="stylesheet" href="assets/plugins/flex-slider/flexslider.css">
		<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<style type="text/css">
			.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
    background-color: #0c2c4e;
    border-color: #0c2c4e;
    color: #FFFFFF;
}
		</style>				
	</head>
	<!-- end: HEAD -->
	<body>
		<!-- start: HEADER -->
		<header>						
			<div role="navigation" class="navbar navbar-default navbar-fixed-top" style="background: rgb(228, 228, 228);">
				<!-- start: TOP NAVIGATION CONTAINER -->
				<div class="container">
					<div class="navbar-header">
						<!-- start: RESPONSIVE MENU TOGGLER -->
						<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- end: RESPONSIVE MENU TOGGLER -->
						<!-- start: LOGO -->
						<a class="navbar-brand"  style="color: #000000;">
							FORO ESCOLAR PS <i class="clip-bubbles-2" style="color: #3d9400"></i>
						</a>
						<!-- end: LOGO -->
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="active">
								<a href="#">
									Inicio
								</a>
							</li>
							<li>
								<a href="#" id="btn_nueva_pregunta">
									Comentario
								</a>
							</li>
							<li>
								<a href="view/home/login.php">
									Municipio
								</a>
							</li>	
							<li class="purple" id="alertaspa">							
							</li>
							<li>
								<a href="http://ps.edu.pe/psweb/" target="_blank">
									Portal Web
								</a>
							</li>

							
							
						</ul>
					</div>
				</div>
				<!-- end: TOP NAVIGATION CONTAINER -->
			</div>
		</header>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">						
			<section class="wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="blog-posts" id="cuerpo_foro">
																
								
							</div>
						</div>
						<div class="col-md-6">
							<aside class="sidebar">
								<h1>Noticias</h1><br>								
								<div id="noticias">
									
								</div>		
							</aside>	
						</div>
					</div>
				</div>
				<div id="modal_pregunta" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Enviar mi comentario</h4>
					</div>
					<div class="modal-body">
						<div id="mensaje"></div>
						<div class="row">		
							<div class="col-md-4" style="width: 30%;">
								<img class="img img-responsive" src="assets/images/pregunta.png">
								<i>(<span class="symbol required">)</span> Datos obligatorios</i>
							</div>				
							<div class="col-md-8">
								<div class="col-md-12 form-group">
									<label class="control-label">
										NOMBRES <span class="symbol required"></span>
									</label>
									<input type="text" id="nombre_estudiante" name="nombre_estudiante" class="form-control" maxlength="100" onkeypress="return soloLetras(event)">
								</div>
								<div class="col-md-12 form-group">
									<label class="control-label">
										APELLIDOS <span class="symbol required"></span>
									</label>
									<input type="text" id="apellido_estudiante" name="apellido_estudiante" class="form-control" maxlength="100" onkeypress="return soloLetras(event)">
								</div>
								<div class="col-md-12 form-group">
									<label class="control-label">
										CÓDIGO ESTUDIANTE <span class="symbol required"></span>
									</label>
									<input type="text" id="codigo_estudiante" name="codigo_estudiante" class="form-control" maxlength="7">
								</div>
								<div class="col-md-12 form-group">
									<label class="control-label">
										MENSAJE <span class="symbol required"></span>
									</label>
									<textarea type="text" id="mensaje_estudiante" name="mensaje_estudiante" class="form-control" rows="3"></textarea> 
								</div>
								<div class="col-md-12">
									<label class="control-label">
										CÓDIGO <span class="symbol required"></span>
									</label>									
								</div>
								<div class="col-md-6">
									<input type="text" id="codigo_captcha" name="codigo_captcha" class="form-control">
								</div>
								<div class="col-md-6">
									<input type="text" id="captcha" name="captcha" class="form-control text-center" style="background-color: #0c173e; font-size: 18px; font-weight: 500; color: white;" disabled="disabled" >
								</div>
							</div>						
												
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-grey" id="btn_cancelar_pregunta">
							Cancelar
						</button>
						<button type="button" class="btn btn-primary" id="btn_enviar_pregunta">
							Enviar
						</button>
					</div>
					<input type="hidden" dissabled="true" value="Principal" id="NombreGrupo">
            		<input type="hidden" dissabled="true" value="Principal" id="NombreTarea">
				</div>
			</section>
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
			
			<div class="footer-copyright navbar-fixed-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<a class="logo" href="#" style="color: #b0b6bd;">
								MUNICIPIO ESCOLAR PS
							</a>
						</div>
						<div class="col-md-4">
							<p style="color: #b0b6bd;">
								&copy; Copyright 2017 by BSE. Todos los derechos reservados.
							</p>
						</div>
						<div class="col-md-4">
							<nav id="sub-menu">
								<ul>									
									<li>
										<a href="#" style="color: #b0b6bd;">
											Inicio
										</a>
									</li>
									<li>
										<a href="view/home/login.php" style="color: #b0b6bd;">
											Municipio
										</a>
									</li>
									<li>
										<a href="http://ps.edu.pe/psweb/" target="_blank" style="color: #b0b6bd;">
											Portal Web
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
	
		<a id="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
		<!-- end: FOOTER -->
		<!-- start: MAIN JAVASCRIPTS -->		
		<script src="assets/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/plugins/jquery.transit/jquery.transit.js"></script>
		<script src="assets/plugins/hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
		<script src="assets/plugins/jquery.appear/jquery.appear.js"></script>
		<script src="assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="assets/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="assets/plugins/flex-slider/jquery.flexslider.js"></script>
		<script src="assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
		<script src="assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
		<script src="assets/js/ui-modals.js"></script>
		<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="assets/plugins/summernote/build/summernote.min.js"></script>
		<script src="assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="assets/js/form-validation.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="view/default/js/principal.js"></script>

		<script>
			jQuery(document).ready(function() {
				Main.init();				
			});
		</script>
	</body>
</html>