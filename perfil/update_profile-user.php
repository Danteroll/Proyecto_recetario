<?php

include 'config.php';
session_start();
$user_id = $_SESSION['usuario'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conexion, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conexion, $_POST['update_email']);

   $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$update_email' ");

   if(mysqli_num_rows($verificar_correo) > 0){
       echo '
           <script>
               alert("Este correo ya está registrado, intenta con otro diferente");
               window.location = "update_profile.php";
           </script>
       ';
       exit();
   }

   $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$update_name' ");

   if(mysqli_num_rows($verificar_usuario) > 0){
       echo '
           <script>
               alert("Este usuario ya está registrado, intenta con otro diferente");
               window.location = "update_profile.php";
           </script>
       ';
       exit();
   }

   mysqli_query($conexion, "UPDATE usuarios SET usuario = '$update_name', correo = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = hash('sha512', $_POST['old_pass']);
   $update_pass = mysqli_real_escape_string($conexion, hash('sha512', $_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conexion, hash('sha512', $_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conexion, hash('sha512', $_POST['confirm_pass']));

   if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
      if (empty($old_pass)) {
        $message[] = 'old password is required!';
      } elseif ($update_pass != $old_pass) {
        $message[] = 'old password not matched!';
      } elseif ($new_pass != $confirm_pass) {
        $message[] = 'confirm password not matched!';
      } else {
        mysqli_query($conexion, "UPDATE usuarios SET contrasena = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
        $message[] = 'password updated successfully!';
      }
    }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conexion, "UPDATE usuarios SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../formulario.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['usuario']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['correo']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

   
</div>
</body>
</html>