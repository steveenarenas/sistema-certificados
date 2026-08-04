<?php


include('../../model/config.php');

$rol = $_POST['rol'];

      $sentencia = $pdo->prepare("INSERT INTO cert_roles 
      (rol, fyh_creacion, fyh_actualizacion) 
VALUES (:rol, :fyh_creacion, :fyh_actualizacion)");

$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);

if($sentencia->execute()){
    session_start();
     $_SESSION['mensaje'] = "Se registro el rol de la manera correcta";
     $_SESSION['icono'] = "success";
     header('Location: '.$URL.'/views/Admin/roles');
}else{
    // echo "error las contraseñas no son iguales";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/views/Admin/roles/create.php');
}


?>