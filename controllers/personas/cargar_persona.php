<?php


$nit_cc_get = $_GET['nit_cc'];

$sql_certificados = "SELECT *
                 FROM certificados
                 WHERE nit_cc = '$nit_cc_get'";
$query_certificados = $pdo->prepare($sql_certificados);
$query_certificados->execute();
$certificados_datos = $query_certificados->fetchALL(fetch_style: PDO::FETCH_ASSOC);


foreach ($certificados_datos as $certificados_dato){
    $nombre = $certificados_dato['nombre'];
    $certificado = $certificados_dato['certificado'];
    $ano = $certificados_dato['ano'];
    $periodo = $certificados_dato['periodo'];
    $pdf = $certificados_dato['pdf'];

}