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
    

    function registrarPregunta() {
        $this->gestionarForo('opc_registrar_pregunta');
        $this->cerrarAbrir();
        echo 1;
    }
    
}

?>