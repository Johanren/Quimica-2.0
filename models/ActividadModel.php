<?php
require_once('conexion.php');
class ActividadModel extends Conexion
{
    private $tabla = "actividades";
    //Registrar actividad
    public function registrarActividadModelo($datos)
    {
        $sql = "INSERT INTO $this->tabla (tituloActividad, nivelMinimo, actividadPuntaje, idUsuario) VALUES (?,?,?,?)";
        try {
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(1, $datos['actividad'], PDO::PARAM_STR);
            $stmt->bindParam(2, $datos['nivelMinimo'], PDO::PARAM_INT);
            $stmt->bindParam(3, $datos['puntaje'], PDO::PARAM_INT);
            $stmt->bindParam(4, $datos['idUsuario'], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            }
            else{
                return false;
            }
            $stmt->close();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }


    public function obtenerIdInsertActividadModelo(){
        $sql = "SELECT MAX(idActividades) AS id FROM $this->tabla";
        try {
            $conn = new Conexion();
            $stmt = $conn->conectar()->prepare($sql);
            if($stmt->execute()){
                return $stmt->fetchAll();
            }
            else{
                return [];
            }
        } catch (Exception $e) {
            
        }

    }

    
    //Listar actividades

    public function listarActividadModel(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM `actividades` WHERE 1");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    function ConsultarActividadModel($id){
        $sql = "SELECT * FROM `actividades` WHERE idActividades = ?";
        try {
            $conn = new Conexion();
            $stmt = $conn -> conectar()->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        } catch (Exception $e) {
            
        }
    }

    function cargarActividadesModelo($idActividad){
        $sql = "SELECT * FROM $this->tabla WHERE idActividades=? ";
        try {
            $conn = new Conexion();
            $stmt = $conn->conectar()->prepare($sql);
            $stmt->bindParam(1,$idActividad, PDO::PARAM_INT);
            if($stmt->execute()){
                return $stmt->fetchAll();
            }
            else{
                return [];
            }
            $stmt->close();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }

    public function ConsultarActividadesModelo($id){
        $sql = "SELECT * FROM Actividades ORDER BY idActividades DESC";
        try {
            $conn = new Conexion();
            $stmt = $conn->conectar()->prepare($sql);

            if ($stmt->execute()) {
                return $stmt->fetchAll();
            }
            else{
                [];
            }
            $stmt->close();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }





    //Actualizar Actividades con id

    public function ConsultarActividadesIdModelo($id){
        $sql = "SELECT * FROM Actividades WHERE idActividades=?";
        try {
            $conn = new Conexion();
            $stmt = $conn->conectar()->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return $stmt->fetchAll();
            }
            else{
                [];
            }
            $stmt->close();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }



    

    public function ActualizarActividadesModelo($datos){
        #print "Entro a actualizar";
        $conn = new Conexion();
        $stmt = $conn -> conectar()->prepare("UPDATE $this->tabla SET tituloActividad=?,nivelMinimo=?,actividadPuntaje=? WHERE idActividades = ?");
        $stmt->bindParam(1, $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(2, $datos['nivel'], PDO::PARAM_STR);
        $stmt->bindParam(3, $datos['puntaje'], PDO::PARAM_STR);
        $stmt->bindParam(4, $datos['idActividad'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "success";
        }else{
            return "error";
        }

        $stmt->close();
        #UPDATE actividad INNER JOIN preguntas ON actividad.idpreguntas = preguntas.id INNER JOIN respuestas ON actividad.idrespuestas = respuestas.id SET preguntas.preguntas = 'holas', respuestas.respuestas = 'feo' WHERE actividad.id = 1
    }

    public function eliminarAcctividadModel($id){
        $conn = new Conexion();
        $stmt = $conn ->conectar()->prepare("DELETE FROM $this->tabla WHERE idActividades = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "success";
        }
        else{
            return "error";
        }

        $stmt->close();
    }

    function BuscarActividadModelo($campo, $dato){
        switch ($campo) {
            case 'tituloActividad':
                $cond = "tituloActividad like ?";
                $dato .= '%';
                break;
            default:
                $cond = 1;
                break;
        }
        $sql = "SELECT * FROM $this->tabla WHERE $cond";
        //print $sql;
        try {
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt -> bindParam(1,$dato, PDO::PARAM_STR);
            if($stmt->execute()){
                return $stmt -> fetchAll();
            }
            else{
                return [];
            }
            $stmt -> close();
        } catch (\Throwable $th) {
            print_r("ocurrio un error");
        }
    }

}
