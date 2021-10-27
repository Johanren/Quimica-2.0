
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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="row">
  <div class="container bootstrap snippet">

    <!--/col-3-->
    <div class="col-md" class="col-lg" class="col-xl" class="col-sm">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Ingresar</a></li>
        <li><a data-toggle="tab" href="#messages">Registrar</a></li>
      </ul>


      <div class="tab-content">
        <div class="tab-pane active" id="home">
          <hr>
          <div class="row">
            <div class="col">
              <form name="Ingresar" method="post" class="form-signin" class="formulario">
                <br>
                <h1 class="h3 mb-3 font-weight-normal">INGRESAR</h1>
                <br>
                <h6>Correo Electronico</h6>
                <input type="email" class="form-control" name="emailIngreso" placeholder="Email" required="">

                <h6>Contraseña</h6>
                <input type="password" class="form-control" name="claveIngreso" placeholder="Contraseña" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                <!--<input type="submit" name="enviar" class="form-control" value="Enviar">-->
                <button type="submit" name="enviarAcceso" class="btn btn-primary mb-2">Iniciar Sesion</button>
                <div class="row">
                <!--<div class="col">
                  <a href="registrar">Registrar</a>
                </div>-->

                <div class="col">
                  <a href="index.php?action=olvidoContraseña">¿Olvido Contraseña?</a>
                </div>
              </div>

            </form>  
          </div>
        </div>
        <?php

        $ingresarLogin = new LoginControlador();
        $ingresarLogin->ingresarLoginControlador();

        if (isset($_GET['action'])) {
          if ($_GET['action'] == 'falla') {
            print "<p class='alert alert-success' role='alert'>Correo o contraseña Incorrectas <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button></p>";
          }
        }
        ?>
        <hr>

      </div>
      <!--/tab-pane-->
      <div class="tab-pane" id="messages">
        <hr>
        <h1 class="h3 mb-3 font-weight-normal">REGISTRAR USUARIOS</h1>
        <form method="post" class="form-signin" onsubmit="return validarRegistro();" class="formulario">
          <div class="row">
            <div class="col">
              <h6>Nombres</h6>
              <input type="text" class="form-control" name="nombreRegistro" id="nombreRegistro" placeholder="Maximo 10" maxlength="25" required="" pattern="[A-Za-z]{10}">
            </div>
            <div class="col">
              <h6>Apellidos</h6>
              <input type="text" class="form-control" name="apellidoRegistro" id="claveRegistro" placeholder="Maximo 10" maxlength="25" required="" pattern="[A-Za-z]{10}">
            </div>
          </div>

          <div class="row">
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


          </div>
          <div class="row">
            <div class="col">
              <h6>Fecha Nacimiento</h6>
              <input type="date" class="form-control" name="fnRegistro" id="fnRegistro" placeholder="fechaNacimiento" required="">
            </div>
          </div>
          <div class="row">
            
            <div class="col">
              <h6>E-mail</h6>
              <input type="email" class="form-control" name="emailRegistro" id="emailRegistro" placeholder="Ingrese un Email Valido" required="">
            </div>
            <div class="col">
              <h6>Contraseña</h6>
              <input type="password" class="form-control" name="numeroRegistro" id="numeroRegistro" placeholder="Maximo 8 dijitos" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            </div>
          </div>

          <button type="submit" name="enviars" class="btn btn-primary mb-2">Registrar</button>


        </form>
        <hr>
        <?php
        $registrarUsuario = new UsuarioControlador();
        $registrarUsuario->registrarUsuariosControlador();
        ?>
      </div>
      <!--/tab-pane-->


    </div>
    <!--/tab-pane-->
  </div>
  <!--/tab-content-->

</div>
<!--/col-9-->
</div>