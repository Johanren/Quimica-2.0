<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okss') {
        print '<p class="alert alert-success" role="alert">Restaurante Actualizado Correctamente <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></p>';
    }
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'oksss') {
        print '<p class="alert alert-success" role="alert">Actividad Actualizada <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></p>';
    }
}
$ctrl = new ActividadesControlador();
$listar = $ctrl->listarActividad();
?>
<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="row">
    <div class="col-5">
        <form action="" method="post" class="formulario">
            <div class="form-group mb-2">
                <input class="form-control" type="text" name="campbuscar" require>
            </div>
            <button type="submit" class="btn btn-primary mb-2" name="buscar" value="buscar">Buscar</button>
            <div class="row">
                <div class="col-4">
                    <input type="radio" name="camBuscar" value="tituloActividad" required> actividad
                </div>
            </div>
        </form>
        <?php  
        $buscar = $ctrl->BuscarActividad();

        if ($buscar) {


            ?>
            <table border="1" class="table table-striped table-dark mt-5">
                <thead>
                    <th>Actividad</th>
                    <th>Nivel Minimo</th>
                    <th>Realizar Actividad</th>
                </thead>
                <?php
                foreach ($buscar as $row => $valor) {
                    print
                    "
                    <tr>
                    <td>{$valor['tituloActividad']}</td>
                    <td>{$valor['nivelMinimo']}</td>
                    <td><a href='index.php?action=RealizarActividad&id={$valor['idActividades']}'><button class='btn btn-primary mb-2'><img src='https://image.flaticon.com/icons/png/128/1160/1160758.png' width='20'></button></a></td>
                    </a>
                    </td>
                    </tr>
                    ";
                }
                ?>
            </table>
            <?php  
        }else{
            print '<p class="alert alert-success mt-5" role="alert">Actividad no Encontrada<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></p>';
        }
        ?>
    </div>
    <div class="col-7">
        <table border="1" class="table table-striped table-dark">
            <thead>
                <th>id</th>
                <th>Actividad</th>
                <th>Nivel Minimo</th>
                <th>Realizar Actividad</th>
            </thead>
            <?php
            foreach ($listar as $row => $valor) {
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
            ?>
        </table>
    </div>
</div>

<!--<br>
<table border="1" class="tbl">
    <thead>
        <th>id</th>
        <th>Preguntas</th>
        <th>Editar</th>
    </thead>
    <?php
    /*$ctrl = new ActividadesControlador();
    $ctrl->listarPregunta();*/
    ?>
</table>
<br>
<table border="1" class="tbl">
    <thead>
        <th>id</th>
        <th>Respuestas</th>
        <th>Editar</th>
    </thead>
    <?php
    /*$ctrl = new ActividadesControlador();
    $ctrl->listarRespuesta();*/
    ?>
</table>-->
<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actividades</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                <?php
                    #$ctrl = new ActividadesControlador();
                    #$ctrl->ConsultarActividad();
                    #$ctrl->ActualizarActividades();
                ?>
                </form>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>-->