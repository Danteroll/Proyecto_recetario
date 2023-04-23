<?php

include 'config.php';
session_start();
$user_id = $_SESSION['usuario'];

if(isset($_POST['update_profile'])){
   $old_pass = mysqli_real_escape_string($conexion, hash('sha512', $_POST['old_pass']));
   $new_pass = mysqli_real_escape_string($conexion, hash('sha512', $_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conexion, hash('sha512', $_POST['confirm_pass']));

   if(!empty($new_pass) || !empty($confirm_pass)){
      if($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         $fetch = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id = '$user_id' AND contrasena = '$old_pass'") or die('query failed');
         if(mysqli_num_rows($fetch) == 1){
            mysqli_query($conexion, "UPDATE usuarios SET contrasena = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
            $message[] = 'password updated successfully!';
         }else{
            $message[] = 'old password not matched!';
         }
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
         <input type="textbox" name="old_pass" value="<?php echo $fetch['contrasena']; ?>">
            <span>old password :</span>
            <input type="password" name="old_password" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_password" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_password" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>
