<?php  

require_once('conexion.php');

class UsuariosModel extends Conexion{
		//METODO PARA INSERTAR (CREATE) DATOS EN LA BD
	private $tabla = 'personas';
	public function registarUsuariosModelo($datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $this->tabla (`nombre`, `apellido`, `documentoIdentidad`, `numeroDocumento`, `fechaNacimiento`) VALUES (?,?,?,?,?)");
		$stmt->bindParam(1,$datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(2,$datos['apellido'], PDO::PARAM_STR);
		$stmt->bindParam(3,$datos['t_d'], PDO::PARAM_STR);
		$stmt->bindParam(4,$datos['n_d'], PDO::PARAM_STR);
		$stmt->bindParam(5,$datos['fn'], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();
	}

	function optenerUltimoIdModelo(){
		$sql = "SELECT MAX(idPersonas) AS id FROM $this->tabla";
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

	public function ingresarUsuariosModelo($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT personas.idPersonas, personasrol.email, personasrol.password, rol.Roles FROM `personasrol` INNER JOIN personas ON personasrol.idPersonas = personas.idPersonas INNER JOIN rol ON personasrol.idRol = rol.idRol WHERE personasrol.email = :email");

		$stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	public function listarUsuariosModel(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $this->tabla WHERE 1");
		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();
	}

	public function listarRolesModel(){
		$sql = "SELECT * FROM `rol` WHERE 1";
		try {
			$conn = new Conexion();
			$stmt = $conn ->conectar()->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();
		} catch (Exception $e) {
			
		}
		
		
	}

	public function consultarUsuariosIdModel($id){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $this->tabla WHERE idPersonas = :id");

		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	function consultarPersonasRolModel($id){
		$sql = "SELECT * FROM `personasrol` WHERE idPersonas = :id";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);

			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		} catch (Exception $e) {
			
		}
	}

	public function actualizarUsuarioModel($datos){
		$stmt = conexion::conectar()->prepare("UPDATE $this->tabla SET nombre=?,apellido=?,documentoIdentidad=?,numeroDocumento=?,fechaNacimiento=? WHERE idPersonas = ?");

		$stmt->bindParam(1, $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(2, $datos['apellido'], PDO::PARAM_STR);
		$stmt->bindParam(3, $datos['t_d'], PDO::PARAM_STR);
		$stmt->bindParam(4, $datos['n_d'], PDO::PARAM_STR);
		$stmt->bindParam(5, $datos['fN'], PDO::PARAM_STR);
		$stmt->bindParam(6, $datos['id'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "Error";
		}

		$stmt->close();

	}

	//Perfil

	public function actualizarPerfilModel($datos){
		$stmt = conexion::conectar()->prepare("UPDATE $this->tabla SET nombre = :nombre, fechaNacimiento = :fN, apellido = :apellido WHERE idPersonas = :id");

		$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':fN', $datos['fN'], PDO::PARAM_STR);
		$stmt->bindParam(':apellido', $datos['apellido'], PDO::PARAM_STR);
		$stmt->bindParam(':id', $datos['id'], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "Error";
		}

		$stmt->close();

	}



	public function eliminarUsuarioModel($id, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPersonas = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();
	}

	public function buscarDatos($campo, $dato){
		switch ($campo) {
			case 'nombre':
			$cond = "nombre like ?";
			$dato .= '%';
			break;
			case 'email':
			$cond = "email like ?";
			$dato .= '%';
			break;
			case 'tipoDocumento':
			$cond = "tipoDocumento like ?";
			$dato .= '%';
			break;
			case 'numeroDocumento':
			$cond = "numeroDocumento like ?";
			$dato .= '%';
			break;
			case 'numero':
			$cond = "numero like ?";
			$dato .= '%';
			break;
			case 'fechaNacimeinto':
			$cond = "fechaNacimeinto like ?";
			$dato .= '%';
			break;
			default:
			$cond = 1;
			break;
		}
		$sql = "SELECT * FROM `personasrol` INNER JOIN personas ON personasrol.idPersonas = personas.idPersonas INNER JOIN rol ON personasrol.idRol = rol.idRol WHERE $cond";
		#print $sql;
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

	function consultarPersonaAjaxModelo($dato){
		if ($dato != '') {
			$dato = '%'.$dato.'%';
			$sql = "SELECT * FROM $this->tabla WHERE numeroDocumento like ? ORDER BY numeroDocumento";
		}
		else{
			$sql = "SELECT * FROM $this->tabla ORDER BY numeroDocumento";
		}

		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);

			if ($dato != '') {
				$stmt->bindParam(1, $dato, PDO::PARAM_STR);
			}
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			}
			else{
				return [];
			}
		}catch (PDOException $e){
			print_r($e->getMessage());
		}	
		$stmt->close();

	}

}
