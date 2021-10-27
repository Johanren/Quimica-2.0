<?php 

class LoginModelo extends Conexion{
	private $tabla = 'personasrol';

	function registrarLoginModelo($datosLogin){
		$sql = "INSERT INTO $this->tabla(email, password, idPersonas, idRol) VALUES (?,?,?,?)";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosLogin['email'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosLogin['clave'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosLogin['idPersona'], PDO::PARAM_INT);
			$stmt->bindParam(4, $datosLogin['idRol'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";	
			}
			$stmt->close();
		} catch (Exception $e) {
			
		}
	}

	function ingresarLoginModelo($datos){
		$stmt = Conexion::conectar()->prepare("SELECT personas.idPersonas, personasrol.email, personasrol.password, rol.Roles FROM $this->tabla INNER JOIN personas ON personasrol.idPersonas = personas.idPersonas INNER JOIN rol ON personasrol.idRol = rol.idRol WHERE personasrol.email = :email");

		$stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	function consultarLoginIdModel($id){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $this->tabla INNER JOIN personas ON personasrol.idPersonas = personas.idPersonas WHERE personas.idPersonas = :id");

		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	function eliminarUsuarioRolModelo($id){
		$sql = "DELETE FROM $this->tabla WHERE idPersonas = ?";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			return $stmt->execute();
			$stmt->close();
		} catch (Exception $e) {
			
		}
	}

	function actualizarRolModelo($datosEditar){
		$sql = "UPDATE $this->tabla SET email=?,password=? WHERE idPersonas=?";
		try {
			$conn = new Conexion();
			$stmt = $conn -> conectar()->prepare($sql);
			$stmt->bindParam(1, $datosEditar['email'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosEditar['clave'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosEditar['idPersona'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		} catch (Exception $e) {
			
		}
	}

	function actualizarRolModelo1($datosEditar1){
		$sql = "UPDATE $this->tabla SET email=?,password=?,idRol=? WHERE idPersonas=?";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosEditar1['email'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosEditar1['clave'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosEditar1['idRol'], PDO::PARAM_INT);
			$stmt->bindParam(4, $datosEditar1['idPersona'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		} catch (Exception $e) {
			
		}
	}


}