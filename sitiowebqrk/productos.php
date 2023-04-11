<?php include("template/cabecera.php");?>

<?php 
include("administrador/config/bd.php");
    $sentenciaSQL= $conexion->prepare("SELECT * FROM recetas");
    $sentenciaSQL->execute();
    $listarecetas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<?php foreach($listarecetas as $recetas){ ?>

<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $recetas['imagen']?>" alt="">
    <div class="card-body">
        <h4 class="card-title"><?php echo $recetas['nombre']?></h4>
    <a name="" id="" class="btn btn-dark" href="#" role="button">Ver mas</a>
    </div>
</div>
</div>
<?php } ?>
<?php include("template/pie.php");?>


