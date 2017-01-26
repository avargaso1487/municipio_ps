<?php 
	session_start();

	$permiso = $_SESSION['usuarioExtraordinario'];;		//1: Puede agregar, 0:No puede agregar
	if(!isset($_SESSION['usuario']))
	{
		header("Location:../../index.php");
		
	}
	else
	{
		date_default_timezone_set('America/Lima');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Full Calendar - Ace Admin</title>

		<meta name="description" content="with draggable and editable events" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/fullcalendar.min.css" />
		<link rel="stylesheet" href="assets/alertify/css/alertify.css" />

		

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<script src="assets/js/ace-extra.min.js"></script>
		<script src="assets/alertify/alertify.js"></script>
		

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="../home/home.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							MUNICIPIO PS
						</small>
					</a>
				</div>
				<!-- Cabecera izquierda -->

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">						

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">								
								<span class="user-info">
									<small>Bienvenido,</small><?php echo $_SESSION['usuario']?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="../../controller/controlusuario/cerrarsesion.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- Cabecera derecha -->
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">

					<li class="active">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Actividades </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="active">
								<a href="form-elements.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Gestión de actividades
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="form-elements-2.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado de actividades
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>
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
								<a href="#">Actividades</a>
							</li>
							<li class="active">Gestión de actividades</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								Gestión de actividades
								<!-- <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									with draggable and editable events
								</small> -->
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-sm-9">
										<div class="space"></div>

										<div id="calendar"></div>
									</div>

									<div class="col-sm-3">
										<div class="widget-box transparent">
											<div class="widget-header">
												<h4>
													Prioridad de actividades
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<div id="external-events">
														<div class="external-event label-danger" data-class="label-danger">
															<i class="ace-icon fa fa-arrows"></i>
															Alta
														</div>
														<div class="external-event label-yellow" data-class="label-yellow">
															<i class="ace-icon fa fa-arrows"></i>
															Media
														</div>
														<div class="external-event label-grey" data-class="label-grey">
															<i class="ace-icon fa fa-arrows"></i>
															Baja
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

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


		<div class="modal fade" id="modal_actividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	      <div class="modal-dialog " style="width: 50% !important;"> 
	        <div class="modal-content">
	          <form method="post" id="form_actividad" enctype="multipart/form-data">
	            <div class="modal-header">
	              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <strong>
	                	<h3 style="margin:0px;" id="tituloFormActividad" class="blue" align="center">
	                		Registrar actividad
	                	</h3>
	                </strong>
	            </div>
	            <!-- /.modal-header -->
	            <div class="modal-body">
	                <form id="formPrueba">
	                	<div class="row form-group" >
	                        <div class="col-md-12">
	                            <input type="text" class="form-control input-sm" id="actividadID" name="actividadID" readonly style="display:none">
	                        </div>
	                    </div>
	                	<div class="row form-group" style="display:none">
	                        <div class="col-md-12">
	                            <input type="text" class="form-control input-sm" id="txtStart" name="txtStart" readonly>
	                        </div>
	                    </div>
	                    <div class="row form-group" style="display:none">
	                        <div class="col-md-12">
	                            <input type="text" class="form-control input-sm" id="txtEnd" name="txtEnd" readonly>
	                        </div>
	                    </div>
	                	<div class="row form-group">
	                        <div class="col-md-3" align="right">
	                            <label class="control-label" for="">Fecha</label>
	                        </div>
	                        <div class="col-md-4">
	                            <input type="text" class="form-control input-sm" id="txtFecha" name="txtFecha" readonly style="color:#000">
	                        </div>
	                    </div>
	                    <div class="row form-group">
	                        <div class="col-md-3" align="right">
	                            <label class="control-label" for="">Ámbito</label>
	                        </div>
	                        <div class="col-md-7">
	                            <div>
	                                <select class="form-control input-sm select" id="cboAmbito" name="cboAmbito" style="color:#000">
	                                    <option value="0"> -- SELECCIONAR --</option>
	                                	<option value="1">INSTITUCIONAL</option>
	                                    <option value="2">LOCAL</option>
	                                    <option value="3">REGIONAL</option>
	                                    <option value="4">NACIONAL</option>
	                                    <option value="5">INTERNACIONAL</option>
	                                </select>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row form-group">
	                        <div class="col-md-3" align="right">
	                            <label class="control-label" for="">Actividad</label>
	                        </div>
	                        <div class="col-md-7">
	                            <input type="text" class="form-control input-sm" id="txtActividad" name="txtActividad" style="text-transform:uppercase;color:#000" >
	                        </div>
	                    </div>
	                    <div class="row form-group">
	                        <div class="col-md-3" align="right">
	                            <label class="control-label" for="">Descripción</label>
	                        </div>
	                        <div class="col-md-7">
	                            <textarea class="form-control input-sm " id="txtDescripcion" name="txtDescripcion" style="color:#000"></textarea>
	                        </div>
	                    </div>
	                    <div class="row form-group">
	                        <div class="col-md-3" align="right">
	                            <label class="control-label" for="">Prioridad</label>
	                        </div>
	                        <div class="col-md-7">
	                            <select class="form-control input-sm select" id="cboPrioridad" name="cboPrioridad" style="color:#000">
	                                <option value="0"> -- SELECCIONAR --</option>
	                            	<option value="3">ALTA</option>
	                                <option value="2">MEDIA</option>
	                                <option value="1">BAJA</option>
	                           	</select>
	                        </div>
	                    </div>
	                    <div class="row form-group">
	                        <div class="col-md-3" align="right">
	                            <label class="control-label" for="">Lugar</label>
	                        </div>
	                        <div class="col-md-7">
	                            <input type="text" class="form-control input-sm" id="txtLugar" name="txtLugar" style="color:#000">
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-sm-12">
	                            <div class="box-footer">
	                                <div class="form-actions center row">
	                                    <div class="col-sm-3 col-sm-offset-6"> 
	                                        <input value="Cancelar" onclick="cerrarModal('#modal_actividad');" id="btnCancelarActividad" type="button" class="btn btn-primary btn-sm btn-block">
	                                    </div>
	                                    <div class="col-sm-3"> 
	                                        <input value="Guardar" onclick="guardar_actividad(this.form);" id="btnGuardarActividad" type="button" class="btn btn-success  btn-sm btn-block">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </form>
	            </div>
	            <!-- /.modal-body -->
	          </form>
	          <!-- /.form -->
	        </div>
	        <!-- /.modal-content -->
	      </div>
	      <!-- /.modal-Dialog -->
			</div>
	    <!-- /.modalactividades -->



		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

	
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/fullcalendar.min.js"></script>
		<script src="assets/js/bootbox.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->



<script type="text/javascript">

var permiso = <?= $permiso  ?>;
function inicar_calendario(eventos){
	var calendar = $('#calendar').fullCalendar({
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    	dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
		//isRTL: true,
		 buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},
		events: eventos
		,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: ''
			// right: 'month,agendaWeek,agendaDay'
		}
		,
		editable: true,
		// droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			
		}
		,
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			if (permiso == 0 ) {
				return;
			}
			abrirModal("#modal_actividad");
			limpiarForm("#modal_actividad");
			var d = new Date(start);
			var anual=d.getFullYear();
			var mes= d.getMonth()+1;
			var dia= d.getDate()+1;
			if(dia<10) dia = "0"+dia+"";
			if(mes<10) mes = "0"+mes+"";
			
			var fecha = ""+dia+"-"+mes+"-"+anual;
			$('#txtFecha').val(fecha);
			$('#txtStart').val(start);
			$('#txtEnd').val(end);
		}
		,
		eventClick: function(calEvent, jsEvent, view) {
			if (permiso == 0 ) {
				return;
			}
			var modal = '\
				<div class="modal fade" id="modal_actividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
				<div class="modal-dialog " style="width: 50% !important;"> \
				<div class="modal-content">\
				<form method="post" id="form_actividad" enctype="multipart/form-data">\
				<div class="modal-header">\
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>\
				<strong>\
				<h3 style="margin:0px;" id="tituloFormActividad" class="blue" align="center">\
				Actualizar actividad\
				</h3>\
				</strong>\
				</div>\
				<!-- /.modal-header -->\
				<div class="modal-body">\
				<form id="formPrueba">\
				<div class="row form-group" >\
				<div class="col-md-12">\
				<input type="text" class="form-control input-sm" id="txtActividadID" name="txtActividadID" style="display:none" readonly  value="'+ calEvent.actividadID +'">\
				</div>\
				</div>\
				<div class="row form-group">\
				<div class="col-md-3" align="right">\
				<label class="control-label" for="">Fecha</label>\
				</div>\
				<div class="col-md-4">\
				<input type="text" class="form-control input-sm" id="txtFecha" name="txtFecha" readonly style="color:#000" value="'+ calEvent.fecha +'">\
				</div>\
				</div>\
				<div class="row form-group">\
				<div class="col-md-3" align="right">\
				<label class="control-label" for="">Ámbito</label>\
				</div>\
				<div class="col-md-7">\
				<div>\
				<select class="form-control input-sm select" id="cboAmbito" name="cboAmbito" style="color:#000">\
				<option value="0"> -- SELECCIONAR --</option>\
				<option value="1" '; if(calEvent.ambitoID == 1) modal = modal+"selected"; modal = modal+ '>INSTITUCIONAL</option>\
				<option value="2" '; if(calEvent.ambitoID == 2) modal = modal+"selected"; modal = modal+ '>LOCAL</option>\
				<option value="3" '; if(calEvent.ambitoID == 3) modal = modal+"selected"; modal = modal+ '>REGIONAL</option>\
				<option value="4" '; if(calEvent.ambitoID == 4) modal = modal+"selected"; modal = modal+ '>NACIONAL</option>\
				<option value="5" '; if(calEvent.ambitoID == 5) modal = modal+"selected"; modal = modal+ '>INTERNACIONAL</option>\
				</select>\
				</div>\
				</div>\
				</div>\
				<div class="row form-group">\
				<div class="col-md-3" align="right">\
				<label class="control-label" for="">Actividad</label>\
				</div>\
				<div class="col-md-7">\
				<input type="text" class="form-control input-sm" id="txtActividad" name="txtActividad" style="text-transform:uppercase;color:#000" value="'+ calEvent.title +'" >\
				</div>\
				</div>\
				<div class="row form-group">\
				<div class="col-md-3" align="right">\
				<label class="control-label" for="">Descripción</label>\
				</div>\
				<div class="col-md-7">\
				<textarea class="form-control input-sm " id="txtDescripcion" name="txtDescripcion" style="color:#000">'+ calEvent.descripcion +'</textarea>\
				</div>\
				</div>\
				<div class="row form-group">\
				<div class="col-md-3" align="right">\
				<label class="control-label" for="">Prioridad</label>\
				</div>\
				<div class="col-md-7">\
				<select class="form-control input-sm select" id="cboPrioridad" name="cboPrioridad" style="color:#000">\
				<option value="0"> -- SELECCIONAR --</option>\
				<option value="3" '; if(calEvent.prioridad == 3) modal = modal+"selected"; modal = modal+ '>ALTA</option>\
				<option value="2" '; if(calEvent.prioridad == 2) modal = modal+"selected"; modal = modal+ '>MEDIA</option>\
				<option value="1" '; if(calEvent.prioridad == 1) modal = modal+"selected"; modal = modal+ '>BAJA</option>\
				</select>\
				</div>\
				</div>\
				<div class="row form-group">\
				<div class="col-md-3" align="right">\
				<label class="control-label" for="">Lugar</label>\
				</div>\
				<div class="col-md-7">\
				<input type="text" class="form-control input-sm" style="color:#000" id="txtLugar" name="txtLugar"  value="'+ calEvent.lugar +'">\
				</div>\
				</div>\
				<div class="row">\
				<div class="col-sm-12">\
				<div class="box-footer">\
				<div class="form-actions center row">\
				<div class="col-sm-3 "> \
				<button type="button" class="btn btn-sm btn-danger btn-block" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Eliminar </button>\
				</div>\
				<div class="col-sm-3 col-sm-offset-3"> \
				<button type="button" class="btn btn-sm btn-block" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancelar</button>\
				</div>\
				<div class="col-sm-3"> \
				<button type="submit" class="btn btn-sm btn-block btn-success"><i class="ace-icon fa fa-check"></i> Actualizar </button>\
				</div>\
				</div>\
				</div>\
				</div>\
				</div>\
				</form>\
				</div>\
				<!-- /.modal-body -->\
				</form>\
				<!-- /.form -->\
				</div>\
				<!-- /.modal-content -->\
				</div>\
				<!-- /.modal-Dialog -->\
				</div>\
				<!-- /.modalactividades -->';

			var modal = $(modal).appendTo('body');

			modal.find('form').on('submit', function(ev){
				r = confirm("Seguro que desea modificar la actividad?");
					if (r != true){
					  return false;
				}
				ev.preventDefault();

				prioridad = $(this).find("select[id=cboPrioridad]").val();
				label="";
				if(prioridad == 1) label = "label-grey";
				else if(prioridad == 2) label = "label-yellow";
				else if(prioridad == 3) label = "label-important";
				
				calEvent.title = $(this).find("input[id=txtActividad]").val();
				calEvent.className = label;

				calEvent.actividadID = $(this).find("input[id=txtActividadID]").val();
				calEvent.ambitoID = $(this).find("select[id=cboAmbito]").val();
				calEvent.descripcion = $(this).find("textarea[id=txtDescripcion]").val();
				calEvent.lugar = $(this).find("input[id=txtLugar]").val();
				var opcion = 3;
			  	$.ajax({
			      	type: 'POST',        
			      	data:'opcion='+opcion+'&txtActividadID='+calEvent.actividadID
			      			+'&txtActividad='+calEvent.title
			      			+'&cboAmbito='+calEvent.ambitoID
			      			+'&txtDescripcion='+calEvent.descripcion
					      	+'&txtLugar='+calEvent.lugar
					      	+'&cboPrioridad='+prioridad,
			      	url: '../../controller/control_actividad/actividad_controller.php',			 
			      	success: function(rpta){
			      		if(rpta == 1){
			      			alertify.success("Operación exitosa.");
							calendar.fullCalendar('updateEvent', calEvent);
							modal.modal("hide");
			      		}
			      		else{
				      		alertify.error("Operaciómn abortada: "+rpta);
				      	}
						limpiarForm('#modal_actividad');
			      	},
			      	error: function(data){
			                 
			      	}
			  	});
			});

			modal.find('button[data-action=delete]').on('click', function() {
				r = confirm("Seguro que desea anular la actividad?\nRecuerde que esta operación es irreversible.");
					if (r != true){
					  return false;
				}
				var cont = 0;
				calendar.fullCalendar('removeEvents' , function(ev){
					//18 veces					
					if(cont == 0){
						var opcion = 4;
					  	$.ajax({
					      	type: 'POST',        
					      	data:'opcion='+opcion+'&txtActividadID='+calEvent.actividadID,
					      	url: '../../controller/control_actividad/actividad_controller.php',			 
					      	success: function(rpta){
					      		if(rpta == 1){
					      			alertify.success("Operación exitosa.");
					      		}
					      		else{
						      		alertify.error("Operaciómn abortada: "+rpta);
						      	}
								limpiarForm('#modal_actividad');
					      	},
					      	error: function(data){
					                 
					      	}
					  	});
					}
				  	cont++;
					return (ev._id == calEvent._id);
				})
				modal.modal("hide");
			});
			
			modal.modal('show').on('hidden', function(){
				modal.remove();
			});
		}
	});
}

