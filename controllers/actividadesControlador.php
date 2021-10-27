<?php
class ActividadesControlador
{
    public function registrarActividadesControlador()
    {
        if (isset($_POST['regActividad'])) {
            $actividadModelo = new ActividadModel();
            $preguntaControlador = new PreguntaControlador();
            $respuestaControlador = new RespuestaControlador();            
            
            $contPreguntas = 0;
            $datosActividad = array('actividad' => $_POST['actividad'], 
                'nivelMinimo' => $_POST['nivelMinimo'],
                'puntaje' => $_POST['puntaje'],
                'idUsuario' => $_SESSION['idPersonas']);

            $resultado = $actividadModelo->registrarActividadModelo($datosActividad);
            if ($resultado) {
                $ultimoIdActividad = $actividadModelo->obtenerIdInsertActividadModelo();
                $idActividad = $ultimoIdActividad[0]['id'];   
            }

            if (isset($_POST['pregunta'])) {
                foreach ($_POST['pregunta'] as $keyPregunta => $valuePregunta) {
                    $datosPregunta = array('idActividad'=>$idActividad,
                        'descripcionPregunta' => $valuePregunta);

                    $resultadoPreguntas = $preguntaControlador->insertarPreguntaContralador($datosPregunta);

                    if ($resultadoPreguntas) {
                        $respuesta = $preguntaControlador->obtenerUltimoIdPreguntaControlador();
                        $contPreguntas++;
                        $idPregunta = $respuesta[0]['id'];
                    }

                    $numRespuestas = count($_POST['respuesta'][$keyPregunta]);

                    $controlMultiple = false;
                    
                    foreach ($_POST['respuesta'][$keyPregunta] as $keyRespuesta => $valueRespuesta) {

                        if ($numRespuestas == 1) {
                            $resultadoMultiple = 'Correcto';
                        }
                        elseif ($numRespuestas > 1) {
                            if ($controlMultiple == false) {
                                $resultadoMultiple = 'Correcto';
                                $controlMultiple = true;
                            }
                            else{
                                $resultadoMultiple = 'Incorrecto';
                            }
                        }
                        $datosRespuesta = array('idPregunta' => $idPregunta,
                            'descripcionRespuesta' => $valueRespuesta,
                            'resultado' => $valueRespuesta,
                            'resultadoMultiple' => $resultadoMultiple);

                        $respuestaControlador->insertarRespuestaControlador($datosRespuesta);
                    }
                }
            }
        }
    }

    

    

    

    //Listar actividades

    public function listarActividad()
    {
        $listarA = new ActividadModel();
        $respuesta = $listarA-> listarActividadModel('preguntas');
        #var_dump($respuesta);
        return $respuesta;
    }
    //Actualizar Actividades

    public function ConsultarActividad()
    {
        $id = $_SESSION['idPersonas'];
        $consultar = new ActividadModel();
        $respuesta = $consultar-> ConsultarActividadesModelo($id);
        return $respuesta;
    }

    function ConsultarActividadPregunta(){
        $id = $_GET['id'];
        $acti = new ActividadModel();
        $respuesta = $acti -> ConsultarActividadModel($id);
        return $respuesta;
    }

    function consultarIdActividadControlador(){
        if (isset($_POST['conPreguntas'])) {
            $ActividadModelo = new ActividadModel();
            $datosActividad = $ActividadModelo->cargarActividadesModelo($_POST['idActividad']);
            return $datosActividad;
        }
    }
    public function ActualizarActividades(){
        if (isset($_POST['actvidad'])) {
            $datos = array('idActividad' => $_POST['idActividad'],
                'nombre' => $_POST['editarActividad'],
                'nivel' => $_POST['editarNivel'],
                'puntaje' => $_POST['editarPuntaje']);
            $actualizar = new ActividadModel();
            $respuesta = $actualizar-> ActualizarActividadesModelo($datos);
        }
    }

    public function EliminarActividad() {
        if (isset($_GET['delAct'])) {
            $dato = $_GET['delAct'];
            $eliminar = new ActividadModel();
            $respuesta = $eliminar-> eliminarAcctividadModel($dato);

            if ($respuesta == "success") {
                header('location:del');
            }
        }
        
    }

    function BuscarActividad(){
        if(isset($_POST['buscar'])){
            switch($_POST['camBuscar']){
                case 'tituloActividad':
                $campo = "tituloActividad";
                break;
                default:
                $campo = "";
                break;
            }
            if(isset($_POST['campbuscar'])){
                $dato = $_POST['campbuscar'];
            }else{
                $dato = "";
            }
            $áctividad = new ActividadModel();
            $buscar = $áctividad-> BuscarActividadModelo($campo, $dato);
            return $buscar;
        }
    }
}
