<?php
require_once('conexion.php');
class ActividadModel extends Conexion
{
    private $tabla = "actividades";
    //Registrar actividad
    public function registrarActividadesModelo($datos)
    {
        $sql = "INSERT INTO actividades (tituloActividad, nivelMinimo) VALUES (?,?)";
        try {
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(1, $datos['actividad'], PDO::PARAM_STR);
            $stmt->bindParam(2, $datos['nivel'], PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->lastInsertId();
            }
            else{
                return 0;
            }

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    
    //Listar actividades

    public function listarActividadModel(){
        /*$stmt = Conexion::conectar()->prepare("SELECT * FROM `actividad` INNER JOIN preguntas ON actividad.idpreguntas = preguntas.id INNER JOIN respuestas ON actividad.idrespuestas = respuestas.id WHERE 1");*/
        $stmt = Conexion::conectar()->prepare("SELECT * FROM `actividades` WHERE 1");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    

    //Actualizar Actividades

    public function ConsultarActividadesModelo($id){
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

    

    public function ActualizarActividadesModelo($datos, $tabla){
        #print "Entro a actualizar";
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre= :nombre, estado_pregunta = :estado_pregunta WHERE idActividad = :idActividad");
        $stmt->bindParam(':idActividad', $datos['idActividad'], PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':estado_pregunta', $datos['estado_pregunta'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "success";
        }else{
            return "error";
        }

        $stmt->close();
        #UPDATE actividad INNER JOIN preguntas ON actividad.idpreguntas = preguntas.id INNER JOIN respuestas ON actividad.idrespuestas = respuestas.id SET preguntas.preguntas = 'holas', respuestas.respuestas = 'feo' WHERE actividad.id = 1
    }

    public function eliminarAcctividadModel($id, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idActividad = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "success";
        }
        else{
            return "error";
        }

        $stmt->close();
    }
}
