<?php
//session_start();

include_once '../../model/model_actividad/actividad_model.php';
$actividad = new Actividad_model();

$data = array();
$data['actividadID'] 	= "";
$data['ambitoID'] 		= "";
$data['actividad'] 		= "";
$data['descripcion'] 	= "";
$data['lugar'] 			= "";
$data['fecha'] 			= "";
$data['prioridad'] 			= "";
$data['start'] 			= "";
$data['end'] 			= "";

$data['fechaRegistro'] 	= "";
$data['fechaModificacion'] = "";


if(isset($_POST['txtActividadID'])){ 	$data['actividadID'] 	= $_POST['txtActividadID'];}
if(isset($_POST['cboAmbito'])){ 		$data['ambitoID'] 		= $_POST['cboAmbito'];}
if(isset($_POST['txtActividad'])){ 		$data['actividad'] 		= strtoupper(trim($_POST['txtActividad']));}
if(isset($_POST['txtDescripcion'])){ 	$data['descripcion'] 	= $_POST['txtDescripcion'];}
if(isset($_POST['txtLugar'])){ 			$data['lugar'] 			= $_POST['txtLugar'];}
if(isset($_POST['cboPrioridad'])){ 		$data['prioridad'] 			= $_POST['cboPrioridad'];}
if(isset($_POST['txtStart'])){ 		$data['start'] 			= $_POST['txtStart'];}
if(isset($_POST['txtEnd'])){ 		$data['end'] 			= $_POST['txtEnd'];}
if(isset($_POST['txtFecha'])){
	$fecha	= $_POST['txtFecha'];
	$fecha = str_replace("/","-",$fecha); 
	$fecha = date('Y-m-d',strtotime($fecha));	
	$data['fecha'] = $fecha;
}
// if(isset($_POST[''])){ $data['fechaRegistro'] 	= $_POST[''];
// if(isset($_POST[''])){ $data['fechaModificacion'] = $_POST[''];


switch ($_POST['opcion']) {
	   	case 1:
	        insert_actividad($actividad,$data);
	        break;
	   	case 2:
	        get_actividades($actividad,$data);
	        break;
	   	case 3:
	        update_actividad($actividad,$data);
	        break;
	    case 4:
	        delete_actividad($actividad,$data);
	        break;
}
	function insert_actividad($actividad, $data){
		$rpta = $actividad->insert_actividad($data);
		echo $rpta;
	}
	function get_actividades($actividad, $data){
		$rpta = $actividad->get_actividades($data);
		echo $rpta;
	}
	function update_actividad($actividad,$data){
		$rpta = $actividad->update_actividad($data);
		echo $rpta;
	}
	function delete_actividad($actividad,$data){
		$rpta = $actividad->delete_actividad($data);
		echo $rpta;
	}

?>