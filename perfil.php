<?php include("./sitiowebqrk/template/cabecera.php"); ?>
<?php 
include("sitiowebqrk/administrador/config/bd.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM recetas");
$sentenciaSQL->execute();
$listarecetas=$sentenciaSQL->fetchALL(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="./sitiowebqrk/css/bootstrap.min.css" />
<link rel="stylesheet" href="perfil.css">
<div class="frames">
<div class="frame_foto">
    <h1>hola</h1>

<div class="frame_contenido">
<h1>hola</h1>
</div>
</div>
</div>
<?php include("./sitiowebqrk/template/pie.php");?>