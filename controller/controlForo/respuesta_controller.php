<?php 

	session_start();	
	include_once '../../model/modelForo/model_respuesta.php';
	include_once '../../model/conexion_model.php';
	$conexion = Conexion_Model::getConexion();

	$param = array();
	$param['opcion'] = '';
	$param['id_respuesta'] = '';
	$param['id_pregunta'] = '';
	$param['mensaje'] = '';
	$param['estado_respuesta'] = '';


	if(isset($_POST['opcion']))
	{
	    $param['opcion'] = $_POST['opcion'];
	}

	if(isset($_POST['id_respuesta']))
	{
	    $param['id_respuesta'] = $_POST['id_respuesta'];
	}

	if(isset($_POST['id_pregunta']))
	{
	    $param['id_pregunta'] = $_POST['id_pregunta'];
	}

	if(isset($_POST['mensaje']))
	{
	    $param['mensaje'] = $_POST['mensaje'];
	}

	if(isset($_POST['estado_respuesta']))
	{
	    $param['estado_respuesta'] = $_POST['estado_respuesta'];
	}

	$Respuesta = new RespuestaModel();
    echo $Respuesta->gestionar($param);

?>