<?php

$id_usuario_get = $_GET['id'];

$sql_usuarios = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.user as user, rol.rol as rol 
FROM cert_usuarios as us INNER JOIN cert_roles as rol ON us.id_rol = rol.id_rol where id_usuario = '$id_usuario_get' ";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchALL(fetch_style: PDO::FETCH_ASSOC);

foreach ($usuarios_datos as $usuarios_dato){
    $nombres = $usuarios_dato['nombres'];
    $user = $usuarios_dato['user'];
    $rol = $usuarios_dato['rol'];
}