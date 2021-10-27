<?php  

$listarAc = new ResultadosActividadControlador();
$listar = $listarAc->listarEstudiantesResultadoControlador();
$listarActividades = $listarAc->BuscarFechaActividad();

if ($listar) {
	

	?>
	<h1>Actividades Realizadas</h1>
	<div class="row mt-5">
		<div class="col-4">
			<form action="" method="post" class="formulario">
				<div class="form-group mb-2">
					<input class="form-control" type="date" name="campbuscar" require>
				</div>
				<button type="submit" class="btn btn-primary mb-2" name="buscar" value="buscar">Buscar</button>
				<div class="row">
					<div class="col-4">
						<input type="radio" name="camBuscar" value="fechaPresentacion" required> fecha
					</div>
				</div>
			</form>
			<br>
			<?php  
			if ($listarActividades) {
				?>
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<th>Estudiante</th>
							<th>Falso y verdaderp</th>
							<th>Multiple</th>
						</tr>
					</thead>
					<tbody>
						<?php  
						foreach ($listarActividades as $key => $value) {
							print '
							<tr>
							<td>'.$value['nombre'].'</td>
							<td>'.$value['resultado'].'</td>
							<td>'.$value['resultadoMultiple'].'</td>
							</tr>	
							';	
						}
						?>
					</tbody>
				</table>
				<?php  
			}else{
				print '<p class="alert alert-success mt-5" role="alert">Actividad no Encontrada<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></p>';
			}
			?>
		</div>
		<div class="col-8">
			<table class="table table-striped table-dark">
				<thead>
					<tr>
						<th>Id</th>
						<th>fecha Presentacion</th>
						<th>Estudiante</th>
						<th>Falso y verdaderp</th>
						<th>Multiple</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					foreach ($listar as $key => $value) {
						print '
						<tr>
						<td>'.$value['idResultadoActividad'].'</td>
						<td>'.$value['fechaPresentacion'].'</td>
						<td>'.$value['nombre'].'</td>
						<td>'.$value['resultado'].'</td>
						<td>'.$value['resultadoMultiple'].'</td>
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
	print '<p class="alert alert-success" role="alert">Actividades No Realizadas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button></p>';
}
?>