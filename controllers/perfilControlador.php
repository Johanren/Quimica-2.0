<?php
//session_start();
class PerfilControlador
{


	public function perfilUsuario()
	{
		$id = $_SESSION['idPersonas'];
		//print "xxxx" . $id;
		$consultarLogin = new LoginModelo();
		$login = $consultarLogin->consultarLoginIdModel($id);

		return $login;
	}

	public function img()
	{
		$id = $_GET['id'];
		//print "xxxx" . $id;
		$consultarLogin = new LoginModelo();
		$login = $consultarLogin->consultarLoginIdModel($id);

		return $login;
	}

	public function actualizarPerfilControlador()
	{
		if (isset($_POST['enviar'])) {
			if ($_POST['claveEditar'] == $_POST['claveEditarCon']) {
				if (isset($_POST['enviar'])) {
					$datos = array(
						'id' => $_POST['id'],
						'nombre' => $_POST['nombreEditar'],
						'apellido' => $_POST['apellidoEditar'],
						'fN' => $_POST['fNEditar']
					);
					$actPerfil = new UsuariosModel();
					$respuesta = $actPerfil-> actualizarPerfilModel($datos);
					if (isset($_POST['enviar'])) {
						$dato = array('idPersona' => $_POST['id'],
							'email' => $_POST['emailEditar'],
							'clave' => $_POST['claveEditar']);
						$modelo = new LoginModelo();
						$respuesta = $modelo -> actualizarRolModelo($dato);
						if ($respuesta == "success") {
					//header('location:perfil');
							print "<script>alert('Perfil actualizado')</script>";
							if ($respuesta == 'success') {
								echo '<script>window.location="perfil"</script>';
							}
						} else {
							print "Error";
						}
					}
					if ($respuesta == "success") {
				//header('location:perfil');
						print "<script>alert('Perfil actualizado')</script>";
					} else {
						print "Error";
					}
				}
			}else{
				print "<script>alert('Contraseñas no coinciden')</script>";
			}
		}
		
	}

	function actualizarFotoControlador(){
		if (isset($_FILES['foto'])) {
			$id = $_POST['id'];
			$name = $_FILES['foto']['name'];
			$name_tpm = $_FILES['foto']['tmp_name'];
			$ruta = "views/perfil/".$name;
			$mover = move_uploaded_file($name_tpm, $ruta);
			$modelo = new UsuariosModel();
			$respuesta = $modelo->actualizarFotoModelo($ruta, $id);
			if ($respuesta) {
				print "<script>alert('Foto de Perfil actualizada')</script>";
				echo '<script>window.location="perfil"</script>';
			}else{
				print "<script>alert('Foto de Perfil No actualizada')</script>";
			}
		}
	}
}
