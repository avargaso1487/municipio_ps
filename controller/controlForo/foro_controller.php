<?php 

	session_start();	
	include_once '../../model/modelForo/model_foro.php';
	include_once '../../model/conexion_model.php';
	$conexion = Conexion_Model::getConexion();

	$param = array();
	$param['opcion'] = '';
	$param['nombre_estudiante'] = '';
	$param['apellido_estudiante'] = '';
	$param['codigo_estudiante'] = '';
	$param['mensaje_estudiante'] = '';

	if(isset($_POST['opcion']))
	{
	    $param['opcion'] = $_POST['opcion'];
	}

	if(isset($_POST['nombre_estudiante']))
	{
	    $param['nombre_estudiante'] = $_POST['nombre_estudiante'];
	}

	if(isset($_POST['apellido_estudiante']))
	{
	    $param['apellido_estudiante'] = $_POST['apellido_estudiante'];
	}

	if(isset($_POST['codigo_estudiante']))
	{
	    $param['codigo_estudiante'] = $_POST['codigo_estudiante'];
	}

	if(isset($_POST['mensaje_estudiante']))
	{
	    $param['mensaje_estudiante'] = $_POST['mensaje_estudiante'];
	}

	$Foro = new ForoModel();
    echo $Foro->gestionar($param);

?>