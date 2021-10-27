<?php 


class RespuestaControlador {
	
	function cargarRespuestasControlador($id) 	{
		$respuestaModelo = new RespuestaModelo();
		$respuestas = $respuestaModelo->cargarRespuestasModelo($id);
		//print_r($respuestas);
		return $respuestas;
	}


	public function insertarRespuestaControlador($datosRespuesta){
		$respuestaModelo = new RespuestaModelo();
		$respuesta = $respuestaModelo->insertarRespuestasModelo($datosRespuesta);
		if ($respuesta) {
			header('location:actividadVista');
		}
	}

	function consultarRespuestaControlador($id){
		$consultarRes = new RespuestaModelo();
		$respuestas = $consultarRes->consultarRespuestaModelo($id);
		return $respuestas;
	}

	function consultarRespuestaControlador1(){
		$consultarRes = new RespuestaModelo();
		$respuestas = $consultarRes->consultarRespuestaModelo1();
		return $respuestas;
	}

	function eliminarRespuestaControlador(){
		if (isset($_GET['del'])) {
			$dato = $_GET['del'];
			$eliminar = new RespuestaModelo();
			$respuesta = $eliminar-> eliminarRespuestaModelo($dato);
			print $respuesta;
		}
	}

	function ActualizarRespuestasControlador(){
		if (isset($_POST['actvidad'])) {
			foreach ($_POST['idRespuestas'] as $key => $value) {
				$actu = $_POST['idRespuestas'][$key];
				$actuRes = $_POST['editarRes'][$key];
				$actuVerda = $_POST['respuesta'][$key];
				$actuMulti = $_POST['mul'][$key];
				if ($actu != null) {
					$actualizar = new RespuestaModelo();
					$respuestas = $actualizar->ActualizarRespuestasModelo($actu, $actuRes, $actuVerda, $actuMulti);
					if ($respuestas == "success") {
						header('location:oksacac');
					}

				}

			}
			print($respuestas);
		}
	}
}