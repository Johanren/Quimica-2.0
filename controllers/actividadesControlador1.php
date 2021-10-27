<?php
class ActividadesControlador
{
    public function registrarActividades()
    {
        if (isset($_POST['regActividad'])) {
            $datos = array('actividad' => $_POST['actividad'],
                'nivel' => $_POST['nivelMinimo']);

           $idActividad = ActividadModel::registrarActividadesModelo($datos);

            $preguntaControlador = new PreguntaControlador();
            $preguntaControlador->insertarPreguntaContralador($idActividad);

     /*       if ($respuesta == 'success') {

                header('location:oks');
                //print "Actividad registrada";
            } else {
                header('location:fala');

                //print "Actividad no resgitrada";
            }*/
        }
    }

    

    

    

    //Listar actividades

    public function listarActividad()
    {
        $respuesta = ActividadModel::listarActividadModel('preguntas');
        #var_dump($respuesta);
        foreach ($respuesta as $row => $valor) {
            print
            "
            <tr>
            <td>{$valor['idActividades']}</td>
            <td>{$valor['tituloActividad']}</td>
            <td>{$valor['nivelMinimo']}</td>
            <td><a href='index.php?action=RealizarActividad&id={$valor['idActividades']}'><button class='btn btn-primary mb-2'><img src='https://image.flaticon.com/icons/png/128/1160/1160758.png' width='20'></button></a></td>
            </a>
            </td>
            </tr>
            ";
        }
    }
    public function ListarActividadControlador(){
        $respuesta = ActividadModel::listarActividadModel('actividad');
        #var_dump($respuesta);
        return $respuesta;
    }
    public function listarPreguntaControlador(){
        $respuesta = ActividadModel::listarPreguntaModel('pregunta');
        return $respuesta;
    }
    //Actualizar Actividades

    public function ConsultarActividad()
    {
        $id = $_GET['id'];
        $respuesta = ActividadModel::ConsultarActividadesModelo($id);
        return $respuesta;
    }

 
    public function ActualizarActividades(){
        if (isset($_POST['ActividadEditar'])) {
            $datos = array('idActividad' => $_POST['id'],
                'nombre' => $_POST['ActividadEditar'],
                'estado_pregunta' => $_POST['estado']);

            $respuesta = ActividadModel::ActualizarActividadesModelo($datos, 'actividad');
            if ($respuesta == "success") {
                header('location:oksss');
            }
        }
    }

    public function EliminarActividad() {
        if (isset($_GET['del'])) {
            $dato = $_GET['del'];
            $respuesta = ActividadModel::eliminarAcctividadModel($dato, 'actividad');

            if ($respuesta == "success") {
                header('location:del');
                //header('location:usuario');
            }
        }
    }
}
