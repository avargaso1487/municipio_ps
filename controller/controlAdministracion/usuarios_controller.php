<?php
//session_start();
include_once '../../model/modelAdministracion/usuarios_model.php';

$param = array();
$param['param_opcion']             ='';

$param['param_usuarioId']           ='';
$param['param_usuarioNombre']     ='';
$param['param_usuarioApellidos']  ='';
$param['param_usuarioDNI']        ='';
$param['param_usuarioDireccion']  ='';
$param['param_usuarioNacimiento'] ='';
$param['param_usuarioMovil']      ='';

$param['param_usuarioLogin']       ='';
$param['param_usuarioPassword']    ='';
$param['param_usuarioRol']         ='';
$param['param_usuarioEstado']      ='';


    if(isset($_POST['param_opcion']))
    $param['param_opcion']             = $_POST['param_opcion'];

    if(isset($_POST['param_usuarioId']))
    $param['param_usuarioId']             = $_POST['param_usuarioId'];

    if(isset($_POST['param_usuarioNombre']))
    $param['param_usuarioNombre']       = $_POST['param_usuarioNombre'];
    
    if(isset($_POST['param_usuarioApellidos']))
    $param['param_usuarioApellidos']      = $_POST['param_usuarioApellidos'];
    
    if(isset($_POST['param_usuarioDNI']))
    $param['param_usuarioDNI']      = $_POST['param_usuarioDNI'];
    
    if(isset($_POST['param_usuarioDireccion']))
    $param['param_usuarioDireccion']      = $_POST['param_usuarioDireccion'];
    
    if(isset($_POST['param_usuarioMovil']))
    $param['param_usuarioMovil']      = $_POST['param_usuarioMovil'];

    if(isset($_POST['param_usuarioNacimiento']))
    $param['param_usuarioNacimiento'] = $_POST['param_usuarioNacimiento'];
    
    if(isset($_POST['param_usuarioLogin']))
    $param['param_usuarioLogin']       = $_POST['param_usuarioLogin'];
    
    if(isset($_POST['param_usuarioPassword']))
    $param['param_usuarioPassword']    = md5($_POST['param_usuarioPassword']);    
    
    if(isset($_POST['param_usuarioRol']))
    $param['param_usuarioRol']         = $_POST['param_usuarioRol'];    
    
    if(isset($_POST['param_usuarioEstado']))
    $param['param_usuarioEstado']      = $_POST['param_usuarioEstado'];

$Usuario = new Usuario_Model();
echo $Usuario->gestionar($param);

?>