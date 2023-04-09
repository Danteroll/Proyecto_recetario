<?php include("../template/cabecera.php");?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/bd.php");

switch ($accion){
    
    case "Agregar":
        $sentenciaSQL= $conexion->prepare("INSERT INTO `recetas` (nombre,imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);

        $fecha = new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"]; 

        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"../../img1/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$txtImagen);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        break;

    case "Modificar":

        $sentenciaSQL=$conexion->prepare("UPDATE recetas SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        if($txtImagen!=""){

            $fecha = new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            $sentenciaSQL=$conexion->prepare("SELECT imagen FROM recetas WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $recetas=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if( isset($recetas["imagen"]) &&($recetas["imagen"]!="imagen.jpg") ){

                if(file_exists("../../img/".$recetas["imagen"])){

                    unlink("../../img/".$recetas["imagen"]);
                }
            }

            $sentenciaSQL=$conexion->prepare("UPDATE recetas SET nombre=:nombre WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen',$txtImagen);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
        }
        header("Location:productos.php");
        //echo "Presionado boton modificar";
            break;

    case "Cancelar":
       header("Location:productos.php");
            break;

    case "Seleccionar":

        $sentenciaSQL=$conexion->prepare("SELECT * FROM recetas WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $recetas=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$recetas['nombre'];
        $txtImagen=$recetas['imagen'];

        //echo "Presionado boton seleccionar";
            break;

    case "Borrar":
       
        $sentenciaSQL=$conexion->prepare("SELECT imagen FROM recetas WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $recetas=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if( isset($recetas["imagen"]) &&($recetas["imagen"]!="imagen.jpg") ){

            if(file_exists("../../img1/".$recetas["imagen"])){

                unlink("../../img1/".$recetas["imagen"]);
            }
        }
       
        $sentenciaSQL= $conexion->prepare("DELETE FROM recetas WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header("Location:productos.php");
            break;
    }
    $sentenciaSQL= $conexion->prepare("SELECT * FROM recetas");
    $sentenciaSQL->execute();
    $listarecetas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Datos de las recetas
    </div>
    <div class="card-body">
    <form method="POST" enctype="multipart/form-data">

        <div class = "form-group">
        <label for="txtID">ID</label>
        <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
        </div>

        <div class = "form-group">
        <label for="txtNombre">Nombre de la receta</label>
        <input type="text" class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
        </div>

        <div class = "form-group">
        <label for="txtNombre">Imagen</label>
</br>

        <?php if($txtImagen!=""){?>

            <img src="../../img/<?php echo $txtImagen?>" width="50" alt="" srcset="">

        <?php } ?>

        <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre">
        </div>

        <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion" <?php echo ($accion=="Seleecionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleecionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleecionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
        </div>

        </form>
        </div>
    </div>
</div>

<div class="col-md-7">
   <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listarecetas as $recetas) { ?>
        <tr>
            <td><?php echo $recetas['id'];?></td>
            <td><?php echo $recetas['nombre'];?></td>
            <td>
                <img src="../../img/<?php echo $recetas['imagen'];?>" width="50" alt="" srcset="">
            </td>

            <td>

            <form method="post">

            <input type="hidden" name="txtID" id="txtID" value="<?php echo $recetas['id'];?>"/>
            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
            <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
            </form>

            </td>

        </tr>
    <?php }?>
    </tbody>
   </table>   
</div>


<?php include("../template/pie.php");?>