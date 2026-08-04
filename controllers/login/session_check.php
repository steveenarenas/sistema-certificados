<?php
function checkSession() {
    if (!isset($_SESSION['sesion_email'])) {
        header('Location: ../../../login/login.php');
        exit();
    }
}
?>