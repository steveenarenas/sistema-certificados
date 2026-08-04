<?php
require '../../../vendor/autoload.php';
include_once '../../../model/config.php'; // Asegúrate de que tu archivo de configuración esté incluido

use Smalot\PdfParser\Parser;

// Asegúrate de que la conexión a la base de datos se establece en el archivo de configuración y está disponible aquí

function extractDataFromPdf($inputPdf) {
    $parser = new Parser();
    $pdf = $parser->parseFile($inputPdf);

    $text = $pdf->getText();
    $data = [];

 

    // Inicializa la variable para el NIT
    $data['nit'] = '';

    // Divide el texto en líneas
    $lines = explode("\n", $text);

    // Recorre las líneas para encontrar la que contiene "NIT" o "Nit"
    foreach ($lines as $line) {
        if (stripos($line, 'NIT') !== false) { // Busca la línea que contiene "NIT"
            // Extrae los números de la línea
            preg_match('/\d+/', $line, $matches); // Extrae solo los números
            $data['nit'] = trim($matches[0] ?? '');
            break; // Termina el bucle después de encontrar el NIT
        }
    }

    // Si necesitas asegurarte de que no hay otros caracteres que no sean dígitos:
    $data['nit'] = preg_replace('/\D/', '', $data['nit']); // Elimina cualquier carácter no numérico





    // Buscar el texto completo alrededor de "Razón social" para capturar lo que sigue
    $lines = explode("\n", $text);
    for ($i = 0; $i < count($lines); $i++) {
        if (stripos($lines[$i], 'Razón social a quien se le practicó la retencion') !== false) {
            $data['razon_social'] = trim($lines[$i + -4] ?? '');
        }
    }

    // Extraer el tipo de retención
    preg_match('/(RETENCION POR ICA|RETENCION POR IVA|RETENCION EN LA FUENTE)/i', $text, $matches);
    $data['tipo_retencion'] = trim($matches[1] ?? '');

    // Extraer Año Gravable
    preg_match('/(2023|2024|2025)/i', $text, $matches);
    $data['anio'] = trim($matches[1] ?? '');

    // Extraer y determinar el período
    if (preg_match('/PERIODO\s+(?:ENERO|FEBRERO|MARZO|ABRIL|MAYO|JUNIO|JULIO|AGOSTO|SEPTIEMBRE|OCTUBRE|NOVIEMBRE|DICIEMBRE)-\d{4}\s+A\s+(?:ENERO|FEBRERO|MARZO|ABRIL|MAYO|JUNIO|JULIO|AGOSTO|SEPTIEMBRE|OCTUBRE|NOVIEMBRE|DICIEMBRE)-\d{4}/i', $text)) {
        $data['periodo'] = 'Bimestral';
    } elseif (preg_match('/AÑO GRAVABLE DE\s+\d{4}/i', $text)) {
        $data['periodo'] = 'Anual';
    } else {
        $data['periodo'] = 'Indeterminado';  // Opcional, en caso de no encontrar un patrón coincidente
    }

    return $data;
}

function insertDataIntoDatabase($data, $pdo) {
    // Preparar la consulta SQL
    $stmt = $pdo->prepare("INSERT INTO certificados (nit_cc, nombre, certificado, ano, periodo, pdf) VALUES (:nit, :razon_social, :tipo_retencion, :anio, :periodo, :pdf)");

    // Ejecutar la consulta con los datos extraídos
    $stmt->execute([
        ':nit' => $data['nit'],
        ':razon_social' => $data['razon_social'],
        ':tipo_retencion' => $data['tipo_retencion'],
        ':anio' => $data['anio'],
        ':periodo' => $data['periodo'],
        ':pdf' => $data['pdf']
    ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataCollection = []; // Array para almacenar datos de todas las páginas
    $uploadDir = '../../../certificados/'; // Directorio donde se guardarán los archivos PDF

    foreach ($_FILES as $file) {
        $inputPdf = $file['tmp_name'];
        $data = extractDataFromPdf($inputPdf);

        // Cambiar el nombre del PDF
        $newPdfName = uniqid('certificado_', true) . '.pdf'; // Genera un nombre único para el PDF
        $data['pdf'] = $newPdfName; // Agregar el nuevo nombre del archivo PDF a los datos

        // Mover el archivo PDF a la ubicación deseada con el nuevo nombre
        if (move_uploaded_file($inputPdf, $uploadDir . $newPdfName)) {
            // Insertar los datos en la base de datos
            insertDataIntoDatabase($data, $pdo);

            // Mostrar los datos
            fillFields($data);
            echo "<hr>"; // Separador entre los datos de diferentes páginas
        } else {
            echo "Error al subir el archivo: " . htmlspecialchars($file['name']) . "<br>";
        }
    }
}

function fillFields($data) {
    echo "NIT: " . htmlspecialchars($data['nit']) . "<br>";
    echo "Razón Social: " . htmlspecialchars($data['razon_social']) . "<br>";
    echo "Tipo de Retención: " . htmlspecialchars($data['tipo_retencion']) . "<br>";
    echo "Año: " . htmlspecialchars($data['anio']) . "<br>";
    echo "Periodo: " . htmlspecialchars($data['periodo']) . "<br>";
    echo "PDF: " . htmlspecialchars($data['pdf']) . "<br>";
}
?>