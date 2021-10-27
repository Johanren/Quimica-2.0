<?php 


class RespuestaModelo extends Conexion {
	private $tabla = 'respuestas';
	function cargarRespuestasModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idPreguntas = ?";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
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


	public function insertarRespuestasModelo($datosRespuesta){
		$sql = "INSERT INTO $this->tabla (idPreguntas, descripcionRespuesta, resultado, resultadoMultiple) VALUES (?,?,?,?)";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosRespuesta['idPregunta'], PDO::PARAM_INT);
			$stmt->bindParam(2, $datosRespuesta['descripcionRespuesta'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosRespuesta['resultado'], PDO::PARAM_STR);
			$stmt->bindParam(4, $datosRespuesta['resultadoMultiple'], PDO::PARAM_STR);
			$stmt->execute();
			//$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	function consultarRespuestaModelo($id){
		$sql = "SELECT * FROM $this->tabla WHERE idPreguntas = ? ";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		} catch (Exception $e) {
			
		}
	}

	function consultarRespuestaModelo1(){
		$sql = "SELECT * FROM $this->tabla WHERE 1";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		} catch (Exception $e) {
			
		}
	}

	function eliminarRespuestaModelo($dato){
		$sql = "DELETE FROM $this->tabla WHERE idPreguntas = ?";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $dato, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		} catch (Exception $e) {
			
		}
	}

	function ActualizarRespuestasModelo($id, $respuesta, $verdadero, $multiple){
		$sql = "UPDATE $this->tabla SET descripcionRespuesta=?, resultado=?, resultadoMultiple=? WHERE idRespuestas=?";
		var_dump($id);
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $respuesta, PDO::PARAM_STR);
			$stmt->bindParam(2, $verdadero, PDO::PARAM_STR);
			$stmt->bindParam(3, $multiple, PDO::PARAM_STR);
			$stmt->bindParam(4, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";
			}
		} catch (Exception $e) {
			
		}
	}
}
