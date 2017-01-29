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
		<title>Acceso y Seguridad - Usuarios</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../default/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../default/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../default/assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../default/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />


		<!-- ace settings handler -->
		<script src="../default/assets/js/ace-extra.min.js"></script>
		<style type="text/css">
		    .datepicker{z-index:1151 !important;}
		</style>
		
	</head>

	<body class="no-skin">
		<?php 
		require('../sup_layout.php');
		 ?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive">
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
                                <a href="#">Acceso y Seguridad</a>
                            </li>
                            <li>Usuarios</li>
                        </ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								USUARIOS CREADOS
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-md-12">								
								<div class="table-header">
									Lista de Usuarios del Sistema &nbsp;&nbsp;
									<a  href="#modalUsuarios" id="new_usuario" data-toggle='modal' onclick="nuevo();" class='white'>
			                            <i class='ace-icon fa fa-plus-circle bigger-150'></i>
			                        </a>
								</div>
								<div>
									<table id="tablaUsuarios" class="table table-striped table-bordered">
										<thead>											
								            <tr>								                			               
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 24%;">COLABORADOR</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">LOGIN</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">ROL</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 11%;">CREACIÓN</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 11%;">CESE</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 11%;">ESTADO</th>	
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 13%;">OPERACIONES</th>	
								            </tr>							         
										</thead>
										<tbody id="cuerpoUsuarios">																	
										</tbody>
									</table>
								</div>
							</div>				
							<input type="hidden" dissabled="true" value="Acceso y Seguridad" id="NombreGrupo">
                            <input type="hidden" dissabled="true" value="Usuarios" id="NombreTarea">			
							<!-- FIN DE CONTENIDO DE PAGINA -->										               
						</div><!-- /.col -->
					</div>		            
				</div><!-- /.page-content -->														

				<div class="modal fade" id="modalUsuarios" tabindex="-1">
					<div class="modal-dialog" style="width: 60% !important;">
						<div class="modal-content">
							<div class="modal-header">
								
								<h3 class="blue bigger">DATOS DEL USUARIO</h3>
							</div>
							<form  method="POST" id="form_usuario">
								<div class="modal-body">
									<div class="row">
										<div class="modal-body col-md-12">
												
											<div style="display:none;" class="form-group col-md-4">												
												<div class="input-group">												
													<input type="text" class='col-md-12' name="param_usuarioId" id="param_usuarioId" disabled="true">
												</div>
											</div>										

											<div class="form-group col-md-6">
												<label for="param_usuarioNombre">Nombres</label>
												<div class="input-group col-md-12">													
													<input class="col-md-12" type="text"  name="param_usuarioNombre" id="param_usuarioNombre"/>
												</div>
											</div>											

											<div class="form-group col-md-6">
												<label for="param_usuarioApellidos">Apellidos</label>
												<div class="input-group col-md-12">													
													<input class="col-md-12" type="text"  name="param_usuarioApellidos" id="param_usuarioApellidos"/>
												</div>
											</div>

											<div class="form-group col-md-3">
												<label for="param_usuarioDNI">DNI</label>
												<div class="input-group col-md-12">													
													<input class="col-md-12" type="text" name="param_usuarioDNI" id="param_usuarioDNI" maxlength="8" onkeypress="return solonumeros(event)"/>													
												</div>
											</div>

											<div class="form-group col-md-9">
												<label for="param_usuarioDireccion">Direccion</label>
												<div class="input-group col-md-12">													
													<input class="col-md-12" type="text"  name="param_usuarioDireccion" id="param_usuarioDireccion"/>
													<span class="input-group-addon">
														<i class="fa fa-home bigger-110"></i>
													</span>
												</div>
											</div>

											<div class="form-group col-md-4">
												<label for="param_usuarioNacimiento">Fecha Nacimiento</label>												
												<div class="input-group col-md-12">
													<input class="form-control date-picker" id="param_usuarioNacimiento" name="param_usuarioNacimiento" type="text" data-date-format="yyyy-mm-dd" />
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>												
											</div>											

											<div class="form-group col-md-4">
												<label for="param_usuarioMovil">Teléfono Celular</label>
												<div class="input-group col-md-12">													
													<input class="col-md-12" type="text" name="param_usuarioMovil" id="param_usuarioMovil" onkeypress="return solonumeros(event)"/>
													<span class="input-group-addon">
														<i class="fa fa-mobile-phone bigger-110"></i>
													</span>
												</div>
											</div>										

											<div class="form-group col-md-5">
												<label for="param_usuarioLogin">Login</label>
												<div class="input-group col-md-12">													
													<input class="col-md-12" type="text"  name="param_usuarioLogin" id="param_usuarioLogin"/>
												</div>
											</div>											

											<div class="form-group col-md-5">
												<label for="param_usuarioPassword">Contraseña</label>
												<div class="input-group col-md-12">													
													<input class="col-md-12" type="password"  name="param_usuarioPassword" id="param_usuarioPassword"/>
												</div>
											</div>

											<div class="form-group col-md-12">
												<label for="param_usuarioRol">Rol</label>
												<div id="rol">
													<div class="input-group col-md-12">														
														<select class="form-control" id="param_usuarioRol" name="param_usuarioRol">
															<option value="" disabled selected style="display: none;">Seleccionar Rol</option>
														</select>
													</div>
												</div>
											</div>
										</div>																											
									</div>
									
			                        <div class="alert alert-danger text-center" style="display:none;" id="error">
			                        </div>
			                        <div class="alert alert-success text-center" style="display:none;" id="exito">
			                        </div>  
						            
								</div>								

		                        <div class="modal-footer">
									<input type="button" style="display:none;" id="cancelar" data-dismiss="modal" class="btn btn-sm" value="Cancelar">
									<input style="display:none;" type="button" id="guardarUsuario" class="btn btn-sm btn-primary" onclick="guardar();" value="Guardar"/>
									<input style="display:none;" type="button" id="editarUsuario" class="btn btn-sm btn-primary" onclick="editar();" value="Modificar"/>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>			
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
		</div>

		<script src="../default/assets/js/jquery.2.1.1.min.js"></script>
		<script src="../default/assets/js/ace-extra.min.js"></script>		
		
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
	    <script src="../default/assets/js/jquery.dataTables.min.js"></script>
	    <script src="../default/assets/js/jquery.dataTables.bootstrap.min.js"></script>
	    <script src="../default/assets/js/jquery.maskedinput.min.js"></script>
	    <script src="../default/assets/js/jquery.autosize.min.js"></script>
	    <script src="../default/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>

		
		<!-- page specific plugin scripts -->
		<!-- ace scripts -->
		<script src="../default/assets/js/ace-elements.min.js"></script>
		<script src="../default/assets/js/ace.min.js"></script>
		

		<script src="../default/js/usuarios.js"></script>	
		<script src="../default/js/validaciones.js"></script>
		<!-- inline scripts related to this page -->
	</body>
</html>
<?php 
	}
?>

<script src="../default/js/alertas.js"></script>
<script type="text/javascript">
	alerta_mensajes();
	alerta_actividades();
</script>