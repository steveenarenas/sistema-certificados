<?php
include('../../model/config.php');

// Obtén el ID del usuario a eliminar
$id_usuario = $_GET['id_usuario'];

// Preparar la sentencia de eliminación
$sentencia = $pdo->prepare("DELETE FROM cert_usuarios WHERE id_usuario=:id_usuario ");
$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->execute();

// Redirigir de vuelta a la página de usuarios después de eliminar
header('Location: '.$URL.'/views/Admin/usuarios');
exit();
?>
