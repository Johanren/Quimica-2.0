<h1>REGISTRAR USUARIOS</h1>


<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
</style>

<form method="post" class="form-signin" onsubmit="return validarRegistro();">
	<div class="row">
		<div class="col">
			<h6>Nombre Usuario</h6>
			<input type="text" class="form-control" name="nombreRegistro" id="nombreRegistro" placeholder="Ingrese Maximo 15 caracteres" maxlength="15" required="">
		</div>

	</div>

	<div class="row">
		<div class="col">
			<h6>E-mail</h6>
			<input type="email" class="form-control" name="emailRegistro" id="emailRegistro" placeholder="Ingrese un Email Valido" required="">
		</div>

		<div class="col">
			<h6>Tipo Documento</h6>

			<select name="t_dRegistro" id="t_dRegistro" class="form-control">
				<option>selecione documento</option>
				<option value="T.I">T.I</option>
				<option value="C.C">C.C</option>
			</select>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<h6>Numero Documento</h6>
			<input type="text" class="form-control" name="n_dRegistro" id="n_dRegistro" placeholder="Ingrese Maximo 15" maxlength="15" required="">
		</div>

		<div class="col">
			<h6>Fecha Nacimiento</h6>
			<input type="date" class="form-control" name="fnRegistro" id="fnRegistro" placeholder="fechaNacimiento" required="">
		</div>
	</div>

	<div class="row">
		<div class="col">
			<h6>Telefono</h6>
			<input type="text" class="form-control" name="claveRegistro" id="claveRegistro" placeholder="Maximo 10 caracteres" maxlength="10" required="">
		</div>

		<div class="col">
			<h6>Contraseña</h6>
			<input type="password" class="form-control" name="numeroRegistro" id="numeroRegistro" placeholder="Maximo 8 dijitos" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
		</div>
	</div>
	
		<button type="submit" name="enviars" class="btn btn-primary mb-2">Registrar</button>
	

</form>
<div class="row">
	<div class="col">
		<a href="ingresar" class="boton"><button class="btn btn-primary mb-2"> Iniciar Sesion</button></a>
	</div>
</div>



<?php


$ctrl = new UsuarioControlador();
$ctrl->registrarUsuariosControlador();


?>