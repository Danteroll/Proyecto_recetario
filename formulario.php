<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K' RIQUISIMO</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="formulario.css">
	<script type="text/javascript" src="validacion.js"></script>
</head>
<body>
<section id="contacto">
<form action="registro.php" method="post" id="registroForm">
			<label for="nombre">Nombre:</label>
			<input type="text" id="nombre" name="nombre" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>

			<label for="password">Contraseña:</label>
			<input type="password" id="password" name="password" required>

			<label for="confirm_password">Confirmar Contraseña:</label>
			<input type="password" id="confirm_password" name="confirm_password" required>

			<input type="submit" value="Registrarse">

			<p>¿Ya tienes una cuenta? <a href="#">Iniciar sesión</a></p>
		</form>
</section>
</body>
</html>