<?php


// Obtener el valor ingresado en el buscador
$nit_busqueda = isset($_POST['buscar']) ? $_POST['buscar'] : '';

// Determinar la vista
$vista = isset($_GET['vista']) ? $_GET['vista'] : 'index';

// Si estamos en la vista de "listado de personas" o si se ha realizado una búsqueda
if ($vista === 'listado_de_personas' || !empty($nit_busqueda)) {
    if (!empty($nit_busqueda)) {
        // Si se ha ingresado un valor en el buscador, buscar solo ese NIT
        $sql_certificados = "SELECT * FROM certificados WHERE nit_cc = :nit_cc";
        $query_certificados = $pdo->prepare($sql_certificados);
        $query_certificados->execute(['nit_cc' => $nit_busqueda]);
    } else {
        // Si no se ha ingresado ningún valor en el buscador, obtener todos los resultados
        $sql_certificados = "SELECT * FROM certificados";
        $query_certificados = $pdo->prepare($sql_certificados);
        $query_certificados->execute();
    }
    $certificados_datos = $query_certificados->fetchAll(PDO::FETCH_ASSOC);
    if (empty($certificados_datos)) {
        $_SESSION['nit_not_found'] = true;
    }
} else {
    $certificados_datos = [];
}
?>