<?php  
class NotasControlador
{

	
	public function RegistrarNotasControlador($idPersona, $nota){
		if (isset($_POST['enviars'])) {
			$datos = array('idPersona' => $idPersona,
							'idActividad' => $_GET['id'],
							'nota' => $nota);
			$notas = $nota;

			var_dump($notas);
			$respuesta = new NotasModel();
			$nota = $respuesta -> registrarNotasModel($datos, $notas);
			print_r($nota);
		}
	}

	
}

?>