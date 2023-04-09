//Ejecutando funciones
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

//FUNCIONES
function mostrarAlerta(tipoError) {
    let mensaje;
    switch (tipoError) {
            case "longitud":
            mensaje = "La contraseña no debe tener más de 25 caracteres.";
            break;
            case "caracteres":
            mensaje = "La contraseña no debe contener caracteres especiales ni espacios en blanco consecutivos.";
            break;
            default:
                mensaje = "Por favor ingrese un valor válido.";
            }
            alert(mensaje);
            }

function mostrarAlerta1(tipoError) {
    let mensaje;
    switch (tipoError) {
            case "longitud":
            mensaje = "El texto no debe tener más de 25 caracteres.";
            break;
            case "caracteres":
            mensaje = "El texto no debe contener caracteres especiales ni espacios en blanco consecutivos.";
            break;
            default:
                mensaje = "Por favor ingrese un valor válido.";
            }
            alert(mensaje);
            }
            
function mostrarAlerta2(tipoError) {
    let mensaje;
    switch (tipoError) {
            case "correo electrónico":
            mensaje = "Por favor ingresa una dirección de correo valida y trate de no dejar ningun espacio en blanco.";
            break;
            case "longitud":
            mensaje = "Por favor ingrese un valor válido.";
            break;
            default:
            mensaje = "Por favor ingrese un valor válido.";
        }
        alert(mensaje);
        }
function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "10px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }else{
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
        }
}