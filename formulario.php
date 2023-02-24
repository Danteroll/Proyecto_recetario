<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K' RIQUISIMO</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form action="registro.php" method="post">
		<label>Nombre:</label><br>
		<input type="text" name="nombre"><br>
		<label>Correo electrónico:</label><br>
		<input type="email" name="correo"><br>
		<label>Contraseña:</label><br>
		<input type="password" name="contraseña"><br>
		<p>O regístrate con una red social:</p>
		<button type="submit" name="red_social" value="facebook">Facebook</button>
		<button type="submit" name="red_social" value="google">Google</button>
		<input type="submit" name="registrarse" value="Registrarse">
	</form>
</body>
</html>