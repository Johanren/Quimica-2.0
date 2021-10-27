<?php
 
$ctrl = new UsuarioControlador();
$ctrl1 = $ctrl->listarRolesControlador();
$ctrl2 = $ctrl->listarPersonasControlador();
$ctrl->registrarPersonasRolesControlador();
?>
<form method="post">
	<label>Usuario</label>
	<select class="form-control" name="personas">
		<option >Seleccione un usuario</option>
		<?php  
		foreach ($ctrl2 as $key => $value) {
			print '<option value="'.$value[0].'">'.$value[4].' '.$value[1].' '.$value[2].'</option>}
			option';
		}
		?>
	</select>
	<label>Rol</label>
	<select class="form-control" name="rol">
		<option >Seleccione un rol</option>
		<?php  
		foreach ($ctrl1 as $key => $value) {
			print '<option value="'.$value[0].'">'.$value[1].'</option>}
			option';
		}
		?>
	</select>
	<br>
	<button type="submit" class="btn btn-primary mb-2">Asignar Rol</button>
	<?php  
	$rol = new UsuarioControlador();
	$rol->registrarPersonasRolesControlador();

	?>
</form>