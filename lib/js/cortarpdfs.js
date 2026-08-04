document.getElementById('upload').addEventListener('change', async (event) => {
    const file = event.target.files[0];
    if (file.type !== 'application/pdf') {
        alert('Por favor suba un archivo PDF.');
        return;
    }

    const arrayBuffer = await file.arrayBuffer();
    const pdfDoc = await PDFLib.PDFDocument.load(arrayBuffer);

    const numPages = pdfDoc.getPageCount();
    const formData = new FormData();

    for (let i = 0; i < numPages; i++) {
        const newPdfDoc = await PDFLib.PDFDocument.create();
        const [copiedPage] = await newPdfDoc.copyPages(pdfDoc, [i]);
        newPdfDoc.addPage(copiedPage);

        const pdfBytes = await newPdfDoc.save();
        const blob = new Blob([pdfBytes], { type: 'application/pdf' });

        // Añadir cada Blob al FormData como un archivo
        formData.append(`pdf_page_${i + 1}`, blob, `page_${i + 1}.pdf`);

        // Mostrar un mensaje en la página de que el archivo ha sido añadido al FormData
        const outputDiv = document.getElementById('output');
        const message = document.createElement('p');
        message.textContent = `Página ${i + 1} del PDF lista para subir.`;
        outputDiv.appendChild(message);
    }

    // Al enviar el formulario, se suben los archivos divididos
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();  // Prevenir el envío normal del formulario

        uploadFiles(formData);  // Llama a la función para subir archivos divididos
    });
});

function uploadFiles(formData) {
    fetch('leer.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        // Muestra un mensaje de éxito con SweetAlert
        Swal.fire({
            title: '¡Éxito!',
            text: 'Archivos subidos y procesados con éxito',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            document.getElementById('output').innerHTML += result;  // Muestra el resultado en la página
        });
    })
    .catch(error => {
        // Muestra un mensaje de error con SweetAlert
        Swal.fire({
            title: 'Error',
            text: 'Error al subir los archivos',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        console.error('Error:', error);
    });
}

/////////////////////////////////////////////////////////////////////////////////////////////////////




 // Mensaje al presionar el botón subir y este está vacío el adjuntador de archivos
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        const fileInput = document.getElementById('upload');

        // Validar si se ha seleccionado un archivo
        if (!fileInput.value) {
            event.preventDefault();  // Prevenir el envío del formulario
            
            // Mostrar alerta de SweetAlert
            swal({
                title: "Error",
                text: "No se ha subido ningún archivo. Por favor seleccione un archivo PDF.",
                icon: "warning",
                button: "Aceptar",
            });
        }
    });