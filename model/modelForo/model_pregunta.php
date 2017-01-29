<?php 

include_once '../../model/conexion_model.php';
class PreguntaModel {
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
            case 'mostrar_preguntas':
                echo $this->mostrarPreguntas();
                break;   
            case 'datos_pregunta':
                echo $this->datosPregunta();
                break;   
            case 'eliminar_pregunta':
                echo $this->eliminarPregunta();
                break; 
            case 'activar_pregunta':
                echo $this->activarPregunta();
                break;           
            case "get":break;
        }
    }


    function gestionarPregunta($opcion) {
        $consultaSql = "call sp_control_pregunta(";
        $consultaSql.="'".$opcion . "',";
        $consultaSql.="'".$this->param['id_pregunta'] . "',";
        $consultaSql.="'".$this->param['estado_pregunta'] . "')";
        //echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }
    

    function mostrarPreguntas() {
        $this->gestionarPregunta('opc_mostrar_preguntas');
        $this->cerrarAbrir();
        $item = 0;
        while($row = mysqli_fetch_row($this->result)){
            $item++;
            echo '<tr>
                    <td style="text-align:center; font-size: 12px; height: 10px; width: 5%; font-weight: bolder;">'.$item.'</td>
                    <td style="font-size: 12px; height: 10px; width: 23%;">'.html_entity_decode($row[1]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 30%;">'.html_entity_decode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;" class="text-center">'.$row[3].'</td>';
            if ($row[4] == 1) {
                echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                          <div id="estado" class="text-center">
                              <span class="label label-WARNING">PENDIENTE</span>
                          </div>
                      </td>';
            } else {
                echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                          <div id="estado" class="text-center">
                              <span class="label label-danger">ELIMINADA</span>
                          </div>
                      </td>';
            }
            echo ' <td style="font-size: 11px; height: 10px; width: 11%; text-align: center;">                        
                      <div class="action-buttons">';
                          if ($row[4] == 1) {
                              echo '<a href="#" class="tooltip-error" data-rel="tooltip" title="Responder" style="margin-right: 15px;">
                                      <span class="blue">
                                          <i class="ace-icon fa fa-pencil-square-o bigger-150" onclick="responderPregunta('.$row[0].');"></i>
                                      </span>
                                  </a>
                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="Eliminar">
                                      <span class="red">
                                          <i class="ace-icon fa fa-trash-o bigger-150" onclick="eliminarPregunta('.$row[0].');"></i>
                                      </span>
                                  </a>';
                          } else {
                              echo '<a href="#" class="tooltip-error" data-rel="tooltip" title="Activar">
                                      <span class="green">
                                          <i class="ace-icon fa fa-check bigger-150" onclick="activarPregunta('.$row[0].');"></i>
                                      </span>
                                  </a>';
                          }
                echo'</div>                                                 
                   </td>';
        }
    }

    function datosPregunta() {
        $this->gestionarPregunta('opc_datos_pregunta');
        $row = mysqli_fetch_row($this->result);
        $output[]=array_map('html_entity_decode', $row);
        echo json_encode($output);
    }

    function eliminarPregunta() {
        $this->gestionarPregunta('opc_eliminar_pregunta');
        $this->cerrarAbrir();
        echo 1;
    }

    function activarPregunta() {
        $this->gestionarPregunta('opc_activar_pregunta');
        $this->cerrarAbrir();
        echo 1;
    }
    
}

?>