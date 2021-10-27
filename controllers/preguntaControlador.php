<?php 


class PreguntaControlador {

	public function cargarPreguntasControlador($idActividad) {
		if ($_SESSION['idPersonas']) {
			$preguntaModelo = new PreguntaModelo();
			$respuesta = $preguntaModelo->cargarPreguntasModelo($idActividad);
			return $respuesta;
		}
	}


	public function insertarPreguntaContralador($datosPregunta){
		$preguntaModelo = new PreguntaModelo();
		$respuesta = $preguntaModelo->insertarPreguntaModelo($datosPregunta);
		return $respuesta;
	}

	public function obtenerUltimoIdPreguntaControlador() {
		$preguntaModelo = new PreguntaModelo();
		$respuesta = $preguntaModelo->consultarUltimoIdPreguntaModelo();
		return $respuesta;
	}


	public function consultarPreguntasIdActividadControlador(){
		if (isset($_POST['conPreguntas'])) {
			$preguntaModelo = new PreguntaModelo();
			$datosPregunta = $preguntaModelo->cargarPreguntasModelo($_POST['idActividad']);
			return $datosPregunta;
		}
	}

	function consultarPreguntasControlador($id){
		$consultarPre = new PreguntaModelo();
		$respuesta = $consultarPre->consultarPreguntaModelo($id);
		return $respuesta;
	}

	function eliminarPreguntaControlador(){
		if (isset($_GET['delPre'])) {
			$dato = $_GET['delPre'];
			print $dato;
			$eliminar = new PreguntaModelo();
			$respuesta = $eliminar->eliminarPreguntaModel($dato);
			print $respuesta;
			if ($respuesta = "success") {
				header('location:delPeg');
			}else{
				print "NO eliminar";
			}
		}
		
	}

	function ActualizarPreguntasControlador($id){
		if (isset($_POST['actvidad'])) {
			foreach ($_POST['idPregunta'] as $key => $value) {
				$actualizar = $_POST['idPregunta'][$key];
				$actualizarPregunat = $_POST['EditarPregunta'][$key];
				$datosPregunta = new PreguntaModelo();
				$respuesta=$datosPregunta->ActualizarPreguntasModelo($actualizar, $actualizarPregunat);
				
			}
			
		}
	}

}