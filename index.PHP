<?php  
//controlador
require_once 'controllers/controlador.php';
require_once 'controllers/usuariosControlador.php';
require_once 'controllers/actividadesControlador.php';
require_once 'controllers/perfilControlador.php';
require_once 'controllers/gradoControlador.php';
require_once 'controllers/notasControlador.php';
require_once 'controllers/preguntaControlador.php';
require_once 'controllers/respuestaControlador.php';
require_once 'controllers/resultadosActividadControlador.php';
require_once 'controllers/loginControlador.php';


//modelos
require_once 'models/UsuariosModel.php';
require_once 'models/ActividadModel.php';
require_once 'models/gradoModelo.php';
require_once 'models/enlacespaginasmodelo.php';
require_once 'models/notasModel.php';
require_once 'models/preguntaModelo.php';
require_once 'models/respuestaModelo.php';
require_once 'models/resultadosActividadModelo.php';
require_once 'models/loginModelo.php';

$controlador = new Controlador();
$controlador->cargarTemplate();

?>