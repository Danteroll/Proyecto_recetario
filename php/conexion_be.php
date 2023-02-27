<?php
//Aqui en el primer "" va el servidor en el segundo "" va el usuario que la mayoria viene como root, en el tercero es la contraseña pero tambien la mayoria no tienen contraseña asi que se deja solos los parentesis, en el ultimo va el nombre de la base de datos
$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

/*
if($conexion){
    echo  'Conectado exitosamente a la Base de Datos';
}else{
    echo 'no se ha podido conectar a la base de datos';
}
*/


?>