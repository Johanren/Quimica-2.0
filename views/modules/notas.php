<?php  

$nota = new ResultadosActividadControlador();
$notas = $nota -> listarResultado();
?>
<h1>Entro a Notas</h1>
<br>
<div class="row">
	<div class="col-4">
		<form action="" method="post" class="formulario mt-5">
			<div class="form-group  mb-2">
				<input class="form-control me-2" type="date" name="campbuscar" require>
			</div>
			<button type="submit" class="btn btn-primary mb-2" name="buscar" value="buscar">Buscar</button>
			<div class="row">
				<div class="col">
					<input type="radio" name="camBuscar" value="fechaPresentacion" required> Presentacion
				</div>
			</div>
			<?php
			$resultado = $nota->BuscarFechaActividadPersonal();

			?>
		</form>

		<?php  
		if ($resultado) {

			
			?>
			<table class="table table-striped table-dark mt-5" border="1">
				<thead>
					<tr>
						<th>Estudiante</th>
						<th>Falso y verdadero</th>
						<th>Multiple</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					foreach ($resultado as $key => $value) {
						print '
						<tr>
						<td>'.$value['nombre'].'</td>
						<td>'.$value['resultado'].'</td>
						<td>'.$value['resultadoMultiple'].'</td>
						</tr>';
					}
					?>
				</tbody>
			</table>
			<?php  
		}else{
			print '<p class="alert alert-success" role="alert">Actividad no Encontrada<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></p>';
		}
		?>
	</div>
	<div class="col-8">
		<table class="table table-striped table-dark" border="1">
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
				foreach ($notas as $key => $value) {
					print '
					<tr>
					<td>'.$value['idResultadoActividad'].'</td>
					<td>'.$value['fechaPresentacion'].'</td>
					<td>'.$value['nombre'].'</td>
					<td>'.$value['resultado'].'</td>
					<td>'.$value['resultadoMultiple'].'</td>
					</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
