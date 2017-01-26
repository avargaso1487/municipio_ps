<?php 
	
include_once '../../model/conexion_model.php';


class Usuario_model
{

	private $param = array();
	private $conexion = null;	

	function __construct()
	{
		$this->conexion = Conexion_model::getConexion();
	}

	function cerrarAbrir()
	{
		mysqli_close($this->conexion);
		$this->conexion = Conexion_model::getConexion();
	}

	function gestionar($param)
	{
		$this->param = $param;
		switch ($this->param['opcion'])
		{
			case 'login':
				echo $this->login();
				break;
			case 'mostrarMenu':
				echo $this->mostrarMenu();
				break;
			case 'alerta_mensajes':
				echo $this->alerta_mensajes();
				break;
			case 'alerta_actividades':
				echo $this->alerta_actividades();
				break;
		}
	}

	function prepararConsultaUsuario($opcion='')
	{
		$consultaSql = "call sp_control_usuario(";
		$consultaSql.="'".$opcion."',";
		$consultaSql.="'".$this->param['usuario']."',";
		$consultaSql.="'".$this->param['password']."')";
		//echo $consultaSql;
		$this->result = mysqli_query($this->conexion,$consultaSql);
	}

	function prepararConsultaMenu($opcion='', $grupoid='')
	{
		$consultaSql2 = "call sp_control_menu(";
		$consultaSql2.="'".$opcion."',";
		$consultaSql2.="'".$_SESSION['personaID']."',";		
		$consultaSql2.="'".$grupoid."')";		
		//echo $consultaSql2;
		$this->result2 = mysqli_query($this->conexion,$consultaSql2);
	}

	function ejecutarConsultaRespuesta() {
        $respuesta = '';
        while ($fila = mysqli_fetch_array($this->result)) {
            $respuesta = $fila['respuesta'];
        }
        return $respuesta;
    }

    function prepararConsultaAlertaMensaje($opcion='')
	{
		$consultaSql3 = "call sp_control_alerta_mensaje(";
		$consultaSql3.="'".$opcion."')";
		//echo $consultaSql3;
		$this->result3 = mysqli_query($this->conexion,$consultaSql3);
	}

	function ejecutarConsultaRespuestaAlertaMensaje() {
        $respuesta3 = '';
        while ($fila3 = mysqli_fetch_array($this->result3)) {
            $respuesta3 = $fila3['total'];
        }
        return $respuesta3;
    }

	function login()
	{
		$this->prepararConsultaUsuario('opc_login_respuesta');
		$respuesta = $this->ejecutarConsultaRespuesta();
		
		if($respuesta == '1')
		{
			$this->cerrarAbrir();
			$this->prepararConsultaUsuario('opc_login_listar');
			while($fila = mysqli_fetch_array($this->result))
			{
				$_SESSION['personaID'] = $fila['personaID'];
				$_SESSION['usuario'] = $fila['usuarioLogin'];								
				$_SESSION['usuarioExtraordinario'] = $fila['extraordinario'];				
			}
			echo '1';
		} 
		else
		{			
			echo '0';
		}
	}

	private function getArrayGrupos() {
        $datos = array();
        while ($fila = mysqli_fetch_array($this->result2)) {
            array_push($datos, array(
                "grupo" => $fila["grupoNombre"],
                "grupoID" => $fila["grupoID"],
                "grupoIcono" => $fila["grupoIcono"]
                ));
        }
        return $datos;
    }

    private function getArrayTareas() {
        $datos = array();
        while ($fila = mysqli_fetch_array($this->result2)) {
            array_push($datos, array(
                "tarea" => $fila["tareaNombre"],
                "tareaRuta" => $fila["tareaURL"],
                "tareaIcono" => $fila["tareaIcono"]
                ));
        }
        return $datos;
    }    

	function mostrarMenu()
	{
		$this->cerrarAbrir();
		$this->prepararConsultaMenu('opc_mostrargrupos',0);
		$datosGrupos = $this->getArrayGrupos();
		for($i=0; $i<count($datosGrupos); $i++)
		{	

			if($datosGrupos[$i]['grupo'] === $this->param['grupo'])
				echo '<li class="open">';
			else 		
				echo '<li class="">';
			echo '				
					
						<a href="#" class="dropdown-toggle">
							<i class="'.$datosGrupos[$i]['grupoIcono'].'"></i>
							<span class="menu-text">
								'.$datosGrupos[$i]['grupo'].'
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">';		
			$this->cerrarAbrir();
			$this->prepararConsultaMenu('opc_mostrartareas',$datosGrupos[$i]['grupoID']);
			$datosTareas = $this->getArrayTareas();
			for($j=0; $j<count($datosTareas); $j++)
			{
				if($datosTareas[$j]['tarea'] === $this->param['tarea'])
					echo '<li class="active">';
				else 		
					echo '<li class="">';
				echo '
	                    <a href="'.$datosTareas[$j]['tareaRuta'].'">
	                        <i class="menu-icon fa fa-caret-right"></i>
	                        '.$datosTareas[$j]['tarea'].'
	                    </a>
	                    <b class="arrow"></b>                           
	                </li>';
			}			
			echo '		</ul>
					</li>';
		}
	}

