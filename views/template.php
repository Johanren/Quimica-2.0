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
    <link rel="stylesheet" type="text/css" href="views/css/loader.css">


    <title>Quimica</title>

    <style>
    #nav a {  
        color: #4CAF50;  
        font-size: 20px;  
        margin-top: 22px;  
        font-weight: 600;  
    }
    #nav1 a {  
        color: #4CAF50;  
        font-size: 20px;  
        margin-top: 22px;  
        font-weight: 600;  
    }  
    a:hover, a:visited, a:link, a:active {  
        text-decoration: none;  
    }  
</style>
</head>
<body>
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
<script src="views/js/loader.js"></script>
<script src="views/js/validacion.js"></script>

<script>  
    $(document).ready (function () {  
        $('#data').after ('<div id="nav" align="center"></div>');  
        var rowsShown = 5;  
        var rowsTotal = $('#data tbody tr').length;  
        var numPages = rowsTotal/rowsShown;  
        for (i = 0;i < numPages;i++) {  
            var pageNum = i + 1;  
            $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
        }  
        $('#data tbody tr').hide();  
        $('#data tbody tr').slice (0, rowsShown).show();  
        $('#nav a:first').addClass('active');  
        $('#nav a').bind('click', function() {  
            $('#nav a').removeClass('active');  
            $(this).addClass('active');  
            var currPage = $(this).attr('rel');  
            var startItem = currPage * rowsShown;  
            var endItem = startItem + rowsShown;  
            $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
            css('display','table-row').animate({opacity:1}, 300);  
        });  
    });  
</script>  
<script>  
    $(document).ready (function () {  
        $('#data1').after ('<div id="nav1" align="center"></div>');  
        var rowsShown = 5;  
        var rowsTotal = $('#data1 tbody tr').length;  
        var numPages = rowsTotal/rowsShown;  
        for (i = 0;i < numPages;i++) {  
            var pageNum = i + 1;  
            $('#nav1').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
        }  
        $('#data1 tbody tr').hide();  
        $('#data1 tbody tr').slice (0, rowsShown).show();  
        $('#nav1 a:first').addClass('active');  
        $('#nav1 a').bind('click', function() {  
            $('#nav a').removeClass('active');  
            $(this).addClass('active');  
            var currPage = $(this).attr('rel');  
            var startItem = currPage * rowsShown;  
            var endItem = startItem + rowsShown;  
            $('#data1 tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
            css('display','table-row').animate({opacity:1}, 300);  
        });  
    });  
</script>  
</body>

</html>