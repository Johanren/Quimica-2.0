<?php  
$curso = new GradoControlador();
$cursoPer = $curso->listarEstudiantesControlador();
if ($cursoPer) {

	?>

	<h1><?php print $cursoPer[0]['nombreGrado'] ?></h1>
	<div class="row">
		<div class="col-3">
			<?php 
			$buscar = new GradoControlador();
			$listarEs = $buscar->BuscarPersonas();
			?>
			<form action="" method="post" class="formulario">
				<div class="form-group mb-2">
					<input class="form-control" type="date" name="campbuscar" require>
				</div>
				<button type="submit" class="btn btn-primary mb-2" name="buscar" value="buscar">Buscar</button>
				<div class="row">
					<div class="col-4">
						<input type="radio" name="camBuscar" value="fechaInscripcion" required> fecha
					</div>
				</div>
			</form>
		</div>
		<div class="col-8 ">

			<?php  
			if (isset($listarEs)) {
				?>
				<table class="table table-striped table-dark mt-5">
					<thead>
						<tr>
							<th>Documento</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Fecha Inscripcion</th>
							<th>Actividad</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($listarEs as $key => $value) {
							print '
							<tr>
							<td>'.$value['numeroDocumento'].'</td>
							<td>'.$value['nombre'].'</td>
							<td>'.$value['apellido'].'</td>
							<td>'.$value['fechaInscripcion'].'</td>
							<td><a href="index.php?action=acEstudiante&id='.$value['idPersonas'].'" title="">Ver actividades</a></td>
							</tr>	
							';
						}
						?>
					</tbody>
				</table>
				<hr><hr>
				<?php  
			}
			?>
			<table class="table table-striped table-dark mt-5">
				<thead>
					<tr>
						<th>Documento</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Fecha Inscripcion</th>
						<th>Actividad</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					foreach ($cursoPer as $key => $value) {
						print '
						<tr>
						<td>'.$value['numeroDocumento'].'</td>
						<td>'.$value['nombre'].'</td>
						<td>'.$value['apellido'].'</td>
						<td>'.$value['fechaInscripcion'].'</td>
						<td><a href="index.php?action=acEstudiante&id='.$value['idPersonas'].'" title="">Ver actividades</a></td>
						</tr>	
						';
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php  
}else{
	print '<p class="alert alert-success" role="alert">Estudiantes No Encontrados<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button></p>';
}
?>
