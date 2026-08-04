<?php

if(isset($_SESSION['sesion_email'])){
  // echo "si existe sesion de ".$_SESSION['sesion_email'];
  $email_sesion = $_SESSION['sesion_email'];
  $sql = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.user as user, us.id_rol as id_rol, rol.rol as rol 
  FROM cert_usuarios as us INNER JOIN cert_roles as rol ON us.id_rol = rol.id_rol WHERE user = '$email_sesion'";
  $query = $pdo->prepare($sql);
  $query->execute();
  $usuarios = $query->fetchALL(fetch_style: PDO::FETCH_ASSOC);
  foreach ($usuarios as $usuario){
    $id_usuario_sesion = $usuario['id_usuario'];
    $nombres_sesion = $usuario['nombres'];
    $rol_sesion = $usuario['rol'];
    $id_rol_sesion = $usuario['id_rol']; // Aquí obtenemos el id_rol de la sesión
}
}
?>