</script>
		<script type="text/javascript">
			

jQuery(function($) {

/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/



})
		</script>
	</body>
</html>
<script type="text/javascript">
function abrirModal(modal){
	$(modal).modal({
		show:true
	});
}
function cerrarModal(modal){
	$(modal).modal('hide');
}

function cargar_actividades(){
	var opcion = 2;
  	$.ajax({
      	type: 'POST',        
      	data:'opcion='+opcion,
      	url: '../../controller/control_actividad/actividad_controller.php',
      	success: function(rpta){
      		var obj = JSON.parse(rpta);
      		var data = new Array();
      		for(i=0; i<obj.length; i++){
      			var fecha = obj[i].fecha;
				arrayFecha = fecha.split("-");

				var prioridad = obj[i].prioridad;
				var label = "";
				if(prioridad == 3) label = "label-important";
				else if(prioridad == 2) label = "label-yellow";
				else if(prioridad == 1) label = "label-grey";
				var ds = {};
				ds['actividadID'] = obj[i].actividadID;
				ds['title'] = obj[i].actividad;
				ds['start'] = new Date(parseInt(arrayFecha[0]) , parseInt(arrayFecha[1])-1, parseInt(arrayFecha[2]));
				ds['className'] = label;
				ds['allDay'] = true;
				ds['ambitoID'] = obj[i].ambitoID;
				ds['descripcion'] = obj[i].descripcion;
				ds['lugar'] = obj[i].lugar;
				ds['fecha'] = obj[i].fecha;
				ds['prioridad'] = obj[i].prioridad;
				data.push(ds);
			}
			inicar_calendario(data);
      	},
      	error: function(data){
                 
      	}
  	});
}
function guardar_actividad(form){
	var start = $('#txtStart').val();
	var end = $('#txtEnd').val();
	var actividad = $('#txtActividad').val();
	var prioridad = $('#cboPrioridad').val();
	var label = "label-grey";
	
	var ambitoID = $('#cboAmbito').val();
	var descripcion = $('#txtDescripcion').val();
	var lugar = $('#txtLugar').val();
	var prioridad = $('#cboPrioridad').val();

	inputMinimo('#txtActividad',3);
	valorNoValido('#cboAmbito',0);
	valorNoValido('#cboPrioridad',0);

	if(prioridad == 3) label = "label-important";
	else if(prioridad == 2) label = "label-yellow";
	else if(prioridad == 1) label = "label-grey";
	
	if(document.getElementsByClassName("has-error").length > 0){
        alertify.error("Verifique los datos ingresados");
        $('#btnGuardarActividad').attr('disabled',false);
        return false;
    }
    var formData = new FormData($('#form_actividad')[0]);
    formData.append("opcion",1);
    $.ajax({
      url: '../../controller/control_actividad/actividad_controller.php',
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(rpta){
      	if (rpta >= 1) {
      		alertify.success("Operación exitosa.");
      		agregar_actividad(actividad,start,end,"",label,rpta, ambitoID,descripcion,lugar,prioridad);
      		
      	}else{
      		alertify.error("No se pudo registrar."+rpta);
      	}
      },
      error: function(rpta){
        alert("Error en la operacion: \n"+rpta);
      }
    });
	cerrarModal('#modal_actividad');
	limpiarForm('#modal_actividad');
}
function limpiarForm(miForm) {
	// recorremos todos los campos que tiene el formulario
	$(':input', miForm).each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase();
		//limpiamos los valores de los campos…
		if (type == 'text' 		|| type == 'date' 		|| type == 'email' ||
			type == 'password' 	|| tag == 'textarea' 	|| type == 'file'){
			this.value = "";
			$(this).parent().removeClass('has-error');
		}
		else{
			if (tag == 'select'){
				this.selectedIndex = 0;
				$(this).parent().removeClass('has-error');
			}
		}
	});
}
function agregar_actividad(title,start,end,allDay,label,actividadID, ambitoID,descripcion,lugar,prioridad ){
	var calendar = $('#calendar').fullCalendar();
	calendar.fullCalendar('renderEvent',
		{
			title: title,
			start: start,
			end: end,
			allDay: true,
			className: label,

			actividadID: actividadID,
			ambitoID: ambitoID,
			descripcion: descripcion,
			lugar: lugar,
			prioridad: prioridad
		},
		true // make the event "stick"
	);
}
function inputMinimo(input,min){
	if($.trim($(input).val()).length < min) $(input).parent().addClass('has-error');
	else $(input).parent().removeClass('has-error');
}
function valorNoValido(element,valor){
	if($(element).val() == valor) $(element).parent().addClass('has-error');
	else $(element).parent().removeClass('has-error');
}


</script>
<script type="text/javascript">
	// cargar_actividades();
	cargar_actividades();
</script>












