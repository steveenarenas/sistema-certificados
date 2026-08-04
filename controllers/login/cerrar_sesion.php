<?php

include ('../../model/config.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Destruir todas las sesiones.
$_SESSION = [];
session_destroy();

// Redirigir a la página de inicio.
header('Location: '.$URL.'/views/Admin/index.php');
exit();
?>


