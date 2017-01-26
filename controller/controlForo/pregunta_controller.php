<?php 

	session_start();	
	include_once '../../model/modelForo/model_pregunta.php';
	include_once '../../model/conexion_model.php';
	$conexion = Conexion_Model::getConexion();

	$param = array();
	$param['opcion'] = '';
	$param['id_pregunta'] = '';
	$param['estado_pregunta'] = '';


	if(isset($_POST['opcion']))
	{
	    $param['opcion'] = $_POST['opcion'];
	}

	if(isset($_POST['id_pregunta']))
	{
	    $param['id_pregunta'] = $_POST['id_pregunta'];
	}

	if(isset($_POST['estado_pregunta']))
	{
	    $param['estado_pregunta'] = $_POST['estado_pregunta'];
	}

	$Pregunta = new PreguntaModel();
    echo $Pregunta->gestionar($param);

?>