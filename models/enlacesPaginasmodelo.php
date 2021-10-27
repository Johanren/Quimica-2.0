<?php  
class EnlacesPaginasModelo{
	function enlacesPaginas($enlace){

		if ($enlace == 'ingresar' ||
			$enlace == 'registrar' ||
			$enlace == 'usuario' ||
			$enlace == 'perfil' ||
			$enlace == 'salir' ||
			$enlace == 'editar' ||
			$enlace == 'editarRol' ||
			$enlace == 'inicio'||
			$enlace == 'prueva'||
			$enlace == 'olvidoContraseña'||
			$enlace == 'actividad' ||
			$enlace == 'actividadVista' ||
			$enlace == 'RealizarActividad'||
			$enlace == 'asignarRoles'||
			$enlace == 'personasGrado'||
			$enlace == 'notas' ||
			$enlace == 'conPreguntas'||
			$enlace == 'curso'||
			$enlace == 'estudiantes'||
			$enlace == 'acEstudiante'||
			$enlace == 'upPregunta' ||
			$enlace == 'eliminarPregunta' ||
			$enlace == 'eliminarActividades') {
			
			$modulo = 'views/modules/' . $enlace . '.php';
	}
	elseif ($enlace == 'index') {
		$modulo = 'views/template.php';
	}
	elseif ($enlace == 'ok') {
		$modulo = 'views/modules/registrar.php';
	}
	elseif ($enlace == 'oks') {
		$modulo = 'views/modules/actividad.php';
	}
	elseif ($enlace == 'okss') {
		$modulo = 'views/modules/actividad.php';
	}
	elseif ($enlace == 'oksss') {
		$modulo = 'views/modules/actividadVista.php';
	}
	elseif ($enlace == 'falla') {
		$modulo = 'views/modules/ingresar.php';
	}
	elseif ($enlace == 'fala') {
		$modulo = 'views/modules/actividad.php';
	}
	elseif ($enlace == 'fallaa') {
		$modulo = 'views/modules/actividad.php';
	}
	elseif ($enlace == 'del' || 'oksacac') {
		$modulo = 'views/modules/conPreguntas.php';
	}
	elseif ($enlace == 'rolokss' ||  "oksRolLogin") {
		$modulo = 'views/modules/usuario.php';
	}
	elseif ($enlace == 'gradook') {
		$modulo = 'views/modules/personasGrado.php';
	}
	elseif ($enlace == 'gradosok') {
		$modulo = 'views/modules/personasGrado.php';
	}
	elseif ($enlace = 'change') {
		$modulo = 'views/modules/usuario.php';
	}
	elseif ($enlace == 'chang') {
		$modulo = 'views/modules/perfil.php';
	}
	elseif ($enlace == 'delRes'){
		$modulo = 'views/modules/eliminarPregunta.php';
	}
	elseif ($enlace == 'delPeg'){
		$modulo = 'views/modules/eliminarActividades.php';
	}

	/////////////////RESULTADOS ACTIVIDAD

	elseif ($enlace = 'ok1' || $enlace == "fa1") {
		$modulo = 'views/modules/RealizarActividad.php';
	}
	else{
		$modulo = 'views/modules/inicio.php';
	}
	
	return $modulo;
}
}
?>