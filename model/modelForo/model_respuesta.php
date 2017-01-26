<?php 

include_once '../../model/conexion_model.php';
class RespuestaModel {
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
            case 'mostrar_respuestas':
                echo $this->mostrarRespuestas();
                break;   
            case 'registrar_respuesta':
                echo $this->registrarRespuesta();
                break;     
            case 'datos_respuesta':
                echo $this->datosRespuesta();
                break;   
            case 'editar_respuesta':
                echo $this->editarRespuesta();
                break;
            case 'eliminar_respuesta':
                echo $this->eliminarRespuesta();
                break; 
            case 'activar_respuesta':
                echo $this->activarRespuesta();
                break;           
            case "get":break;
        }
    }


    function gestionarRespuesta($opcion) {
        $consultaSql = "call sp_control_respuesta(";
        $consultaSql.="'".$opcion . "',";
        $consultaSql.="'".$this->param['id_respuesta'] . "',";
        $consultaSql.="'".$this->param['id_pregunta'] . "',";
        $consultaSql.="'".$this->param['mensaje'] . "',";
        $consultaSql.="'".$this->param['estado_respuesta'] . "')";
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }
    

    function mostrarRespuestas() {
        $this->gestionarRespuesta('opc_mostrar_respuestas');
        $this->cerrarAbrir();
        $item = 0;
        while($row = mysqli_fetch_row($this->result)){
            $item++;
            echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 5%; font-weight: bolder;">'.$item.'</td>
                    <td style="font-size: 12px; height: 10px; width: 30%;">'.html_entity_decode($row[1]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 30%;">'.html_entity_decode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;" class="text-center">'.$row[3].'</td>';
            if ($row[4] == 1) {
                echo '<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">
                          <div id="estado" class="text-center">
                              <span class="label label-success">PUBLICADA</span>
                          </div>
                      </td>';
            } else {
                echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                          <div id="estado" class="text-center">
                              <span class="label label-danger">ELIMINADA</span>
                          </div>
                      </td>';
            }
            echo ' <td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">                        
                      <div class="action-buttons">';
                          if ($row[4] == 1) {
                              echo '<a href="#" class="tooltip-error" data-rel="tooltip" title="Editar" style="margin-right: 15px;">
                                      <span class="blue">
                                          <i class="ace-icon fa fa-pencil bigger-150" onclick="editarRespuesta('.$row[0].');"></i>
                                      </span>
                                  </a>
                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="Eliminar">
                                      <span class="red">
                                          <i class="ace-icon fa fa-trash-o bigger-150" onclick="eliminarRespuesta('.$row[0].');"></i>
                                      </span>
                                  </a>';
                          } else {
                              echo '<a href="#" class="tooltip-error" data-rel="tooltip" title="Activar">
                                      <span class="green">
                                          <i class="ace-icon fa fa-check bigger-150" onclick="activarRespuesta('.$row[0].');"></i>
                                      </span>
                                  </a>';
                          }
                echo'</div>                                                 
                   </td>';
        }
    }

    function registrarRespuesta() {
        $this->gestionarRespuesta('opc_registrar_respuesta');
        $this->cerrarAbrir();
        echo 1;
    }

    function datosRespuesta() {
        $this->gestionarRespuesta('opc_datos_respuesta');
        $row = mysqli_fetch_row($this->result);
        $output[]=array_map('html_entity_decode', $row);
        echo json_encode($output);
    }

    function editarRespuesta() {
        $this->gestionarRespuesta('opc_editar_respuesta');
        $this->cerrarAbrir();
        echo 1;
    }

    function eliminarRespuesta() {
        $this->gestionarRespuesta('opc_eliminar_respuesta');
        $this->cerrarAbrir();
        echo 1;
    }

    function activarRespuesta() {
        $this->gestionarRespuesta('opc_activar_respuesta');
        $this->cerrarAbrir();
        echo 1;
    }
    
}

?>