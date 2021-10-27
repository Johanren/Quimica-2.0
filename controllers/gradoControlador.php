<?php  
class GradoControlador
{
	
	public function registrarGrado(){
		if (isset($_POST['grado'])) {
			$datos = array('grado' => $_POST['grado']);
			$gradoReg = new GradoModelo();
			$respuesta = $gradoReg->registrarGradoModelo($datos, 'grado');
			if ($respuesta == 'success') {
				print "<script>alert('Grado Registrado')</script>";
				if ($respuesta) {
					echo '<script>window.location="personasGrado"</script>';
				}
			}else{
				print "<script>alert('Grado no registrado')</script>";
			}
		}
	} 

	public function listarGrado(){
		$grado = new GradoModelo();
		$respuesta = $grado->listarGradoModelo('grado');
		return $respuesta;
	}

	public function registrarPersonasGrado(){
		if (isset($_POST['grados'])) {
			$datos = array('persona' => $_POST['idPersonas'],
				'grado' => $_POST['grados'],
				'fecha' => $_POST['fechaInicio']);
			$gradoRegPer = new GradoModelo();
			$respuesta = $gradoRegPer->registrarPersonasGradoModelo($datos, 'personasgrado');
			if ($respuesta == 'success') {
				print "</script>alert('Estudiante Registrado')</script>";
				if ($respuesta) {
					echo '<script>window.location="personasGrado"</script>';
				}
			}else{
				print "<script>alert('Estudiante no registrado')</script>";
		}
	}
}

	public function listarPersonasGrado(){
		$listarPerGra = new GradoModelo();
		$respuesta = $listarPerGra->listarPersonasGradoModelo('personasgrado');
		return $respuesta;
	}

	public function listarEstudiantesControlador(){
		$id = $_GET['id'];
		$cuersoModel = new GradoModelo();
		$respuesta = $cuersoModel->listarEstudiantesModelo($id);
		return $respuesta;

	}

	public function BuscarPersonas(){
		if(isset($_POST['buscar'])){
			$id = $_GET['id'];
			switch($_POST['camBuscar']){
				case 'fechaInscripcion':
				$campo = "fechaInscripcion";
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
			$estudiante = new GradoModelo();
			$persona = $estudiante-> BuscarPersona($campo, $dato, $id);
			return $persona;
		}
	}

	public function BuscarCursos(){
		if(isset($_POST['buscar'])){
			switch($_POST['camBuscar']){
				case 'nombreGrado':
				$campo = "nombreGrado";
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
			$buscarCursos = new GradoModelo();
			$buscar = $buscarCursos ->buscarCursos($campo, $dato);
			return $buscar;
		}
	}

	
}
?>