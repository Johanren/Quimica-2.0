<?php
class UsuarioControlador
{
	//METODO PARA REGISTRAR LOS USURARIOS:
	public function registrarUsuariosControlador()
	{
		if (isset($_POST['emailRegistro'])) {
			$email = $_POST['emailRegistro'];
			$modeloEmail = new LoginModelo();
			$respuesta = $modeloEmail->ConsultarEmailModelo($email);
			if ($respuesta) {
				print "<script>alert('Email ya Ingresado')</script>";
			}else{
				if (isset($_POST['enviars'])) {
					$datos = array(
						'nombre' => $_POST['nombreRegistro'],
						'apellido' => $_POST['apellidoRegistro'],
						't_d' => $_POST['t_dRegistro'],
						'n_d' => $_POST['n_dRegistro'],
						'fn' => $_POST['fnRegistro']
					);
					$registrarUsuario = new UsuariosModel();
					$respuesta = $registrarUsuario->registarUsuariosModelo($datos);
					if ($respuesta) {
						$idPersona = $registrarUsuario->optenerUltimoIdModelo();
						$ultimoId = $idPersona[0]['id'];
					}
					if (isset($_POST['enviars'])) {
						$hash=password_hash($_POST['numeroRegistro'], PASSWORD_DEFAULT);
						$datosLogin = array('email' => $_POST['emailRegistro'],
							'clave' => $hash,
							'idPersona' => $ultimoId,
							'idRol' => 2);
						$registarLogin = new LoginModelo();
						$respuesta = $registarLogin->registrarLoginModelo($datosLogin);
						if ($respuesta == 'success') {
							print "<script>alert('Usuario Registrado')</script>";
						} else {
							print "Usuario no Registrado";
						}
					}

				}
			}
		}
	}


	
	public function listarUsuarioControlador()
	{
		$modelo = new UsuariosModel();
		$respuesta = $modelo->listarUsuariosModel('personas');
		return $respuesta;
		
	}

	public function listarRolesControlador(){
		$modelo = new UsuariosModel();
		$respuesta = $modelo->listarRolesModel();
		return $respuesta;
	}
	public function listarPersonasControlador(){
		$modelo = new UsuariosModel();
		$respuesta = $modelo->listarUsuariosModel();
		return $respuesta;
	}
	//Administrador
	public function consultarUsuarioIdControlador()
	{
		$id = $_GET['id'];
		$consultarPersonas = new UsuariosModel();
		$respuesta = $consultarPersonas->consultarUsuariosIdModel($id);
		return $respuesta;
		
	}
	//Usuarios

	function consultarPersonaControlador(){
		$id = $_GET['id'];
		$consultarPersonas = new UsuariosModel();
		$respuesta2 = $consultarPersonas->consultarPersonasRolModel($id);
		return $respuesta2;
	}

	public function actualizarUsuarioControlador()
	{
		if (isset($_POST['enviar'])) {
			$datos = array('id' => $_POST['id'],
				'nombre' => $_POST['nombreEditar'],
				'apellido' => $_POST['apellidoEditar'],
				't_d' => $_POST['t_dEditar'],
				'n_d' => $_POST['n_dEditar'],
				'fN' => $_POST['fNEditar']
			);
			$modelo = new UsuariosModel();
			$respuesta = $modelo ->actualizarUsuarioModel($datos);
		}
	}



	public function eliminarUsuarioControlador()
	{
		if (isset($_GET['del'])) {
			$dato = $_GET['del'];
			$modelo = new UsuariosModel();
			$respuesta = $modelo->eliminarUsuarioModel($dato, 'personas');
			print $respuesta;
			/*if ($respuesta = "success") {
				print '<p class="alert alert-success" role="alert">Usuario Eliminado <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></p>';
				//header('location:usuario');
			}*/
		}
	}

	public function BuscarUsuarios(){
		if(isset($_POST['buscar'])){
			switch($_POST['camBuscar']){
				case 'nombre':
				$campo = "nombre";
				break;
				case 'email':
				$campo = "email";
				break;
				case 'tipoDocumento':
				$campo = "tipoDocumento";
				break;
				case 'numeroDocumento':
				$campo = "numeroDocumento";
				break;
				case 'numero':
				$campo = "numero";
				break;
				case 'fechaNacimiento':
				$campo = "fechaNacimeinto";
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
			$buscarUsuario = new UsuariosModel();
			$usuario = $buscarUsuario ->buscarDatos($campo, $dato);
			return $usuario;
		}
		
	}

	function consultarPersonaAjaxControlador($dato){
		$consultar = new UsuariosModel();
		$respuesta = $consultar->consultarPersonaAjaxModelo($dato);
		return $respuesta;
	}
}
