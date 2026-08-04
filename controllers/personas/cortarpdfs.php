<?php
require_once '../../../vendor/autoload.php';

use setasign\Fpdi\Fpdi;

// Verifica si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf'])) {
    $uploadDirectory = '../../../certificados/'; // Directorio para guardar los archivos PDF divididos
    $uploadedFiles = $_FILES['pdf']; // Esto ahora es un array

    // Procesar cada archivo subido
    foreach ($uploadedFiles['tmp_name'] as $key => $tmpName) {
        // Verifica si el archivo subido es un PDF
        if (mime_content_type($tmpName) === 'application/pdf') {
            $pdf = new Fpdi();

            // Cargar el archivo PDF
            $pageCount = $pdf->setSourceFile($tmpName);

            // Dividir y guardar cada página como un archivo PDF separado
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                // Crear un nuevo PDF para la página
                $newPdf = new Fpdi();
                $newPdf->AddPage();

                // Importar la página desde el archivo original
                $tplIdx = $newPdf->importPage($pageNo);
                $newPdf->useTemplate($tplIdx);

                // Guardar el archivo PDF de la página individual
                $newFileName = $uploadDirectory . 'page_' . ($key + 1) . '_page_' . $pageNo . '.pdf';
                $newPdf->Output($newFileName, 'F');

                echo "Página $pageNo del PDF guardada como $newFileName.<br>";
            }

            echo "¡Archivos subidos y procesados con éxito!<br>";
        } else {
            echo "El archivo subido no es un PDF.<br>";
        }
    }
} else {
    echo "No se ha subido ningún archivo.";
}
?>