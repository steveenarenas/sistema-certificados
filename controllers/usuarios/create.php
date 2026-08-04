<?php
include('../../model/config.php');

$nombres = $_POST['nombres'];
$user = $_POST['user'];
$rol = $_POST['rol'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

if($password_user == $password_repeat){
      $password_user = password_hash($password_user, PASSWORD_DEFAULT);
      $sentencia = $pdo->prepare("INSERT INTO cert_usuarios 
      (nombres, user, id_rol, password_user, fyh_creacion, fyh_actualizacion) 
VALUES (:nombres, :user, :id_rol, :password_user, :fyh_creacion, :fyh_actualizacion)");

$sentencia->bindParam('nombres', $nombres);
$sentencia->bindParam('user', $user);
$sentencia->bindParam('id_rol', $rol);
$sentencia->bindParam('password_user', $password_user);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->execute();
session_start();
     $_SESSION['mensaje'] = "Se registro al usuario de la manera correcta";
     $_SESSION['icono'] = "success";
     header('Location: '.$URL.'/views/Admin/usuarios');
}else{
     session_start();
     $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
     $_SESSION['icono'] = "error";
     header('Location: '.$URL.'/views/Admin/usuarios/create.php');
}


?>