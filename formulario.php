<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: index.php");
    }
    if(isset($_GET['logout'])){
        session_destroy();
        header("Location: formulario.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    <link rel="stylesheet" href="formulario.css">
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="correo" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" oninvalid="mostrarAlerta2(this.validity.patternMismatch ? 'correo electrónico' : 'longitud')" required>
                    <input type="password" placeholder="Contraseña" name="contrasena" pattern="^(?!.*\s{2})[A-Za-z0-9]+(\s?[A-Za-z0-9]+)?$" oninvalid="mostrarAlerta(this.validity.patternMismatch ? 'caracteres' : 'longitud')" required>
                    <a href="reset-pass/forgot_password.html">¿Olvidaste tu contraseña?</a>
                    <button>Entrar</button>
                </form>

                <!--Register-->
                <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo" pattern="^(?!.*\s{2})[A-Za-z0-9]+(\s?[A-Za-z0-9]+)?$" oninvalid="mostrarAlerta1(this.validity.patternMismatch ? 'caracteres' : 'longitud')" required>
                    <input type="text" placeholder="Correo Electronico" name="correo" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" oninvalid="mostrarAlerta2(this.validity.patternMismatch ? 'correo electrónico' : 'longitud')" required>
                    <input type="text" placeholder="Usuario" name="usuario" pattern="^(?!.*\s{2})[A-Za-z0-9]+(\s?[A-Za-z0-9]+)?$" oninvalid="mostrarAlerta1(this.validity.patternMismatch ? 'caracteres' : 'longitud')" required>
                    <input type="password" placeholder="Contraseña" name="contrasena" pattern="^(?!.*\s{2})[A-Za-z0-9]+(\s?[A-Za-z0-9]+)?$" oninvalid="mostrarAlerta(this.validity.patternMismatch ? 'caracteres' : 'longitud')" required>
                    <button>Regístrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="formulario.js"></script>
</body>
</html>