	private function getArrayAlertasMensajes()
    {
        $datos3 = array();
        while($fila3 = mysqli_fetch_array($this->result3))
        {
            array_push($datos3, array(
                "autorPregunta" => $fila3["autor"],
                "pregunta" => $fila3["pregunta"],
                "horaPregunta" => $fila3["hora"],
                "fechaPregunta" => $fila3["fecha"]));
        }
        return $datos3;
    }

	private function alerta_mensajes()
	{
		$this->prepararConsultaAlertaMensaje('opc_cantidad_alertas');
		$total_alertas = $this->ejecutarConsultaRespuestaAlertaMensaje();
		
		echo '	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
					<span class="badge badge-success">'.$total_alertas.'</span>
				</a>';
		echo '	
				<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
					<li class="dropdown-header">
						<i class="ace-icon fa fa-envelope-o"></i>
						'.$total_alertas.' Pregunta(s)
					</li>

					<li class="dropdown-content">
						<ul class="dropdown-menu dropdown-navbar">
				';
			$this->cerrarAbrir();
			$this->prepararConsultaAlertaMensaje('opc_mensajes_alertas');
			$datos = $this->getArrayAlertasMensajes();
			for($i=0; $i<count($datos); $i++)
			{
				echo'			<li>						
									<a href="#">
										<span class="msg-title">
											<i class="btn btn-xs no-hover btn-success fa fa-user"></i>
											<span class="blue">'.$datos[$i]["autorPregunta"].':</span> <br>
											'.$datos[$i]["pregunta"].'
										</span>
										<span class="msg-time">
											<i class="ace-icon fa fa-clock-o"></i>
											<span>'.$datos[$i]["horaPregunta"].'</span>
											<i class="ace-icon fa fa-calendar"></i>
											<span>'.$datos[$i]["fechaPregunta"].'</span>
										</span>										
									</a>
								</li>
							';
			}			

			echo '		</ul>
					</li>

					<li class="dropdown-footer">
						<a href="../foro/questions.php">
							Ver Preguntas
							<i class="ace-icon fa fa-arrow-right"></i>
						</a>
					</li>
				</ul>
					';
	
	}

	private function alerta_spa()
	{
		$this->prepararConsultaAlertaSpa('opc_cantidad_alertas');
		$total_alertas = $this->ejecutarConsultaRespuestaAlertaSpa();
		
		echo '	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="ace-icon fa fa-paw icon-animated-bell"></i>
					<span class="badge badge-important">'.$total_alertas.'</span>
				</a>';
		echo '	
				<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
					<li class="dropdown-header">
						<i class="ace-icon fa fa-exclamation-triangle"></i>
						'.$total_alertas.' Servicios pendientes
					</li>

					<li class="dropdown-content">
						<ul class="dropdown-menu dropdown-navbar navbar-pink">
				';
			$this->cerrarAbrir();
			$this->prepararConsultaAlertaSpa('opc_spa_alertas');
			$datos = $this->getArraySpa();
			for($i=0; $i<count($datos); $i++)
			{
				echo'			<li>								
								<div class="clearfix">
									<span class="pull-left">
										<i class="btn btn-xs no-hover btn-success fa fa-male"></i>
										'.$datos[$i]["alertaPersona"].'
									</span>
									<span class="pull-right badge badge-success">'.$datos[$i]["alertaFecha"].'</span>
								</div>								
							</li>
							';
			}			

			echo '		</ul>
					</li>

					<li class="dropdown-footer">
						<a href="../spa/recordatorio.php">
							Ver recordatorio
							<i class="ace-icon fa fa-arrow-right"></i>
						</a>
					</li>
				</ul>
					';
	
	}

	function prepararConsultaAlertaSpa($opcion='')
	{
		$consultaSql3 = "call sp_control_alerta_spa(";
		$consultaSql3.="'".$opcion."')";
		//echo $consultaSql;
		$this->result3 = mysqli_query($this->conexion,$consultaSql3);
	}

	function ejecutarConsultaRespuestaAlertaSpa() {
        $respuesta3 = '';
        while ($fila3 = mysqli_fetch_array($this->result3)) {
            $respuesta3 = $fila3['total'];
        }
        return $respuesta3;
    }

    	private function getArraySpa()
    {
        $datos3 = array();
        while($fila3 = mysqli_fetch_array($this->result3))
        {
            array_push($datos3, array(
                "alertaPersona" => $fila3["persona"],
                "alertaFecha" => $fila3["CS_proxServicio"]));
        }
        return $datos3;
    }
}
 ?>