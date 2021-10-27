<?php  
//session_start();

if (!$_SESSION['validar']) {
	header('location:ingresar');

	exit();
}
?>
<?php 
$editar = new UsuarioControlador();
$personas = $editar->consultarUsuarioIdControlador();
$personas2 = $editar->consultarPersonaControlador();
$editar->actualizarUsuarioControlador();

$editarRol = new LoginControlador();
//$editarRol->actualizarRolControlador();
?>
<h1 class="h3 mb-3 font-weight-normal">ACTUALIZAR DATOS DEL USUARIO</h1>

<form method="post" class="form-signin" class="formulario">

	<input type="hidden" name="id" value="<?php print $personas['idPersonas']?>">
	<div class="row">
		<div class="col">
			<h6>Nombre </h6>
			<input type="text" class="form-control" name="nombreEditar" value="<?php print $personas['nombre'] ?>" placeholder="Nombre " required="">
		</div>

	</div>

	<div class="row">
		<div class="col">
			<h6>Apellido</h6>
			<input type="text" class="form-control" name="apellidoEditar" value="<?php print $personas['apellido']?>" placeholder="Apellido" required="">
		</div>

		<div class="col">
			<h6>Tipo Documento</h6>
			<input type="text" class="form-control" name="t_dEditar" value="<?php print $personas['documentoIdentidad']?>" placeholder="T.I" required="">
		</div>
	</div>

	<div class="row">
		<div class="col">
			<h6>Numero Documento</h6>
			<input type="text" class="form-control" name="n_dEditar" value="<?php print $personas['numeroDocumento']?>" placeholder="Numero" required="">
		</div>
	</div>

	<div class="row">
		<div class="col">
			<h6>Fecha Nacimiento</h6>
			<input type="date" class="form-control" name="fNEditar" value="<?php print $personas['fechaNacimiento']?>" placeholder="fechaNacimiento" required="">
		</div>
	</div>
	</div>
	<button type="submit" class="btn btn-primary mt-2" name="enviar">Actualizar</button>
	
</form>

