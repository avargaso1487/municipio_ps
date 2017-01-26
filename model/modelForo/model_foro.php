<?php 

include_once '../../model/conexion_model.php';
class ForoModel {
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
        switch ($this->param['opcion']) {
            case 'registrar_pregunta':
                echo $this->registrarPregunta();
                break;   
            case 'mostrar_foro':
                echo $this->mostrarForo();
                break;         
            case "get":break;
        }
    }


    function gestionarForo($opcion) {
        $consultaSql = "call sp_control_foro(";
        $consultaSql.="'".$opcion . "',";
        $consultaSql.="'".$this->param['nombre_estudiante'] . "',";
        $consultaSql.="'".$this->param['apellido_estudiante'] . "',";
        $consultaSql.="'".$this->param['codigo_estudiante'] . "',";
        $consultaSql.="'".$this->param['mensaje_estudiante'] . "')";
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }

    function mostrarForo(){
        $this->gestionarForo('opc_mostrar_foro');
        $this->cerrarAbrir();       
        $res_foro = $this->result;
        $num_total_registros = mysqli_num_rows($res_foro);
        $TAMANO_PAGINA = 1 ;
        
        if(isset($_GET['pagina']))
        {
            $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        } else {
            $inicio = 0;
           $pagina = 2;
        }        
        
        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

         while($row = mysqli_fetch_row($this->result)){
            echo '<article>
                        <div class="row">                                       
                            <div class="col-md-12">
                                <div class="post-content">
                                    <h2>
                                    <a style="color: #134984;">'.html_entity_decode($row[1]).'</a></h2>
                                    <p>'.html_entity_decode($row[2]).'</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="post-meta">
                                    <span><i class="fa fa-calendar"></i>'.$row[3].'</span>
                                    <span><i class="fa fa-clock-o"></i>'.$row[4].'</span>
                                    <span><i class="fa fa-user"></i> Por
                                        <a>
                                            Administrador
                                        </a> 
                                    </span>                                         
                                                
                                </div>
                            </div>
                        </div>
                    </article>';
         }

         if ($total_paginas > 1) {
           if ($pagina != 1)
              echo '
                            <a href="../municipio_ps/?pagina='.($pagina-1).'">
                                «
                            </a>
                        ';
              for ($i=1;$i<=$total_paginas;$i++) {
                 if ($pagina == $i)
                    //si muestro el índice de la página actual, no coloco enlace
                    echo $pagina;
                 else
                    //si el índice no corresponde con la página mostrada actualmente,
                    //coloco el enlace para ir a esa página
                    echo '
                              <a href="../municipio_ps/?pagina='.$i.'">'.$i.'</a> 
                          ';
              }
              if ($pagina != $total_paginas)
                 echo '
                            <a href="../municipio_ps/?pagina='.($pagina+1).'">
                                »
                            </a>
                        ';
        }
    }
    

    function registrarPregunta() {
        $this->gestionarForo('opc_registrar_pregunta');
        $this->cerrarAbrir();
        echo 1;
    }
    
}

?>