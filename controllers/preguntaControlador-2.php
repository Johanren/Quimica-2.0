<?php 


class PreguntaControlador {
	
	public function cargarPreguntasControlador() {
		if ($_GET['id']) {
			$preguntaModelo = new PreguntaModelo();
			$respuesta = $preguntaModelo->cargarPreguntasModelo($_GET['id']);
			return $respuesta;
		}
	}


	public function insertarPreguntaContralador($idActividad){
		print "entro al controlador de Preguntas ".$idActividad;
	}
}