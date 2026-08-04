<?php


include('../../model/config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];

      $sentencia = $pdo->prepare("UPDATE cert_roles 
      SET rol=:rol,
      fyh_actualizacion=:fyh_actualizacion
      WHERE id_rol = :id_rol ");
  
  $sentencia->bindParam('rol', $rol);
  $sentencia->bindParam('fyh_actualizacion', $fechaHora);
  $sentencia->bindParam('id_rol', $id_rol);
  if($sentencia->execute()){
    session_start();
     $_SESSION['mensaje'] = "Se actualizo el rol de la manera correcta";
     $_SESSION['icono'] = "success";
     header('Location: '.$URL.'/views/Admin/roles');
     
  }else{
    // echo "error las contraseñas no son iguales";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    header('location: '.$URL.'/views/Admin/roles/update.php?id='.$id_rol);
 
  }
  

     

?>