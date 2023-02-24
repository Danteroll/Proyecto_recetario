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
<h1>Registro Exitoso</h1>
	<p>Gracias por registrarte en nuestro sitio web. A continuación, se muestran los datos que proporcionaste:</p>
	<ul>
		<li>Nombre: <?php echo $_POST["nombre"]; ?></li>
		<li>Correo electrónico: <?php echo $_POST["correo"]; ?></li>
		<?php if(isset($_POST['red_social'])) : ?>
			<li>Registrado con: <?php echo ucfirst($_POST["red_social"]); ?></li>
		<?php endif; ?>
	</ul>
</body>
</html>