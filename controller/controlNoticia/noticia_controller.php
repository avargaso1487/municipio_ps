<?php 
    session_start();
    include_once '../../model/modelNoticia/noticia_model.php';

    $param = array();
    $param['param_opcion'] = '';
    $param['param_titulo'] = '';
    $param['param_resumen'] = '';   
    $param['multimedia'] = ''; 

    $param['contenido'] = ''; 

    $param['noticia'] = ''; 


    $param['param_archivoImagen'] = '';
    $param['param_fileArchivoImagen'] = '';   
    $param['rutaImagen'] = '';

    $param['param_archivoVideo'] = '';
    $param['param_fileArchivoVideo'] = '';   
    $param['rutaVideo'] = '';
    $param['param_tipoVideo'] = '';
   
              
    if(isset($_POST['param_opcion'])){ $param['param_opcion'] = $_POST['param_opcion']; }
    if(isset($_POST['param_titulo'])){ $param['param_titulo'] = $_POST['param_titulo']; }
    if(isset($_POST['param_resumen'])){ $param['param_resumen'] = $_POST['param_resumen']; }
    if(isset($_POST['multimedia'])){ $param['multimedia'] = $_POST['multimedia']; }

    if(isset($_POST['noticia'])){ $param['noticia'] = $_POST['noticia']; }

    if(isset($_POST['contenido'])){ $param['contenido'] = $_POST['contenido']; }

    if(isset($_FILES['Imagen']['name'])){ 
        $param['param_archivoImagen'] = $_FILES['Imagen']['name']; 
    }
    if(isset($_FILES['Imagen']['tmp_name'])){ 
        $param['param_fileArchivoImagen'] = $_FILES['Imagen']['tmp_name']; 
    }
    $param['rutaImagen'] = '../../view/Noticias/Imagen/'.$param['param_archivoImagen']; 

    if(isset($_FILES['video']['type'])){ 
        $param['param_tipoVideo'] = $_FILES['video']['type']; 
    }

    if(isset($_FILES['video']['name'])){ 
        $param['param_archivoVideo'] = $_FILES['video']['name']; 
    }
    if(isset($_FILES['video']['tmp_name'])){ 
        $param['param_fileArchivoVideo'] = $_FILES['video']['tmp_name']; 
    }
    $param['rutaVideo'] = '../../view/Noticias/Video/'.$param['param_archivoVideo']; 

    //var_dump($_FILES['video']);

    $Noticia = new Noticia_model();
    echo $Noticia->gestionar($param);

?>