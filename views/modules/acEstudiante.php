<?php  

if (!$_SESSION['validar']) {
	print "<script>alert('No has iniciado sesion')</script>";
	echo('<script>window.location="ingresar"</script>');
}

$listarAc = new ResultadosActividadControlador();
$listar = $listarAc->listarEstudiantesResultadoControlador();
$listarActividades = $listarAc->BuscarFechaActividad();
$img = new PerfilControlador();
$img1 = $img->img();



?>
<?php  
if ($listar) {
	
	?>
	<div class="row">
		<div class="col-5"></div>
		<div class="col-4">
			<img src="<?php if($img1['foto perfil'] == null){
				print "views/perfil/foto.png";
				}else{
					print $img1['foto perfil'];
				} ?>" width="160" class="rounded">
			</div>
		</div>

		<h1 class="mt-5">Actividades De <?php print $listar[0]['nombre']?></h1>
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
				
			</div>
			<div class="col-8">
				<?php  
				if ($listarActividades) {
					?>
					<table class="table table-striped table-dark" id="data">
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
					<br>
					<hr>
					<?php  
				}else{
					print '<p class="alert alert-success mt-5" role="alert">Actividad no Encontrada<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></p>
					<hr>';
				}
				?>
				<table class="table table-striped table-dark" id="data1">
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