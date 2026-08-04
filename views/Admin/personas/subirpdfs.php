<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once '../../../controllers/login/session_check.php';
checkSession();
?>

<?php

require '../../../vendor/autoload.php';

include_once '../../../model/config.php';
include_once '../../../layout/sesion.php';
include_once '../../../layout/index1.php';
include_once 'leer.php';
?>


<!-- Estilos CSS -->
<link rel="stylesheet" href="<?php echo $URL;?>/lib/css/crearpdfs.css">

<!--Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>

<!-- Libreria Sweetalert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


<nav class="navbar-nav barra">Utiliza esta sección para subir múltiples archivos PDF de manera simultánea. ¡Facilita el manejo de tus documentos y optimiza tu flujo de trabajo al cargar varios PDFs a la vez!</nav>


<h1 style="text-align: center; margin-top: 20px;">SUBIR PAQUETE DE PDFs</h1>
    <div class="container-pdf">

    <div class="cargarpdf">
    <h1 class="texto-cargar">Cargar y Procesar PDFs</h1>
    <input type="file" id="upload" multiple accept="application/pdf"/>
    <div id="output"></div>
    </div>


    <div class="subirpdf">
        <form id="uploadForm" action="leer.php" method="post" enctype="multipart/form-data">
        <h1 class="texto-subir">Subir PDFs</h1>
        <input type="file" name="pdf[]" id="pdf" multiple accept="application/pdf" onchange="validateFiles(this)">
        <button type="submit">Subir Todo</button>
        </form>
        <div id="output"></div>
    </div>

    
<script>
    function validateFiles(input) {
        const maxFiles = 500; // Cambiar este valor según lo necesario
        if (input.files.length > maxFiles) {
            alert(`No puedes subir más de ${maxFiles} archivos.`);
            input.value = ''; // Resetea el campo de entrada de archivos
        }
    }
</script>
        

</div>



</body>
</html>


<?php include ('../../../layout/footer.php'); ?>


<script src="<?php echo $URL;?>/lib/js/cortarpdfs.js"></script>