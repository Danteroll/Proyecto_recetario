<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K' RIQUISIMO</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
<?php
// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Obtener los datos del formulario
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	// Validar los datos del formulario
	if (empty($nombre) || empty($email) || empty($password) || empty($confirm_password)) {
		// Mostrar un mensaje de error si faltan campos por completar
		echo "Por favor complete todos los campos del formulario.";
	} elseif ($password != $confirm_password) {
		// Mostrar un mensaje de error si la confirmación de contraseña no coincide con la contraseña original
		echo "La confirmación de contraseña no coincide con la contraseña original.";
	} else {
		// Guardar los datos del usuario en la base de datos o en un archivo de texto
		// ...

		// Redirigir al usuario a una página de confirmación o a la página de inicio de sesión
		header("Location: confirmacion.php");
		exit();
	}
}
?>
</body>
</html>