<?php  
require_once('conexion.php');
class GradoModelo extends Conexion
{
	
	public function registrarGradoModelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`nombreGrado`) VALUES (?)");
		$stmt->bindParam(1, $datos['grado'], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	public function listarGradoModelo(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM `grado` WHERE 1");
		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();
	}

	public function registrarPersonasGradoModelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`idPersonas`, `idGrado`, `fechaInscripcion`) VALUES (?,?,?)");
		$stmt->bindParam(1,$datos['persona'], PDO::PARAM_INT);
		$stmt->bindParam(2,$datos['grado'], PDO::PARAM_INT);
		$stmt->bindParam(3,$datos['fecha'], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	public function listarPersonasGradoModelo(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM `personasgrado` INNER JOIN personas ON personasgrado.idPersonas = personas.idPersonas INNER JOIN grado ON personasgrado.idGrado = grado.idGrado WHERE 1
			");
		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();
	}

	public function listarEstudiantesModelo($id){
		$sql = "SELECT * FROM `personasgrado` INNER JOIN personas ON personasgrado.idPersonas = personas.idPersonas JOIN grado ON personasgrado.idGrado = grado.idGrado WHERE personasgrado.idGrado = ?";
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

	public function BuscarPersona($campo, $dato, $id){
		switch ($campo) {
			case 'fechaInscripcion':
				$cond = "personasgrado.fechaInscripcion like ?";
				$dato .= '%';
				break;
			default:
				$cond = 1;
				break;
		}
		$sql = "SELECT * FROM `personasgrado` INNER JOIN personas ON personasgrado.idPersonas = personas.idPersonas INNER JOIN grado ON personasgrado.idGrado = grado.idGrado WHERE $cond AND personasgrado.idGrado = ?";
		//print $sql;
		//print($id);
		try {
			$stmt = Conexion::conectar()->prepare($sql);
			$stmt -> bindParam(1,$dato, PDO::PARAM_STR);
			$stmt->bindParam(2, $id, PDO::PARAM_STR);
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

	public function buscarCursos($campo, $dato){
		switch ($campo) {
			case 'nombreGrado':
			$cond = "nombreGrado like ?";
			$dato .= '%';
			break;
			default:
			$cond = 1;
			break;
		}
		$sql = "SELECT * FROM `grado` WHERE $cond";
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
?>