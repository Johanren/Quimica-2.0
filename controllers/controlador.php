<?php  

class Controlador{
	
	//metodo que carga la plantilla en el index
	///////////////////////////////////////////

	function cargarTemplate(){
		
		include 'views/template.php';
		
	}


	//metodo que permite gestionar los enlaces del sitio
	///////////////////////////////////////////////////

	public function enlacesPaginasControlador(){
		if (isset($_GET['action'])) {
			$enlace = $_GET['action'];
		}else{
			if (isset($_SESSION['Roles'])) {
				$enlace = "inicio";
			}else{
				$enlace = "ingresar";
			}
			
		}
		//print $enlace;
		$pagina = new EnlacesPaginasModelo();
 		$respuesta = $pagina->enlacesPaginas($enlace);
		include ($respuesta);
	}

	
}
?>