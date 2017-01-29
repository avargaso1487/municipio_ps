<?php 
    include_once '../../model/conexion_model.php';
    class Noticia_model {
        public $param = array();
        function __construct() {
            $this->conexion = Conexion_Model::getConexion();
        }

        function cerrarAbrir(){
            mysqli_close($this->conexion);
            $this->conexion = Conexion_Model::getConexion();
        }

        function gestionar($param) {
            $this->param = $param;
            switch ($this->param['param_opcion']) {                
                case 'register_noticia':
                    echo $this->register_noticia();
                    break; 

                case 'update_noticia':
                    echo $this->update_noticia();
                    break; 


                case 'listar_noticias':
                    echo $this->listar_noticias();
                    break;
                 case 'listar_noticias2':
                    echo $this->listar_noticias2();
                    break;
                case 'noticia_informacion':
                    echo $this->noticia_informacion();
                    break;
                 case 'noticia_informacion2':
                    echo $this->noticia_informacion2();
                    break;
                case 'listar_all_noticias':
                    echo $this->listar_all_noticias();
                    break; 
                case 'listar_noticias_extraordinario':
                    echo $this->listar_noticias_extraordinario();
                    break;
                case 'eliminar_noticia':
                    echo $this->eliminar_noticia();
                    break;
                case 'recuperar_datos':
                    echo $this->recuperar_datos();
                    break;

                case "get":break; 
            }
        }

        function prepararConsultaGestionarNoticia($opcion, $codigo) {
            $consultaSql ="call sp_gestionar_noticia(";
            $consultaSql.="'".$opcion . "',";
            $consultaSql.="'".$this->param['param_titulo']."',";
            $consultaSql.="'".$this->param['param_resumen']."',";            
            $consultaSql.="'".$this->param['contenido']."',";
            $consultaSql.="'".$this->param['multimedia']."',";
            $consultaSql.="'".$this->param['rutaImagen']."',";
            $consultaSql.="'".$this->param['rutaVideo']."',";        
            $consultaSql.="'".$codigo."',";     
            $consultaSql.="'".$_SESSION['personaID']."')";             
            //echo $consultaSql;            
            $this->result = mysqli_query($this->conexion,$consultaSql);    
        }

        function prepararConsultaGestionarNoticia2($opcion, $codigo) {
            $consultaSql ="call sp_gestionar_noticia(";
            $consultaSql.="'".$opcion . "',";
            $consultaSql.="'".$this->param['param_titulo']."',";
            $consultaSql.="'".$this->param['param_resumen']."',";            
            $consultaSql.="'".$this->param['contenido']."',";
            $consultaSql.="'".$this->param['multimedia']."',";
            $consultaSql.="'".$this->param['rutaImagen']."',";
            $consultaSql.="'".$this->param['rutaVideo']."',";        
            $consultaSql.="'".$codigo."',";     
            $consultaSql.="'')";             
            //echo $consultaSql;            
            $this->result = mysqli_query($this->conexion,$consultaSql);    
        }
       
        function register_noticia() {
            $this->prepararConsultaGestionarNoticia('opc_nueva_noticia','');
            $this->cerrarAbrir();
            $destinoImagen = '../../view/Noticias/Imagen/'.$this->param['param_archivoImagen'];
            $archivoImagen = $this->param['param_fileArchivoImagen'];
            move_uploaded_file($archivoImagen, $destinoImagen);
            $destinoVideo = '../../view/Noticias/Video/'.$this->param['param_archivoVideo'];
            $archivoVideo = $this->param['param_fileArchivoVideo'];
            move_uploaded_file($archivoVideo, $destinoVideo);
            echo 1;                      
        }

        function update_noticia() {
            if ($this->param['multimedia'] == 'N') {
                $this->prepararConsultaGestionarNoticia('opc_update_noticia2',$this->param['noticia']);
                $this->cerrarAbrir();                
                echo 1;  
            } else {
                if ($this->param['param_archivoImagen'] == '' && $this->param['param_archivoVideo'] == '') {                
                    $this->prepararConsultaGestionarNoticia('opc_update_noticia',$this->param['noticia']);
                    $this->cerrarAbrir();                
                    echo 1; 
                } else {
                    $this->prepararConsultaGestionarNoticia('opc_update_noticia2',$this->param['noticia']);
                    $this->cerrarAbrir();
                    $destinoImagen = '../../view/Noticias/Imagen/'.$this->param['param_archivoImagen'];
                    $archivoImagen = $this->param['param_fileArchivoImagen'];
                    move_uploaded_file($archivoImagen, $destinoImagen);
                    $destinoVideo = '../../view/Noticias/Video/'.$this->param['param_archivoVideo'];
                    $archivoVideo = $this->param['param_fileArchivoVideo'];
                    move_uploaded_file($archivoVideo, $destinoVideo);
                    echo 1; 
                }
            }





            
                              
        }

        function listar_noticias() {        
            $this->prepararConsultaGestionarNoticia('opc_mostrar_noticias','');
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){   
                if ($row[8] == 'N') {
                    echo '<div class="row">                                    
                        <div class="col-xs-11 noticia">                                 
                            <div class="row">
                                
                                <div class="col-xs-12">
                                    <a href="informacion_noticia.php?noticia='.($row[0]).'"><h1 class="titulo-noticia">'.($row[1]).'</h1></a>
                                    <p class="fecha-hora">Fecha: '.($row[3]).' &nbsp; &nbsp; Hora: '.($row[4]).'</p>
                                    <p class="descripcion-noticia">'.($row[2]).'</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-1"></div>
                    </div><br>';
                } else {
                    echo '<div class="row">                                    
                        <div class="col-xs-11 noticia">                                 
                            <div class="row">
                                <div class="col-xs-5">
                                    <img class="imagen-noticia" src="'.($row[5]).'">
                                </div>
                                <div class="col-xs-7">
                                    <a href="informacion_noticia.php?noticia='.($row[0]).'"><h1 class="titulo-noticia">'.($row[1]).'</h1></a>
                                    <p class="fecha-hora">Fecha: '.($row[3]).' &nbsp; &nbsp; Hora: '.($row[4]).'</p>
                                    <p class="descripcion-noticia">'.($row[2]).'</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-1"></div>
                    </div><br>';
                }          
                
            } 
            echo '<div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="button" class="btn btn-link" onclick="todos()">Ver Todos</button>
                    </div>
                    
                </div>';
        }

        function listar_noticias2() {        
            $this->prepararConsultaGestionarNoticia2('opc_mostrar_noticias','');
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){   
                if ($row[8] == 'N') {
                    echo '<div class="row">                                    
                        <div class="col-xs-11 noticia">                                 
                            <div class="row">
                                
                                <div class="col-xs-12">
                                    <a href="view/Noticias/noticia_usuario.php?noticia='.($row[0]).'"><h1 class="titulo-noticia">'.($row[1]).'</h1></a>
                                    <p class="fecha-hora">Fecha: '.($row[3]).' &nbsp; &nbsp; Hora: '.($row[4]).'</p>
                                    <p class="descripcion-noticia">'.($row[2]).'</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-1"></div>
                    </div><br>';
                } else {
                    echo '<div class="row">                                    
                        <div class="col-xs-11 noticia">                                 
                            <div class="row">
                                <div class="col-xs-5">
                                    <img class="imagen-noticia" src="'.($row[7]).'">
                                </div>
                                <div class="col-xs-7">
                                    <a href="view/Noticias/noticia_usuario.php?noticia='.($row[0]).'"><h1 class="titulo-noticia">'.($row[1]).'</h1></a>
                                    <p class="fecha-hora">Fecha: '.($row[3]).' &nbsp; &nbsp; Hora: '.($row[4]).'</p>
                                    <p class="descripcion-noticia">'.($row[2]).'</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-1"></div>
                    </div><br>';
                }          
                
            } 
            echo '<div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="button" class="btn btn-link" onclick="todos()">Ver Todos</button>
                    </div>
                    
                </div>';
        }

        function recuperar_datos() {        
            $this->prepararConsultaGestionarNoticia2('opc_recuperar_datos',$this->param['noticia']);
            $row = mysqli_fetch_row($this->result);
            echo json_encode($row);
        }


        function listar_noticias_extraordinario() {    
            $i = 0;    
            $this->prepararConsultaGestionarNoticia('opc_mostrar_noticias_extraordinario','');
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){  
                $i++;               
                echo '<tr>
                    <td style="text-align: center;font-size: 12px; height: 10px; width: 5%;">'.$i.'</td>
                    <td style="font-size: 12px; height: 10px; width: 40%;">'.($row[1]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 20%;">'.($row[6]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 15%;">'.($row[3]).' '.($row[4]).'</td>

                    <td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">
                        <div class="hidden-sm hidden-xs action-buttons">                                              
                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-150" onClick="eliminar('."'".$row[0]."'".')"></i>
                                </span>
                            </a>
                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Edit">
                                <span class="green">
                                    <i class="ace-icon fa fa-pencil bigger-150" onclick="editar('.$row[0].');"></i>
                                </span>
                            </a>
             
                </div>
                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>    
                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                            <span class="red">
                                                <i class="ace-icon fa fa-trash-o bigger-150" onClick="eliminar('."'".$row[0]."'".')"></i>
                                            </span>
                                        </a>                             
                                        <a class="tooltip-error" data-rel="tooltip" title="Edit" >
                                            <span class="green">
                                                <i class="ace-icon fa fa-pencil bigger-120" onclick="editar('.$row[0].');"></i>
                                            </span>
                                        </a>
             
                            </ul>
                        </div>
                    </div>
                </td>
                </tr>';
            }
        }



        function listar_all_noticias() {        
            $this->prepararConsultaGestionarNoticia('opc_mostrar_all_noticias','');
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){                
                echo '<div class="row">                                    
                    <div class="col-xs-11 noticia">                                 
                        <div class="row">
                            <div class="col-xs-3">
                                <img class="imagen-noticia2" src="'.($row[5]).'">
                            </div>
                            <div class="col-xs-9">
                                <a href="informacion_noticia.php?noticia='.($row[0]).'"><h1 class="titulo-noticia">'.($row[1]).'</h1></a>
                                <p class="fecha-hora">Fecha: '.($row[3]).' &nbsp; &nbsp; Hora: '.($row[4]).'</p>
                                <p class="descripcion-noticia">'.($row[2]).'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                </div><br>';
            
            }            
        }

        function eliminar_noticia() {        
            $this->prepararConsultaGestionarNoticia('opc_eliminar_noticia',$this->param['noticia']);
            $this->cerrarAbrir();
            echo 1;
        }

        function noticia_informacion() {        
            $this->prepararConsultaGestionarNoticia('opc_noticias_informacion',$this->param['noticia']);
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){ 
                if ($row[8] == 'I' || $row[8] == 'V') {
                    echo '<div class="col-xs-12">
                        <h1 style="color:#153192; font-weight: bold;">'.($row[1]).'</h1>
                    </div>
                    <div class="col-xs-12">
                        <p>'.($row[2]).'</p>
                    </div>
                    <HR class="info" width=100% align="center">
                    <div class="col-xs-12">                                     
                        <p style="font-size: 11px">Fecha: '.($row[4]).'&nbsp;&nbsp;'.($row[5]).'h &nbsp;&nbsp;&nbsp; &nbsp; Autor: '.($row[7]).'</p><br>                                       
                    </div>
                    <div class="col-xs-12">';
                        if ($row[8]=='I') {
                                echo '<img src="'.($row[6]).'" alt="" style="width:60%; margin-left: 100px; max-width:640px;">';
                            } else {
                                echo '<video style="width:100%; max-width:640px;" controls>
                                          <source src="'.($row[9]).'" type="video/mp4">
                                          <source src="'.($row[9]).'" type="video/ogg">
                                          Your browser does not support the video tag.
                                        </video>';
                            }
                        echo '<br><br>
                    </div>
                    <div class="col-xs-12">
                        '.($row[3]).'
                    </div>';
                } else {
                    if ($row[8] == 'A') {
                        echo '<div class="col-xs-12">
                            <h1 style="color:#153192; font-weight: bold;">'.($row[1]).'</h1>
                        </div>
                        <div class="col-xs-12">
                            <p>'.($row[2]).'</p>
                        </div>
                        <HR class="info" width=100% align="center">
                        <div class="col-xs-12">                                     
                            <p style="font-size: 11px">Fecha: '.($row[4]).'&nbsp;&nbsp;'.($row[5]).'h &nbsp;&nbsp;&nbsp; &nbsp; Autor: '.($row[7]).'</p><br>                                       
                        </div>
                        <div class="col-xs-12">
                            <img src="'.($row[6]).'" alt="" style="width:100%; max-width:640px;"><br><br>
                        </div>
                        <div class="col-xs-12">
                            '.($row[3]).'
                        </div>
                        <div class="col-xs-12">
                           <video style="width:100%; max-width:640px;" controls>
                              <source src="'.($row[9]).'" type="video/mp4">
                              <source src="'.($row[9]).'" type="video/ogg">
                              Your browser does not support the video tag.
                            </video>
                        </div>';
                    } else {
                        echo '<div class="col-xs-12">
                            <h1 style="color:#153192; font-weight: bold;">'.($row[1]).'</h1>
                                </div>
                                <div class="col-xs-12">
                                    <p>'.($row[2]).'</p>
                                </div>
                                <HR class="info" width=100% align="center">
                                <div class="col-xs-12">                                     
                                    <p style="font-size: 11px">Fecha: '.($row[4]).'&nbsp;&nbsp;'.($row[5]).'h &nbsp;&nbsp;&nbsp; &nbsp; Autor: '.($row[7]).'</p><br>                                       
                                </div>                                
                                <div class="col-xs-12">
                                    '.($row[3]).'
                                </div>';
                    }
                }              
                
            }
        }

         function noticia_informacion2() {        
            $this->prepararConsultaGestionarNoticia2('opc_noticias_informacion',$this->param['noticia']);
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){ 
                if ($row[8] == 'I' || $row[8] == 'V') {
                    echo '<div class="col-xs-12">
                        <h1 style="color:#153192; font-weight: bold;">'.($row[1]).'</h1>
                    </div>
                    <div class="col-xs-12">
                        <p>'.($row[2]).'</p>
                    </div>
                    <HR class="info" width=100% align="center">
                    <div class="col-xs-12">                                     
                        <p style="font-size: 11px">Fecha: '.($row[4]).'&nbsp;&nbsp;'.($row[5]).'h &nbsp;&nbsp;&nbsp; &nbsp; Autor: '.($row[7]).'</p><br>                                       
                    </div>
                    <div class="col-xs-12">';
                        if ($row[8]=='I') {
                                echo '<img src="'.($row[6]).'" alt="" style="width:60%; margin-left: 100px; max-width:640px;">';
                            } else {
                                echo '<video style="width:100%; max-width:640px;" controls>
                                          <source src="'.($row[9]).'" type="video/mp4">
                                          <source src="'.($row[9]).'" type="video/ogg">
                                          Your browser does not support the video tag.
                                        </video>';
                            }
                        echo '<br><br>
                    </div>
                    <div class="col-xs-12">
                        '.($row[3]).'
                    </div>';
                } else {
                    if ($row[8] == 'A') {
                        echo '<div class="col-xs-12">
                            <h1 style="color:#153192; font-weight: bold;">'.($row[1]).'</h1>
                        </div>
                        <div class="col-xs-12">
                            <p>'.($row[2]).'</p>
                        </div>
                        <HR class="info" width=100% align="center">
                        <div class="col-xs-12">                                     
                            <p style="font-size: 11px">Fecha: '.($row[4]).'&nbsp;&nbsp;'.($row[5]).'h &nbsp;&nbsp;&nbsp; &nbsp; Autor: '.($row[7]).'</p><br>                                       
                        </div>
                        <div class="col-xs-12">
                            <img src="'.($row[6]).'" alt="" style="width:100%; max-width:640px;"><br><br>
                        </div>
                        <div class="col-xs-12">
                            '.($row[3]).'
                        </div>
                        <div class="col-xs-12">
                           <video style="width:100%; max-width:640px;" controls>
                              <source src="'.($row[9]).'" type="video/mp4">
                              <source src="'.($row[9]).'" type="video/ogg">
                              Your browser does not support the video tag.
                            </video>
                        </div>';
                    } else {
                        echo '<div class="col-xs-12">
                            <h1 style="color:#153192; font-weight: bold;">'.($row[1]).'</h1>
                                </div>
                                <div class="col-xs-12">
                                    <p>'.($row[2]).'</p>
                                </div>
                                <HR class="info" width=100% align="center">
                                <div class="col-xs-12">                                     
                                    <p style="font-size: 11px">Fecha: '.($row[4]).'&nbsp;&nbsp;'.($row[5]).'h &nbsp;&nbsp;&nbsp; &nbsp; Autor: '.($row[7]).'</p><br>                                       
                                </div>                                
                                <div class="col-xs-12">
                                    '.($row[3]).'
                                </div>';
                    }
                }              
                
            }
        }
        

    }

?>


 