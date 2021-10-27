<?php  
	//session_start();
	if (isset($_SESSION['validar'])) {
		$msg = "El usuario: {$_SESSION['email']} ha cerrado la sesion...";
		//exit();
		//header('location:ingresar');

		
	}
	else{
		header('location:ingresar');

	}

	session_destroy();
?>

<h3 class="msg"> <?php print $msg; ?> </h3>