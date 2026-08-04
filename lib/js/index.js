 document.getElementById('limpiarButton').addEventListener('click', function() {
        // Resetear los campos del formulario
        document.getElementById('buscarInput').value = '';
        document.querySelector('select[name="certificado"]').selectedIndex = 0;
        document.querySelector('select[name="ano"]').selectedIndex = 0;
        document.querySelector('select[name="periodo"]').selectedIndex = 0;
        
        // Recargar la página para limpiar los resultados
        window.location.href = 'index.php?vista=index';
    });
