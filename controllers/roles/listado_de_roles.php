<?php


  $sql_roles = "SELECT * FROM cert_roles ";
  $query_roles = $pdo->prepare($sql_roles);
  $query_roles->execute();
  $roles_datos = $query_roles->fetchALL(fetch_style: PDO::FETCH_ASSOC);