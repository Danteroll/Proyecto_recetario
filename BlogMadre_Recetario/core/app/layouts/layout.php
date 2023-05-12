<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?=Html::title('Q´ Riquisimo');?>
    <?=Html::link('res/bootstrap/css/bootstrap.min.css'); ?>
    <?=Html::link('res/font-awesome/css/fontawesome-all.min.css'); ?>
    <?=Html::script('res/js/jquery.min.js'); ?>
  </head>

  <body>
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/Proyecto_recetario/#inicio"><b>Q' RIQUISIMO</b></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/Proyecto_recetario/#inicio">Inicio</a></li>
        <li><a href="./?view=blog">Ver recetas</a></li>
        <li><a href="/Proyecto_recetario/BlogMadre_Recetario/admin/index.php?view=posts&opt=all">Admin</a></li>
      </ul>


    </div>
  </div>
</nav>


<?php 
  View::load("index");
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<br>
<hr>
</div>
</div>
</div>
<?= Html::script('res/bootstrap/js/bootstrap.min.js'); ?>
  </body>
</html>
