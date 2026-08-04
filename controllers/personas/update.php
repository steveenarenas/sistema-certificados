<?php
include('../../model/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nit_cc = $_POST['nit_cc'];
    $nombre = $_POST['nombre'];
    $certificado = $_POST['certificado'];
    $ano = $_POST['ano'];
    $periodo = $_POST['periodo'];

    // Iniciar la transacción
    $pdo->beginTransaction();

    try {
        // Actualizar la información de la persona en la tabla `certificados`
        $sql = "UPDATE certificados 
                SET nombre = :nombre
                WHERE nit_cc = :nit_cc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':nit_cc' => $nit_cc]);

        // Procesar los archivos PDF
        $pdf_files = $_FILES['pdf'];
        foreach ($pdf_files['tmp_name'] as $index => $tmp_name) {
            $pdf_name = $pdf_files['name'][$index];
            $pdf_error = $pdf_files['error'][$index];

            if ($pdf_error === 0) {
                $pdf_ext = pathinfo($pdf_name, PATHINFO_EXTENSION);
                $pdf_ext_lc = strtolower($pdf_ext);

                if ($pdf_ext_lc === 'pdf') {
                    $pdf_upload_path = '../../../certificados/certificados/' . $pdf_name;
                    move_uploaded_file($tmp_name, $pdf_upload_path);

                    // Verificar si ya existe un registro con el mismo nit_cc, certificado, año y periodo
                    $sql = "SELECT COUNT(*) FROM certificados 
                            WHERE nit_cc = :nit_cc AND certificado = :certificado AND ano = :ano AND periodo = :periodo";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':nit_cc' => $nit_cc,
                        ':certificado' => $certificado,
                        ':ano' => $ano,
                        ':periodo' => $periodo
                    ]);
                    $exists = $stmt->fetchColumn();

                    if ($exists) {
                        // Actualizar el PDF en el registro existente
                        $sql = "UPDATE certificados 
                                SET pdf = :pdf
                                WHERE nit_cc = :nit_cc AND certificado = :certificado AND ano = :ano AND periodo = :periodo";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([
                            ':pdf' => $pdf_upload_path,
                            ':nit_cc' => $nit_cc,
                            ':certificado' => $certificado,
                            ':ano' => $ano,
                            ':periodo' => $periodo
                        ]);
                    } else {
                        // Insertar el nuevo PDF en la base de datos
                        $sql = "INSERT INTO certificados (nit_cc, nombre, certificado, ano, periodo, pdf) 
                                VALUES (:nit_cc, :nombre, :certificado, :ano, :periodo, :pdf)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([
                            ':nit_cc' => $nit_cc,
                            ':nombre' => $nombre,
                            ':certificado' => $certificado,
                            ':ano' => $ano,
                            ':periodo' => $periodo,
                            ':pdf' => $pdf_upload_path
                        ]);
                    }
                }
            }
        }

        // Confirmar la transacción
        $pdo->commit();

        // Redirigir con mensaje de éxito
        session_start();
        $_SESSION['mensaje'] = "Se actualizó la persona correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/views/Admin/personas');
        exit();
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $pdo->rollBack();
        echo "Error al procesar la solicitud: " . $e->getMessage();
    }
}
?>