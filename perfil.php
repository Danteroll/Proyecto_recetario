<?php 

include("sitiowebqrk/administrador/config/bd.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM recetas");
$sentenciaSQL->execute();
$listarecetas=$sentenciaSQL->fetchALL(PDO::FETCH_ASSOC);
?>

<?php foreach($listarecetas as $libro) { ?>
    <div class="col-md3">
        <div class="card">
<img class="card-img-top" src="./sitiowebqrk/img1/<?php echo $libro['imagen'];?>" alt="">
<div class="card-body">
    <h4 class="card-title"><?php echo $libro['nombre'];?></h4>
    <a name="" id="" href="#" class="btn btn-primary" role="button">Ver mas</a>
    </div>
</div>
<?php } ?>