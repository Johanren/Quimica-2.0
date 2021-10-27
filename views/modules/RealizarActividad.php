<?php

$actividadControl = new ActividadesControlador();
$preguntaControlador = new PreguntaControlador();
$respuestaControlador = new RespuestaControlador();
$resultadoActividadControlador = new ResultadosActividadControlador();

$resultadoActividadControlador->registrarResultadoActividadControlador();
$datosActividades = $actividadControl->ConsultarActividad();

$idActividad = $datosActividades[0]['idActividades'];

$datosPregunta = $preguntaControlador->cargarPreguntasControlador($idActividad);

$idPersona = $_SESSION['idPersonas'];
?>

<div class="row">

  <div class="col-2"></div>

  <div class="col-8">

    <div class="row">
      <div class="col">
        <!--  ////////DATOS DE LA ACTIVIDAD ///////////////////  -->
        <h4><?php print $datosActividades[0]['tituloActividad']?></h4>
        <h4>Puntaje Minimo: <?php print $datosActividades[0]['nivelMinimo']; ?></h4>
        <h4>Puntaje Maximo: <?php print $datosActividades[0]['actividadPuntaje']; ?></h4>
      </div>
    </div>


    <div class="row">
      <div class="col">
        <form method="post" class="form">
          <?php 
          $contadorPreguntas = 1;

          foreach ($datosPregunta as $keyPregunta => $valuePregunta) {
            print '<input type="hidden" name="idPregunta[]" value="'.$valuePregunta['idPreguntas'].'">';
            print '<h4>'.$valuePregunta['descripcionPregunta'].'</h4>';

            $controlMultiple = false;

            $datosRespuesta = $respuestaControlador->cargarRespuestasControlador($valuePregunta['idPreguntas']);

            foreach ($datosRespuesta as $keyRespuesta => $valueRespuesta) {
          /////RESPUESTAS FALSO O VERDADERO ////////////
              if(count($datosRespuesta) == 1){
                print '
                <div class="card">
                <div class="card-header">
                <h5 class="text-center">Pregunta '.$contadorPreguntas.' Falso o Verdadero</h5>
                <p>'.$valuePregunta['descripcionPregunta'].'</p>
                </div>
                <div class="card-body">
                <select name="respuesta'.$valuePregunta['idPreguntas'].'" class="form-control">';

                if ($valueRespuesta['resultado'] == 'verdadero') {
                  print '
                  <option value="'.$valueRespuesta['idRespuestas'].'">Verdadero</option>
                  <option value="Falso">Falso</option>';
                }
                else{
                  print '
                  <option value="verdadero">Verdadero</option>
                  <option value="'.$valueRespuesta['idRespuestas'].'">Falso</option>';
                }

                print '
                </select>
                </div>
                </div>';
              }
              else{
                if ($controlMultiple == false) {
                  print '
                  <div class="card">
                  <div class="card-header">
                  <h5 class="text-center">Pregunta '.$contadorPreguntas.' Con Miltiples Respuestas</h5>
                  <p>'.$valuePregunta['descripcionPregunta'].'</p>
                  </div>
                  <div class="card-body">';
                  $controlMultiple = true;
                }
                print '
                <label>'.$valueRespuesta['descripcionRespuesta'].'</label>
                <input type="radio" name="respuesta'.$valuePregunta['idPreguntas'].'" value="'.$valueRespuesta['idRespuestas'].'" ><br>';
              }

            }
            print '</div>
            </div>';

            $controlMultiple = false;
            $contadorPreguntas++;
          }

          ?>
          <div class="form-group">
            <button type="submit" name="regResultadoActividad" class="btn btn-primary mt-2" >Enviar Actividad</button>
          </div>
        </form>

        <?php 

        if (isset($_GET['action'])) {
          if ($_GET['action'] == 'ok1') {
            print "Actividad Registrada Correctamente";
          }
          elseif ($_GET['action'] == 'fa1') {
            print "Ocurrio un Error";
          }
        }

        ?>
      </div>
    </div>
  </div>

  <div class="col-2"></div>
</div>