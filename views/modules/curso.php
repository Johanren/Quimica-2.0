<?php  

$listarGra = new GradoControlador();
$listar = $listarGra->listarGrado();

?>
<div class="row">
	<div class="col-2"></div>
	<div class="col-4">
		<h1>Buscar Curso</h1>
		<form action="" method="post" class="formulario mt-5">
			<div class="form-group  mb-2">
				<input class="form-control me-2" type="text" name="campbuscar" require>
			</div>
			<button type="submit" class="btn btn-primary mb-2" name="buscar" value="buscar">Buscar</button>
			<div class="row">
				<div class="col">
					<input type="radio" name="camBuscar" value="nombreGrado" required> curso
				</div>
			</div>
			<?php
			$resultado = $listarGra->BuscarCursos();

			?>
		</form>
		<br>
		<?php  
		if (isset($resultado)) {
			?>
			<table class="table table-striped table-dark mt-5">
				<thead>
					<tr>
						<th>Curso</th>
						<th>Estudiantes</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					foreach ($resultado as $key => $value) {
						print '
						<tr>
						<td>'.$value['nombreGrado'].'</td>
						<td><a href="index.php?action=estudiantes&id='.$value['idGrado'].'&idPe='.$_SESSION['idPersonas'].'">Ver Estudiantes</a></td>
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
	</div>
	<div class="col-4">
		<h1>Cursos</h1>
		<table class="table table-striped table-dark mt-5">
			<thead>
				<tr>
					<th>Curso</th>
					<th>Estudiantes</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				foreach ($listar as $key => $value) {
					print '
					<tr>
					<td>'.$value['nombreGrado'].'</td>
					<td><a href="index.php?action=estudiantes&id='.$value['idGrado'].'&idPe='.$_SESSION['idPersonas'].'">Ver Estudiantes</a></td>
					</tr>	
					';	
				}
				?>
			</tbody>
		</table>		
	</div>
</div>
