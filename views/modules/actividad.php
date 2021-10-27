<?php  
$actividad = new ActividadesControlador();
$actividad->registrarActividadesControlador();

?>
<div class="container-fluid">
    <div class="row">

        <!--- BOTONES PARA LAS PREGUNTAS --->
        <div class="col-4">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <button id="boton1" class="btn btn-primary mb-2">Preguntas Multiple Respuesta</button>
                    </div>
                </div>
                <div class="col-6">
                    <button id="boton" class="btn btn-primary mb-2">Preguntas Falso o Verdadero</button>
                </div>
            </div>

        </div>

        <!----- FORMULARIO DE ACTIVIDADES ---->

        <div class="col-8">
            <h2 class="text-center">Actividades</h2>
            <form method="post" class="form">
                <div class="row">
                    <div class="col-4 form-group">
                        <label class="label-form">Nombre de la Actividad</label>
                        <input type="text" class="form-control" name="actividad" placeholder="Nombre de la Actividad"> 
                    </div>
                    <div class="col-4">
                        <label class="label-form">Nivel Minimo</label>
                        <input type="number" class="form-control" name="nivelMinimo" placeholder="Nivel Minimo de la Actividad">
                    </div>
                    <div class="col-4">
                        <label class="label-form">Puntaje</label>
                        <input type="number" class="form-control" name="puntaje" placeholder="Puntaje de la Actividad">
                    </div>                    
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col" id="primero">
                                <!-----DESDE AQUI VAN PREGUNTAS FALSO VERDADERO-------->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                 <button type="submit" name="regActividad" class="btn btn-primary mb-2">Resgistrar Actividad</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
