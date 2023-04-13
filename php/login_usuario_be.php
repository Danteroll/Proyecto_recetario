<?php

session_start();

include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' 
and contrasena='$contrasena' ");

if(mysqli_num_rows($validar_login) > 0 ){
    // Obtener el ID del usuario a partir del correo electrónico
    $consulta = "SELECT id FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_assoc($resultado);

    // Almacenar el ID del usuario en una variable de sesión
    $_SESSION['usuario'] = $fila['id'];

    header("location: ../index.php");
    exit();
}else{
    echo '
    <script>
        alert("Usuario no existe, por favor verifique los datos introducidos");
        window.location = "../formulario.php";
    </script>
    ';
    exit();
}


?>