<?php


include('../../model/config.php');

 $pdf = $_GET['pdf'];

 $sentencia = $pdo->prepare("DELETE FROM certificados WHERE pdf=:pdf ");

$sentencia->bindParam('pdf', $pdf);
$sentencia->execute();

// Redirigir de vuelta a la página de usuarios después de eliminar
header('Location: '.$URL.'/views/Admin/personas');
exit();
?>