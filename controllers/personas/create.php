<?php
include('../../model/config.php');

// Obtener los datos del formulario
$nit_cc = $_POST['nit_cc'];
$nombre = $_POST['nombre'];
$certificado = $_POST['certificado'];
$ano = $_POST['ano'];
$periodo = $_POST['periodo'];

// Procesar el archivo PDF
$pdf_nombre = $_FILES['pdf']['name'];
$pdf_temp = $_FILES['pdf']['tmp_name'];
$pdf_ruta = '../../../certificados/certificados/' . $pdf_nombre; // Ruta donde se guardará el archivo (asegúrate de que esta ruta es correcta y tiene permisos de escritura)

// Verificar si hay algún error en el archivo subido
if ($_FILES['pdf']['error'] !== UPLOAD_ERR_OK) {
    echo "Error al subir el archivo PDF.";
    exit;
}

// Mover el archivo a la ubicación deseada
if (move_uploaded_file($pdf_temp, $pdf_ruta)) {
    // Insertar la información en la base de datos utilizando PDO
    $sentencia = $pdo->prepare("INSERT INTO certificados (nit_cc, nombre, certificado, ano, periodo, pdf) VALUES (:nit_cc, :nombre, :certificado, :ano, :periodo, :pdf)");

    $result = $sentencia->execute(array(
        ':nit_cc' => $nit_cc,
        ':nombre' => $nombre,
        ':certificado' => $certificado,
        ':ano' => $ano,
        ':periodo' => $periodo,
        ':pdf' => $pdf_ruta
    ));

    if ($result) {
        // Éxito al guardar en la base de datos
        session_start();
        $_SESSION['mensaje'] = "Se registró el certificado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/views/Admin/personas');
        exit; // Termina el script después de la redirección
    } else {
        // Error al ejecutar la consulta SQL
        echo "Error al ejecutar la consulta SQL.";
    }
} else {
    // Error al mover el archivo
    echo "Error al mover el archivo PDF.";
}
?>