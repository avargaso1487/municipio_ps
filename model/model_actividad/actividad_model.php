<?php 
include_once '../../model/conexion_model.php';
class Actividad_model {
    public $data = array();
    function __construct() {
        $this->conexion = Conexion_Model::getConexion();
    }
    function cerrarAbrir(){
        mysqli_close($this->conexion);
        $this->conexion = Conexion_Model::getConexion();
    }
    function insert_actividad($data){
        $sql = "INSERT INTO actividad (
                            ambitoID,
                            actividad,
                            descripcion,
                            lugar,
                            fecha,
                            prioridad,
                            start,
                            end,
                            fechaRegistro
                            ) VALUES(
                            '".$data['ambitoID']."',
                            '".$data['actividad']."',
                            '".$data['descripcion']."',
                            '".$data['lugar']."',
                            '".$data['fecha']."',
                            '".$data['prioridad']."',
                            '".$data['start']."',
                            '".$data['end']."',
                            '".date('Y-m-d')."'
                            )";
        $res = mysqli_query($this->conexion,$sql) or die (mysqli_error($this->conexion));
        if(!$res) return  0;
        else return mysqli_insert_id($this->conexion);
    }
    function get_actividades($data){
        $sql = "SELECT
                a.actividadID,
                a.ambitoID,
                a.actividad,
                a.descripcion,
                a.lugar,
                a.fecha,
                a.prioridad,
                a.fechaRegistro,
                a.fechaModificacion,
                a.start,
                a.end
                FROM actividad a
                ";
        $res = mysqli_query($this->conexion,$sql) or die (mysqli_error($this->conexion));
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return json_encode($data);
    }

    function update_actividad($data){
        $sql = "UPDATE actividad 
                SET 
                ambitoID    ='".$data['ambitoID']."',
                actividad   ='".$data['actividad']."',
                descripcion     ='".$data['descripcion']."',
                lugar   ='".$data['lugar']."',
                prioridad   ='".$data['prioridad']."',
                fechaModificacion   = ".date('Y-m-d')."
                where actividadID = '".$data['actividadID']."'
                ";
        $res = mysqli_query($this->conexion,$sql) or die (mysqli_error($this->conexion));
        if(!$res) return  0;
        else return 1;
    }
     function delete_actividad($data){
        $sql = "DELETE FROM actividad 
                WHERE actividadID = '".$data['actividadID']."'
                ";
        $res = mysqli_query($this->conexion,$sql) or die (mysqli_error($this->conexion));
        if(!$res) return  0;
        else return 1;
    }


    // function update_evento($data){
    //     $sql = "UPDATE EVENTO 
    //             SET 
    //             Suc_idSucursal = '".$data['sucursalID']."',
    //             Even_nombre = '".strtoupper($data['nombre'])."',
    //             Even_descripcion = '".$data['descripcion']."',
    //             Even_fechaInicio = '".$data['fechaI']."',
    //             Even_fechaFin = '".$data['fechaF']."',
    //             Even_duracion = '".$data['duracion']."',
    //             Even_precioTotal = '".$data['precioT']."',
    //             Even_estado = '".$data['estado']."',
    //             Even_simultaneo = '".$data['simultaneo']."'
    //             WHERE Even_idEvento = '".$data['eventoID']."'
    //             ";
    //     $res = mysqli_query($this->conexion,$sql) or die (mysqli_error($this->conexion));
    //     if(!$res) return  0;
    //     else return 1;
    // }
    
    
    // function get_eventos(){
    //     $sql = "SELECT
    //             e.Even_idEvento,
    //             s.Suc_nombre,
    //             e.Suc_idSucursal,
    //             e.Even_nombre,
    //             e.Even_descripcion,
    //             e.Even_duracion,
    //             e.Even_fechaInicio,
    //             e.Even_fechaFin,
    //             e.Even_precioTotal                    
    //             FROM evento e
    //             inner join sucursal s on s.Suc_idSucursal = e.Suc_idSucursal
    //             ";
    //     $res = mysqli_query($this->conexion,$sql) or die (mysqli_error($this->conexion));
    //     $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    //     return json_encode($data);
    // }
}


// actividadID     int not null auto_increment,
//     ambitoID        int not null,
//     actividad       varchar(50) not null,
//     descripcion     varchar(50) not null,
//     lugar           varchar(50) not null,
//     fecha           date not null,
//     prioridad       int not null,
//     fechaRegistro   date null,
//     fechaModificacion date null,
//     start varchar(50) null,
//     end varchar(50) null,