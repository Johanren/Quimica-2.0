<?php 

$actividadControlador = new ActividadesControlador();
$preguntaControlador = new PreguntaControlador();


$datosActividades = $actividadControlador->ConsultarActividad();
$datosPregunta = $preguntaControlador->consultarPreguntasIdActividadControlador();

$eliminarRespuesta = new RespuestaControlador();
$consultar = $eliminarRespuesta->consultarRespuestaControlador1();

$eliminarResultadosActividad = new ResultadosActividadControlador();
$eliminarResultadosActividad->eliminarNotasControlador();
if (isset($_GET['action'])) {
	if ($_GET['action'] ==  "oksacac") {
		print '<p class="alert alert-success" role="alert">Actividad Actualizada<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></p>';
	}
	if ($_GET['action'] ==  "del") {
		print '<p class="alert alert-success" role="alert">Actividad Eliminada<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></p>';
	}
	
}
?>

<div class="row">
	<div class="col">
		<h1>CONSULTAR PREGUNTAS DE ACTIVIDADES</h1>
	</div>
</div>
<div class="row">	
	<div class="col">
		<form method="post">
			<label for="">Activades</label>
			<select name="idActividad" id="idActividad" class="form-control">
				<option value="0">Seleccione una Actividad</option>
				<?php 

				foreach ($datosActividades as $keyActivdad => $valueActividad) {
					print '<option value="'.$valueActividad['idActividades'].'">'.$valueActividad['tituloActividad'].'</option>';
				}

				?>

			</select>
			<input type="submit" class="btn btn-primary mt-2" name="conPreguntas" value="Consultar">
		</form>
	</div>
</div>
<div class="row">
	<div class="col">
		<h2 class="text-center">Preguntas de las actividades</h2>
	</div>
</div>

<?php 

if (isset($datosPregunta)): ?>
<div class="row">
	<div class="col">
		<table class="table">
			<thead>
				<th>Enunciado de las Preguntas</th>
				<th>Editar</th>
			</thead>
			<tbody>
				<?php 

				foreach ($datosPregunta as $keyPregunta => $valuePregunta) {
					print '<tr><td>'.$valuePregunta['descripcionPregunta'].'</td>
					<td><a href="index.php?action=upPregunta&id='.$valuePregunta['idActividades'].'"><button class="btn btn-primary mb-2"><img src="https://image.flaticon.com/icons/png/128/1160/1160758.png" width="20"></button></a></td>';
				}

				 ?>
			</tbody>
		</table>
	</div>
</div>	
<?php endif ?>

