    <h1 class="h3 mb-3 font-weight-normal">Perfil Usuario</h1><br>
    <?php

    if (!$_SESSION['validar']) {
      echo('<script>window.location="ingresar"</script>');
  }

  $ctrl = new PerfilControlador();
//$ctrl->actualizarPerfilControlador();
  $login = $ctrl->perfilUsuario();
  $ctrl->actualizarFotoControlador();
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'chang') {
        print '<p class="alert alert-success" role="alert">Usuario Actualizado Correctamente <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></p>';
    }
}
?>
<form method="post" class="form-signin" enctype='multipart/form-data'>
    <input type="hidden" name="id" value="<?php print $login['idPersonas']?>">
    <div class="row">
            <div class="col-3">

            </div>
            <div class="col">
                <img src="<?php 

                if($login['foto perfil'] == null){
                    print "views/perfil/foto.png";
                    }else{
                        print $login['foto perfil'];
                    }

                ?>" width="160" class="rounded">
            </div>
        <input type="file" name="foto" class="form-control mt-5" multiple>
        <div class="row mt-5">
            <div class="col">
                <h6>Nombre Usuario</h6>
                <input type="text" class="form-control" name="nombreEditar" value="<?php print $login['nombre']?>" placeholder="Nombre Usuario" required="">
            </div>

        </div>

        <div class="row">
            <div class="col">
                <h6>Apellido</h6>           
                <input type="text" class="form-control" name="apellidoEditar" value="<?php print $login['apellido']?>" placeholder="Telefono" required="">
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
                <h6>Contrase??a</h6>
                <input type="password" class="form-control" name="claveEditar" id="password" value="<?php print $login['password']?>" placeholder="Contrase??a" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup='check();'>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6>Confirmar Contrase??a</h6>
                <input type="password" class="form-control" id="confirm_password"  name="claveEditarCon" value="<?php print $login['password']?>" placeholder="Contrase??a" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onkeyup='check();'>
                <span id='message'></span>
            </div>
        </div>
        <br><br><br><br>
        <input type="submit" class="btn btn-primary mb-5" name="enviar" value="Actualizar">

    </div>  
</form>