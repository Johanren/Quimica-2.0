<?php 



class ResultadosActividadControlador {
	
	public function registrarResultadoActividadControlador() {
		if (isset($_POST['regResultadoActividad'])) {

			$resultadoActividadModelo = new ResultadosActividadModelo();
			$resultado = $resultadoActividadModelo->registrarResultadoActividadModelo($_POST['idPregunta']);

			if ($resultado) {
				print '<p class="alert alert-success" role="alert"><a href="notas">Actividad Realizada Correctamente</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></p>';
			}
			else{
				print '<p class="alert alert-success" role="alert">Actividad No Realizadas Correctamente<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></p>';	
			}

		}
	}

	public function listarResultado(){
		$id = $_SESSION['idPersonas'];
		$notas = new ResultadosActividadModelo();
		$respuesta = $notas->listarResultadoModelo($id);
		return $respuesta;
	}

	function listarEstudiantesResultadoControlador(){
		$id = $_GET['id'];
		$listarEsRes = new ResultadosActividadModelo();
		$respuesta = $listarEsRes->listarEstudiantesResultadoModelo($id);
		return $respuesta;
	}

	public function BuscarFechaActividad(){
		if(isset($_POST['buscar'])){
			if (isset($_GET['id'])) {
				$idEstudiante = $_GET['id'];
				switch($_POST['camBuscar']){
					case 'fechaPresentacion':
					$campo = "fechaPresentacion";
					break;
					default:
					$campo = "";
					break;
				}
				if(isset($_POST['campbuscar'])){
					$dato = $_POST['campbuscar'];
				}else{
					$dato = "";
				}
				$estudiante = new ResultadosActividadModelo();
				$persona = $estudiante-> BuscarFechaActividadModelo($campo, $dato, $idEstudiante);
				return $persona;
			}
		}
	}

	function BuscarFechaActividadPersonal(){
		if(isset($_POST['buscar'])){
			$_SESSION['idPersonas'];
			$idEstudiante = $_SESSION['idPersonas'];
			switch($_POST['camBuscar']){
				case 'fechaPresentacion':
				$campo = "fechaPresentacion";
				break;
				default:
				$campo = "";
				break;
			}
			if(isset($_POST['campbuscar'])){
				$dato = $_POST['campbuscar'];
			}else{
				$dato = "";
			}
			$estudiante = new ResultadosActividadModelo();
			$persona = $estudiante-> BuscarFechaActividadPersonaModelo($campo, $dato, $idEstudiante);
			return $persona;
		}
	}

	function eliminarNotasControlador(){
		if (isset($_GET['del'])) {
			$dato = $_GET['del'];
			#$eliminar = new ResultadosActividadModelo();
			#$respuesta = $eliminar-> eliminarNotaModelo($dato);
			print $dato;
		}
	}
}

?>