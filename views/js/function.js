$(document).ready(function() {

    var contPregMensaje = 1;
    var contPreg = 0;

    $("#boton").click(function() {
        $("#primero").append('<div class="card"><div class="card-header"><h5 class="text-center">Pregunta '+contPregMensaje+' Falso o Verdadero</h5></div><div class="card-body"><div class="form-group"><input type="text" name="pregunta[]" class="form-control"><select name="respuesta['+contPreg+'][]" class="form-control"><option value="Verdadero">Verdadero</option><option value="Falso">Falso</option></select></div></div></div><br>');
        contPregMensaje++;
        contPreg++;
    });

    $("#boton1").click(function() {
        $("#primero").append('<div class="card"><div class="card-header"><h5 class="text-center">Pregunta '+contPregMensaje+' Con Miltiples Respuestas</h5></div><div class="card-body"><div class="group-form"><label class="label-form">Enunciado de la Pregunta</label><input type="text" name="pregunta[]" class="form-control" placeholder="pregunta"></div><div class="group-form"><label>Respuestas Multiples</label><input type="text" name="respuesta['+contPreg+'][]" class="form-control" placeholder="respuesta"><input type="text" name="respuesta['+contPreg+'][]" class="form-control" placeholder="respuesta"><input type="text" name="respuesta['+contPreg+'][]" class="form-control" placeholder="respuesta"><input type="text" name="respuesta['+contPreg+'][]" class="form-control" placeholder="respuesta"></div></div></div><br>');
        contPregMensaje++;
        contPreg++;
    });

});
