/*validar Registro*/

function validarRegistro(){
    var nombre = document.querySelector("#nombreRegistro").value;
    var email = document.querySelector("#emailRegistro").value;
    var t_d = document.querySelector("#t_dRegistro").value;
    var n_d = document.querySelector("#n_dRegistro").value;
    var clave = document.querySelector("#numeroRegistro").value;

    var expresion = /^[a-zA-A0-9]*$/;
    //Valirdar Usuario
        if(nombre!=''){
            if(nombre.length > 15){
                document.querySelector("label[for='nombreRegistro']").innerHTML +=
                "<br>Por favor escriba solo 15 caracteres";
                return false;
            }
            if(!expresion.test(nombre)){
                document.querySelector("label[for='nombreRegistro']").innerHTML +=
                "<br>Por favor escriba solo caracteres";
                return false;
            }
        }
    //validar contraseña
        /*if(numero !=''){
            var passval =/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})$/;
            if(clave.length < 6){
                document.querySelector("label[for='numeroRegistro']").innerHTML +=
                "<br>Por favor Digite Mas de 6 caracteres en su contraseña";
                return false;
            }
            if(!passval.test(numero)){
                document.querySelector("label[for='numeroRegistro']").innerHTML +=
                "<br>Por favor Ingrese Minimo 6 Caracteres,Incluya Numeros y una letra";
                return false;
            }
        }*/
    return false;
}