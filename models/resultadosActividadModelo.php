<?php 
require_once('conexion.php');

class ResultadosActividadModelo extends Conexion {
	
	private $tabla = "resultadosactividades";
	private $valoresInsertar = '';

	function registrarResultadoActividadModelo($datosRespuesta)	{
		
		$sql = "INSERT INTO $this->tabla (idRespuesta, idPersona) VALUES ";

		foreach ($datosRespuesta as $key => $value) {
			$this->valoresInsertar .= '(?,?),';
			//print "<br>El valor en el modelo es ".$value;
		}

		$this->valoresInsertar = substr($this->valoresInsertar, 0, -1);

		$sql .= $this->valoresInsertar;
		$posicionBind = 1;
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			for ($i=0; $i < count($datosRespuesta); $i++) { 
				$stmt->bindParam($posicionBind, $datosRespuesta[$i], PDO::PARAM_STR);
				$posicionBind++;
				$stmt->bindParam($posicionBind, $_SESSION['idPersonas'], PDO::PARAM_INT);
				$posicionBind++;
			}
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

	public function listarResultadoModelo($idPersonas){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM `view_resultado_actividad` WHERE idPersona = ?");
		$stmt->bindParam(1, $idPersonas, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();
	}

	function listarEstudiantesResultadoModelo($id){
		$sql = "SELECT * FROM `view_resultado_actividad` WHERE idPersona = ?";
		try {
			$conn = new Conexion();
			$stmt = $conn ->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		} catch (Exception $e) {
			
		}
	}

	public function BuscarFechaActividadModelo($campo, $dato, $id){
		switch ($campo) {
			case 'fechaPresentacion':
				$cond = "fechaPresentacion like ?";
				$dato .= '%';
				break;
			default:
				$cond = 1;
				break;
		}
		$sql = "SELECT * FROM `view_resultado_actividad` WHERE $cond AND idPersona = $id";
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

	public function BuscarFechaActividadPersonaModelo($campo, $dato, $id){
		switch ($campo) {
			case 'fechaPresentacion':
				$cond = "fechaPresentacion like ?";
				$dato .= '%';
				break;
			default:
				$cond = 1;
				break;
		}
		$sql = "SELECT * FROM `view_resultado_actividad` WHERE $cond AND idPersona = $id";
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

	function eliminarNotaModelo($dato){
		$sql = "DELETE FROM $this->tabla WHERE idRespuesta = ?";
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
}