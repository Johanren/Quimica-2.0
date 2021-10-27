<?php  
$listarAc = new ActividadesControlador();
$listarAc->ActualizarActividades();
$listarAct = $listarAc->ConsultarActividad();
$ConsultarActividad = $listarAc->ConsultarActividadPregunta();
$idActividad = $ConsultarActividad[0]['idActividades'];

$listarPre = new PreguntaControlador();
$listarPregun = $listarPre->consultarPreguntasControlador($idActividad);
$listarPre->ActualizarPreguntasControlador($idActividad);

$listarRes = new RespuestaControlador();
$listarRes->ActualizarRespuestasControlador();
//var_dump($consultarRes);
//print($idActividad);

?>

<div class="row">
	<div class="col-2"></div>
	<div class="col-8">
		<h1>Editar Actividad</h1>
		<form  method="post">
			<div class="row mt-5">
				<div class="col">
					<input type="hidden" name="idActividad" value="<?php print $ConsultarActividad[0]['idActividades'] ?>">
					<label>Nombre Actividad</label>
					<input type="text" name="editarActividad" class="form-control" value="<?php print $ConsultarActividad[0]['tituloActividad'] ?>"required>
				</div>
				<div class="col">
					<label>Nivel Minimo</label>
					<input type="text" name="editarNivel" required class="form-control" value="<?php print $ConsultarActividad[0]['nivelMinimo'] ?>">
				</div>
				<div class="col">
					<label>Puntaje Actividad</label>
					<input type="text" name="editarPuntaje" class="form-control" value="<?php print $ConsultarActividad[0]['actividadPuntaje'] ?>"required>
				</div>
			</div>
			<?php  
			foreach ($listarPregun as $key => $value) {
				print '<h3>Preguntas </h3>';
				print '
				<input type="hidden" name="idPregunta['.$value['idPreguntas'].']" value="'.$value['idPreguntas'].'">
				<input type="text" name="EditarPregunta['.$value['idPreguntas'].']" class="form-control mt-3" value="'.$value['descripcionPregunta'].'" required>
				';

				$idPregunta = $value['idPreguntas'];
				$consultarRes = $listarRes->consultarRespuestaControlador($idPregunta);
				print '<h3>Respuestas</h13';
				foreach ($consultarRes as $key => $value) {
					print '
					<br>
					<input type="hidden" name="idRespuestas['.$value['idRespuestas'].']" value="'.$value['idRespuestas'].'">
					<input type="text" class="form-control mt-1" name="editarRes['.$value['idRespuestas'].']" value="'.$value['descripcionRespuesta'].'" required>
					';
					$verd = '';
					$fal = '';
					if ($value['resultado'] == 'verdadero') {
						$verd = 'checked';
					}else{
						$fal = 'checked';
					}
					if ($value['resultado']) {
						print '<input class="form-check-input" name="respuesta['.$value['idRespuestas'].']" type="radio" id="flexSwitchCheckChecked" value="verdadero"'; print $verd; print'> <h6>verdadero</h6>';
						print '<input class="form-check-input" name="respuesta['.$value['idRespuestas'].']" type="radio" id="flexSwitchCheckChecked" value="falso"'; print $fal; print'> <h6>falso</h6>'; 
					}
					$corre = '';
					$inco = '';
					if ($value['resultadoMultiple'] == 'Correcto') {
						$corre = 'checked';
					}else{
						$inco = 'checked';
					}
					if ($value['resultadoMultiple']) {
						print '<input class="form-check-input" name="mul['.$value['idRespuestas'].']" type="radio" id="flexSwitchCheckChecked" value="Correcto"'; print $corre; print'> <h6>Correcto</h6>';
						print '<input class="form-check-input" name="mul['.$value['idRespuestas'].']" type="radio" id="flexSwitchCheckChecked" value="Incorrecto"'; print $inco; print'> <h6>Incorrecto</h6>'; 
					}
				}

			}
			?>
			<button type="submit" name="actvidad" class="btn btn-primary mt-2">Actualizar</button>
		</form>
	</div>
</div>