
<?php 
	session_start();
	if(!isset($_SESSION['usuario']))
	{
		header("Location:../../index.php");
	}
	else
	{
		date_default_timezone_set('America/Lima');
		$noticiaID = "";
		if(isset($_GET["noticia"])){
			$noticiaID = $_GET["noticia"];
		}
 ?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Noticia</title>

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
								<a href="#">Noticia</a>
							</li>							
						</ul><!-- /.breadcrumb -->
						
					</div>

					<div class="page-content">
						

						<div class="row">
							<input type="hidden" value="<?php echo $noticiaID ?>" name = 'param_noticiaID' id = 'param_noticiaID'>
							<div class="col-xs-12">
								<div class="col-xs-8" id="informacion">
																		
																										
								</div>
								<div class="col-xs-4">
									<div class="page-header">
										<h1>
											Calendario											
										</h1>
									</div>
									<p>SECCION DE CALENDARIO</p>
								</div>
															
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<input type="hidden" dissabled="true" value="Noticias" id="NombreGrupo">
            <input type="hidden" dissabled="true" value="Noticias" id="NombreTarea">
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
    	<script src="../default/js/noticia.js"></script>
		<!-- inline scripts related to this page -->
	

	</body>
</html>

<?php } ?>
<script src="../default/js/alertas.js"></script>
<script type="text/javascript">
	alerta_mensajes();
	//alerta_actividades();
</script>