
<script>
	$('#myModal').on('shown.bs.modal', function() {
		$('#myInput').trigger('focus')
	})
</script>

<?php
if (isset($_GET['action'])) {
	if ($_GET['action'] ==  "change") {
		print '<p class="alert alert-success" role="alert">Usuario Actualizado Correctamente <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></p>';
	}
}
if (isset($_GET['action'])) {
	if ($_GET['action'] ==  "rolokss") {
		print '<p class="alert alert-success" role="alert">Rol actualizado<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></p>';
	}

	if ($_GET['action'] ==  "oksRolLogin") {
		print '<p class="alert alert-success" role="alert">Rol Eliminado<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></p>';
	}
}
?>
<?php
if ($_SESSION['Roles'] != "Administrador") {
	echo '<script>window.location="inicio"</script>';
	if ($_SESSION['Roles'] == "Administrador") {
		header('location:index.php?action=usuario');
	}


	if ($_SESSION['Roles'] == "Docente") {
		header('location:index.php?action=inicio');
	}

	if ($_SESSION['Roles'] == "Estudiante") {
		header('location:index.php?action=inicio');
	}
}

?>
<?php  
$controladorRol = new LoginControlador();
$controladorRol->eliminarUsuarioRolControlador();

$ctrl = new UsuarioControlador();
$ctrl->eliminarUsuarioControlador();
$respuesta = $ctrl->listarUsuarioControlador();

?>
<br>
<h2 class="msg" class="h3 mb-3 font-weight-normal">Usuario: <?php print $_SESSION['email']; ?></h2>
<div class="col-sm" class="col-md" class="col-lg" class="col-xl">

	<h1 class="h3 mb-3 font-weight-normal">Buscar Usuario</h1>
	<br><br>
	<div class="row">
		<div class="col-2">
			
		</div>
		<div class="col-2">
			
			
		</div>
		<div class="col">
			<br>
			<form action="" method="post" class="form-inline" class="formulario">
				<div class="form-group mx-sm-3 mb-2">
					<input class="form-control me-2" type="text" name="campbuscar" require>
				</div>
				<button type="submit" class="btn btn-primary mb-2" name="buscar" value="buscar">Buscar</button>
				<div class="form-group mx-sm-3 mb-2">
					<div class="form-check form-check-inline form-group mx-sm-3 mb-2">
						<input class="form-check-input" type="checkbox" name="camBuscar" id="inlineCheckbox1" value="nombre" required="">
						<label class="form-check-label" for="inlineCheckbox1">Nombre</label>
					</div>
					<div class="form-check form-check-inline form-group mx-sm-3 mb-2">
						<input class="form-check-input" type="checkbox" name="camBuscar" id="inlineCheckbox2" value="numeroDocumento">
						<label class="form-check-label" for="inlineCheckbox2">Documento</label>
					</div>
				</div>
				
				<?php
				$ctrl = new UsuarioControlador();
				$resultado = $ctrl->BuscarUsuarios();

				?>
			</form>
		</div>
	</div>

	<br>
	<?php

	if (isset($resultado)) {


		?>

	</div>
	<div class="container" style="margin-top: 10px;padding: 5px">
		<table id="data1" align="center" class="table table-striped table-dark" border="1" style="width:100%">
			<thead>
				<th scope="col">Nombre</th>
				<th scope="col">Apellido</th>
				<th scope="col">email</th>
				<th scope="col">tipoDocumento</th>
				<th scope="col">numeroDocumento</th>
				<th scope="col">fechaNacimeinto</th>
				<th scope="col">Rol</th>
				<th scope="col">Editar</th>
				<!--<th scope="col">Eliminar</th>-->
			</thead>
			<tbody>
				<?php
				foreach ($resultado as $key => $value) {
					print '
					<tr>
					<td>' . $value['nombre'] . '</td>
					<td>' . $value['apellido'] . '</td>
					<td>' . $value['email'] . '</td>
					<td>' . $value['documentoIdentidad'] . '</td>
					<td>' . $value['numeroDocumento'] . '</td>
					<td>' . $value['fechaNacimiento'] . '</td>
					<td>'.$value['Roles'].'</td>
					<td><a href="index.php?action=editarRol&id=' . $value['idPersonas'] . '"><button class="btn btn-primary mb-2"><img src="https://image.flaticon.com/icons/png/128/1160/1160758.png" width="20"></button>
					</a>
					</td>
					<!--<td><a href="index.php?action=usuario&delrol=' . $value['idPersonas'] . '"><button class="btn btn-primary mb-2"><img src="https://image.flaticon.com/icons/png/128/3496/3496416.png" width="20"></button>
					</a>
					</td>-->
					</tr>
					';
				}

				?>
			</tbody>
		</table>
		<?php
	}
	?>
	<br><br>
</div>
<div class="container" style="margin-top: 10px;padding: 5px">

	<table border="1" align="center" id="data" class="table table-striped table-dark" style="width:100%">
		<thead>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Tipo-Documento</th>
			<th>Numero-Documento</th>
			<th>FechaNacimiento</th>
			<th>Editar</th>
			<!--<th>Eliminar</th>-->
		</thead>
		<tbody>

			<?php
			foreach ($respuesta as $row => $valor) {
				print "
				<tr>
				<td>{$valor['nombre']}</td>
				<td>{$valor['apellido']}</td>
				<td>{$valor['documentoIdentidad']}</td>
				<td>{$valor['numeroDocumento']}</td>
				<td>{$valor['fechaNacimiento']}</td>
				<td><a href='index.php?action=editar&id={$valor['idPersonas']}'><button class='btn btn-primary mb-2'><img src='https://image.flaticon.com/icons/png/128/1160/1160758.png' width='20'></button>
				</a>
				</td>
				<!--<td><a href='index.php?action=usuario&del={$valor['idPersonas']}'><button class='btn btn-primary mb-2'><img src='https://image.flaticon.com/icons/png/128/3496/3496416.png' width='20'></button>
				</a>
				</td>-->
				</tr>"
				;
			}
			?>
		</tbody>
		<tbody>

		</tbody>
	</table>
</div>
