<?php


include('../../model/config.php');

$nombres = $_POST['nombres'];
$user = $_POST['user'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];
$id_usuario = $_POST['id_usuario'];
$rol = $_POST['rol'];


if($password_user ==""){
   if($password_user == $password_repeat){
      $password_user = password_hash($password_user, PASSWORD_DEFAULT);
      $sentencia = $pdo->prepare("UPDATE cert_usuarios 
      SET nombres=:nombres,
      user=:user,
      id_rol=:id_rol,
      fyh_actualizacion=:fyh_actualizacion
      WHERE id_usuario = :id_usuario ");
  
  $sentencia->bindParam('nombres', $nombres);
  $sentencia->bindParam('user', $user);
  $sentencia->bindParam('id_rol', $rol);
  $sentencia->bindParam('fyh_actualizacion', $fechaHora);
  $sentencia->bindParam('id_usuario', $id_usuario);
  $sentencia->execute();
  session_start();
     $_SESSION['mensaje'] = "Se actualizo el usuario de la manera correcta";
     $_SESSION['icono'] = "success";
     header('Location: '.$URL.'/views/Admin/usuarios');
     
  }else{
     // echo "error las contraseñas no son iguales";
     session_start();
     $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
     $_SESSION['icono'] = "error";
     header('location: '.$URL.'/views/Admin/usuarios/update.php?id='.$id_usuario);
  }

}else{
   if($password_user == $password_repeat){
      $password_user = password_hash($password_user, PASSWORD_DEFAULT);
      $sentencia = $pdo->prepare("UPDATE cert_usuarios 
      SET nombres=:nombres,
      user=:user,
      id_rol=:id_rol,
      password_user=:password_user,
      fyh_actualizacion=:fyh_actualizacion
      WHERE id_usuario = :id_usuario ");
  
  $sentencia->bindParam('nombres', $nombres);
  $sentencia->bindParam('user', $user);
  $sentencia->bindParam('id_rol', $rol);
  $sentencia->bindParam('password_user', $password_user);
  $sentencia->bindParam('fyh_actualizacion', $fechaHora);
  $sentencia->bindParam('id_usuario', $id_usuario);
  $sentencia->execute();
  session_start();
     $_SESSION['mensaje'] = "Se actualizo el usuario de la manera correcta";
     $_SESSION['icono'] = "success";
     header('Location: '.$URL.'/views/Admin/usuarios');
     
  }else{
     // echo "error las contraseñas no son iguales";
     session_start();
     $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
     $_SESSION['icono'] = "error";
     header('location: '.$URL.'/views/Admin/usuarios/update.php?id='.$id_usuario);
  }
}





?>