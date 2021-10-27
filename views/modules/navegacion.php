<?php

session_start();
//print $_SESSION['id'];
?>

<?php
//print $_SESSION['rol'];


if (isset($_SESSION['validar'])) {

	if ($_SESSION['Roles'] == "Administrador") {
		print 

		'
		<nav class="navbar navbar-light bg-light fixed-top">
		<div class="container-fluid">
		<a class="navbar-brand" href="inicio"><img src="https://image.flaticon.com/icons/png/128/69/69524.png" width="30"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
		<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Quimica</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
		<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="usuario">Usuario</a>
		</li>
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="perfil"><img src="https://image.flaticon.com/icons/png/128/3135/3135715.png" width="30"></a>
		</li>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		Actividades
		</a>
		<ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
		<a class="dropdown-item" href="actividad">RegistrarActividades</a>
		<a class="dropdown-item" href="actividadVista">Actividades</a>
		<li>
		<hr class="dropdown-divider">
		</li>
		<li><a class="dropdown-item" href="conPreguntas">Ver Preguntas</a></li>
		</ul>
		</li>

		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		Cursos
		</a>
		<ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
		<a class="dropdown-item" href="personasGrado">Grado</a>
		<a class="dropdown-item" href="curso">Cursos</a>
		</ul>
		</li>
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="notas">Notas</a>
		</li>
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="salir">Salir</a>
		</li>
		</ul>
		</div>
		</div>
		</div>
		</nav>';
	} elseif ($_SESSION['Roles'] == "Docente") {
		print 
		'<nav class="navbar navbar-light bg-light fixed-top">
		<div class="container-fluid">
		<a class="navbar-brand" href="inicio"><img src="https://image.flaticon.com/icons/png/128/69/69524.png" width="30"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
		<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Quimica</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
		<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="perfil"><img src="https://image.flaticon.com/icons/png/128/3135/3135715.png" width="30"></a>
		</li>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		Actividades
		</a>
		<ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
		<a class="dropdown-item" href="actividad">RegistrarActividades</a>
		<a class="dropdown-item" href="actividadVista">Actividades</a>
		<li>
		<hr class="dropdown-divider">
		</li>
		<li><a class="dropdown-item" href="conPreguntas">Ver Preguntas</a></li>
		</ul>
		</li>

		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		Cursos
		</a>
		<ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
		<a class="dropdown-item" href="personasGrado">Grado</a>
		<a class="dropdown-item" href="curso">Cursos</a>
		</ul>
		</li>
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="notas">Notas</a>
		</li>
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="salir">Salir</a>
		</li>
		</ul>
		</div>
		</div>
		</div>
		</nav>';
	} elseif ($_SESSION['Roles'] == "Estudiante") {
		print 
		'<nav class="navbar navbar-light bg-light fixed-top">
		<div class="container-fluid">
		<a class="navbar-brand" href="inicio"><img src="https://image.flaticon.com/icons/png/128/69/69524.png" width="30"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
		<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Quimica</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
		<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="perfil"><img src="https://image.flaticon.com/icons/png/128/3135/3135715.png" width="30"></a>
		</li>					<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="actividadVista">Actividades</a>
		</li>
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="notas">Notas</a>
		</li>
		<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="salir">Salir</a>
		</li>
		</ul>
		</div>
		</div>
		</div>
		</nav>';
	}
}


?>
