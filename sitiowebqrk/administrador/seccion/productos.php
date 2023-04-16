<?php
session_start();

if(!isset($_SESSION['usuario'])){
    echo '
    <script>
        alert("Para agregar una receta debes iniciar sesión");
        window.location = "../../../formulario.php";
    </script>
    ';
    session_destroy();
    die();
}
?>

<?php include("../template/cabecera.php");?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
include("../config/bd.php");

switch ($accion){
    
    case "Agregar":
        $sentenciaSQL= $conexion->prepare("INSERT INTO recetas (nombre,imagen, id_usuario) VALUES (:nombre,:imagen, :id_usuario);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        
        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
        
        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen, "../../img1/" .$nombreArchivo);
        }
        
        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->bindParam(':id_usuario', $_SESSION['usuario']);
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
            $nombreArchivo = ($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
            
            move_uploaded_file($tmpImagen, "../../img1/" .$nombreArchivo);
            
            $sentenciaSQL=$conexion->prepare("SELECT imagen FROM recetas WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $recetas=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if(isset($recetas["imagen"]) &&($recetas["imagen"]!="imagen.jpg") ){
                
                if(file_exists("../../img1/".$recetas["imagen"])){
                    
                    unlink("../../img1/".$recetas["imagen"]);
                }
            }

            $sentenciaSQL=$conexion->prepare("UPDATE recetas SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
        }
        
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
            
            if(isset($recetas["imagen"]) &&($recetas["imagen"]!="imagen.jpg") ){
                
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
    $id_usuario = $_SESSION['usuario'];
    $sentenciaSQL = $conexion->prepare("SELECT * FROM recetas WHERE id_usuario = :id_usuario");
    $sentenciaSQL->bindParam(':id_usuario', $id_usuario);
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
        <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
        </div>

        <div class = "form-group">
        <label for="txtNombre">Nombre de la receta</label>
        <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
        </div>

        <div class = "form-group">
        <label for="txtNombre">Imagen:</label>

        <?php echo $txtImagen; ?>
</br>
        <?php if($txtImagen!=""){?>

            <img class="img-thumbnail rounded" src="../../img1/<?php echo $txtImagen?>" width="100" alt="" srcset="">

        <?php } ?>

        <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre">
        </div>

        <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion"<?php echo($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="accion"<?php echo($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
            <button type="submit" name="accion"<?php echo($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-info">Cancelar</button>
        </div>

        </form>
        </div>
    </div>
</div>
<div class="col-md-7">
<?php if(!empty($listarecetas)) { ?>
    <table class="table table-bordered">
        <!-- Encabezado de la tabla -->
        <thead>
            <h2>Tus recetas:</h2>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Ciclo para mostrar cada receta -->
            <?php foreach($listarecetas as $receta) { ?>
                <tr>
                    <td><?php echo $receta['id']; ?></td>
                    <td><?php echo $receta['nombre']; ?></td>
                    <td><img class="img-thumbnail rounded" src="../../img1/<?php echo $receta['imagen']; ?>" width="100" alt="" srcset=""></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $receta['id']; ?>"/>
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <h1>Agrega una nueva receta.</h1>
<?php } ?>
</tbody>
</div>



<?php include("../template/pie.php");?>
