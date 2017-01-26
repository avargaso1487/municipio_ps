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
	        window.onload = function(){    
			    $('#tablaNoticias').DataTable();   
			    mostrarMenu();
			    mostrarNoticia();  			    
			}


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
    	</script>
	</body>
</html>
<?php } 
} ?>

<script src="../default/js/alertas.js"></script>
<script type="text/javascript">
	alerta_mensajes();
	//alerta_actividades();
</script>