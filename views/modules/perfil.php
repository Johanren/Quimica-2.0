<h1 class="h3 mb-3 font-weight-normal">Perfil Usuario</h1><br><br>
<?php
$ctrl = new PerfilControlador();
$ctrl->actualizarPerfilControlador();
$login = $ctrl->perfilUsuario();
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'chang') {
        print '<p class="alert alert-success" role="alert">Usuario Actualizado Correctamente <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></p>';
    }
}
?>
<form method="post">
    <input type="hidden" name="id" value="<?php print $login['idPersonas']?>">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <form method="post" class="form-signin">
                <div class="row">
                    <div class="col">
                        <h6>Nombre Usuario</h6>
                        <input type="text" class="form-control" name="nombreEditar" value="<?php print $login['nombre']?>" placeholder="Nombre Usuario" required="">
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <h6>Apellido</h6>           <input type="text" class="form-control" name="apellidoEditar" value="<?php print $login['apellido']?>" placeholder="Telefono" required="">
                    </div>

                    <div class="col">
                        <h6>Tipo Documento</h6>
                        <input type="text" class="form-control" name="Editar" value="<?php print $login['documentoIdentidad']?>" placeholder="Tipo_Documento" required="">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h6>Numero Documento</h6>
                        <input type="text" class="form-control" name="n_dEditar" value="<?php print $login['numeroDocumento']?>" placeholder="Numero" required="">
                    </div>

                    <div class="col">
                        <h6>Fecha Nacimiento</h6>
                        <input type="date" class="form-control" name="fNEditar" value="<?php print $login['fechaNacimiento']?>" placeholder="fechaNacimiento" required="">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h6>E-mail</h6>
                        <input type="email" class="form-control" name="emailEditar" value="<?php print $login['email']?>" placeholder="E-mail" required="">
                    </div>

                    <div class="col">
                        <h6>Contraseña</h6>
                        <input type="password" class="form-control" name="claveEditar" id="password" value="<?php print $login['password']?>" placeholder="Contraseña" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup='check();'>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6>Confirmar Contraseña</h6>
                        <input type="password" class="form-control" id="confirm_password"  name="claveEditarCon" value="<?php print $login['password']?>" placeholder="Contraseña" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onkeyup='check();'>
                        <span id='message'></span>
                    </div>
                </div>
                <br><br>
                <input type="submit" class="btn btn-primary mb-2" class="form-control" name="enviar" value="Actualizar">
            </form>
        </div>

    </div>  
</form>