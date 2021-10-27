<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="views/css/main.css">
	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="icon" href="views/img/fondo3.jpg">
	<link href="views/css/carousel.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="views/css/jquery-ui.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


	<title>Quimica</title>
	

</head>
<body>
    <style>
    .contenedor_carga{
        background-color: #f3f3f3;
        position: fixed;
        width: 100vw;
        height: 100vh;
        z-index: 9999;
        transition: all 1.5s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loader,
    .loader:before,
    .loader:after{
        border-radius: 50%;
        width: 2.5em;
        height: 2.5em;
        animation: loader 1.5s infinite ease-in-out;
    }
    .loader{
        color:  #4685fa;
        font-size: 13px;
        position: relative;
        animation-delay: -0.16s;
    }
    .loader:before,
    .loader:after{
        content: '';
        position: absolute;
        top: 0;
    }
    .loader:before{
        left: -3.5em;
        animation-delay: -0.32s;
    }
    .loader:after{
        left: 3.5em;
    }

    @keyframes loader{
        0%,
        80%
        100%{
            box-shadow: 0 2.5em 0 -1.3em;
        }
        40%{
            box-shadow: 0 2.5em 0 0;
        }

    }
</style>
	<!--<div id="contenedor_carga">
        <div id="carga">
            
        </div>
    </div>-->
    <div class="contenedor_carga">
        <div class="loader">
            
        </div>
    </div>

    <?php
    $ctrl = new LoginControlador();
    $ctrl->ingresarLoginControlador();



    ?>
    <header>
        <?php include("views/modules/navegacion.php"); ?>
    </header>
    

    <section>
       <?php
       $mvc = new Controlador();
       $mvc->enlacesPaginasControlador();
       ?>
   </section>
   <?php
   if (isset($_GET['action'])) {
    if ($_GET['action'] == 'salir') {
        print '
        <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
        <form name="Ingresar" method="post" class="form-signin" class="formulario">
        <br>
        <h1 class="h3 mb-3 font-weight-normal">INGRESAR</h1>
        <br>
        <h6>Correo Electronico</h6>
        <input type="email" class="form-control" name="emailIngreso" placeholder="Email" required="">

        <h6>Contraseña</h6>
        <input type="password" class="form-control" name="claveIngreso" placeholder="Contraseña" maxlength="8" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
        <!--<input type="submit" name="enviar" class="form-control" value="Enviar">-->
        <button type="submit" name="enviarAcces" class="btn btn-primary mb-2">Iniciar Sesion</button>
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
        ';
        $Login = new LoginControlador();
        $Login->ingresarLoginSalirControlador();
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="views/js/bootstrap.min.js"></script>
<script src="views/js/function.js"></script>
<script src="views/js/jquery-3.6.0.min.js"></script>

<script src="views/js/jquery.js"></script>
<script src="views/js/jquery-ui.js"></script>
<script src="views/js/ajax.js"></script>
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<script src="views/js/validacion.js"></script>
<script>
   window.onload = function(){
      var contenedor = document.getElementById('contenedor_carga');

      contenedor.style.visibility = 'hidden';
      contenedor.style.opacity = '0';
  }
</script>
<script>
    window.addEventListener('load', () => {
        const contenedor_carga = document.querySelector('.contenedor_carga')
        contenedor_carga.style.opacity = 0
        contenedor_carga.style.visibility = 'hidden'
    })
</script>
<script>
    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Contraseñas correctas';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Contraseñas incorrectas';
    }
}
</script>
</body>

</html>