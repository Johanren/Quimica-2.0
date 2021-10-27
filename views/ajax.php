<?php  

require_once("../controllers/usuariosControlador.php");

require_once("../models/UsuariosModel.php");

class Ajax{

	public $persona;

	function consultarPersonaAjax(){
		$grado = new UsuarioControlador();
		$respuesta = $grado -> consultarPersonaAjaxControlador($this->persona);
		foreach ($respuesta as $key => $value) {
				$datos[] = array('label' => $value['numeroDocumento'],
								 'label' => $value['nombre'],
									'id' => $value['idPersonas'] );
			}

			print json_encode($datos);
	}
}

$ajax = new Ajax();

if (isset($_GET['conNom'])) {
		$ajax->persona = $_GET['conNom'];
		$ajax->consultarPersonaAjax();
	}