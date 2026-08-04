<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Verificar si hay una sesión iniciada
if(isset($_SESSION['sesion_email'])){
  
  $sesion_iniciada = false; // No hay una sesión iniciada
} else {
  
  $sesion_iniciada = true; // Hay una sesión iniciada
}


include ('../../model/config.php');
include ('../../layout/sesion.php');
include ('../../layout/index1.php');
include ('../../controllers/usuarios/listado_de_usuarios.php');
include ('../../controllers/roles/listado_de_roles.php');
include ('../../controllers/personas/listado_de_personas.php');



// Verificar si el NIT está registrado
$certificados_datos = []; // Inicializamos un array para almacenar los datos de certificados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "SELECT * FROM certificados WHERE 1=1";
    $params = [];

    // Filtrar por NIT/Identificación si se proporcionó
    if (!empty($_POST['buscar'])) {
        $sql .= " AND nit_cc = :nit_cc";
        $params[':nit_cc'] = $_POST['buscar'];
    }

    // Filtrar por tipo de certificado si se seleccionó
    if (!empty($_POST['certificado'])) {
        $sql .= " AND certificado = :certificado";
        $params[':certificado'] = $_POST['certificado'];
    }

    // Filtrar por año si se seleccionó
    if (!empty($_POST['ano'])) {
        $sql .= " AND ano = :ano";
        $params[':ano'] = $_POST['ano'];
    }

    // Filtrar por periodo si se seleccionó
    if (!empty($_POST['periodo'])) {
        $sql .= " AND periodo = :periodo";
        $params[':periodo'] = $_POST['periodo'];
    }

    // Depuración: imprimir la consulta SQL y los parámetros
    error_log("Consulta SQL: $sql");
    error_log("Parámetros: " . json_encode($params));

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $certificados_datos = $stmt->fetchAll();

    if (empty($certificados_datos)) {
        $_SESSION['nit_not_found'] = true;
    } else {
        unset($_SESSION['nit_not_found']);
    }
}
?>

<!-- Estilos CSS -->
<link rel="stylesheet" href="<?php echo $URL;?>/lib/css/index.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<nav class="header navbar navbar-expand navbar-dark navbar-light" style="height: 30px; background-color: #152946;">
<p class="text-white" style="font-size: 13px; margin-top: 15px"></p>
</nav>
          <div class="contenedor">
            <center>
            <img src="<?php echo $URL;?>/lib/images/logo_gers2.png" alt="Logo" class="mh-100" style="width: 180px; height: 90px; margin-bottom: 8px">
              <p><span>Bienvenido al portal proveedores GERS SAS, donde podrás descargar los certificados emitidos por la empresa, por favor ingrese el número de identificación o NIT.</span></p>
              <h6><strong>Nota:</strong> Apreciado usuario, si al momento de consultar su certificado presenta algún dato erróneo o que no se encuentra actualizado, por favor comuníquese al siguiente correo:</h6>
              <h6><strong>contabilidad@listas.gers.co</strong></h6>
            </center>
            <br>
            <br>

            
            <!-- BUSCADOR -->
            <form action="index.php?vista=index" method="post" class="form-container">
            <div class="buscador d-flex flex-column align-items-center justify-content-center">
    
  


        <!-- Filtros de búsqueda -->
        <div class="row w-100 row-center">

        <!-- Campo de texto para buscar -->
    <div class="align-items-center" id="NIT">
      <div class="col-auto" style="text-align: center;">
        <label for="buscarInput" class="form-label">NIT/CC<span>*</span></label>
      </div>
      <div class="col-12">
        <input type="text" id="buscarInput" name="buscar" class="form-control rounded" placeholder="Número de identificación o NIT...">
      </div>
    </div>
            <!-- Select para tipo de certificado -->
            <div class="col-3" style="text-align: center;">
                <label class="tipoc" for="certificado">Tipo de certificado<span>*</span></label>
                <select id="tipoc" name="certificado" class="form-control rounded" required>
                    <option value="">Seleccione tipo de certificado</option>
                    <option>RETENCION EN LA FUENTE</option>
                    <option>RETENCION POR IVA</option>
                    <option>RETENCION POR ICA</option>
                    <!-- Añadir más opciones según sea necesario -->
                </select>
            </div>

            <!-- Select para año -->
            <div class="col-3" style="text-align: center;">
                <label class="ano" for="ano">Año<span>*</span></label>
                <select id="tipoc" name="ano" class="form-control rounded" required>
                    <option value="">Seleccione año</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </div>

            <!-- Select para periodo -->
            <div class="col-3" style="text-align: center;">
                <label class="periodo " for="periodo">Periodo<span>*</span></label>
                <select id="periodo" name="periodo" class="form-control rounded" required>
                    <option value="">Seleccione el periodo</option>
                    <option>Anual</option>
                    <option>Bimestral</option>
                </select>
            </div>
            </div>
            
        <center><p class="form-text text-red"><small>(NIT sin puntos, sin comas y sin dígito de verificación*)</small></p></center>

        
        
        
        <!-- Botón de búsqueda -->
        <div class="col-md-3 d-flex align-items-end mb-5">
                <button class="btn btn-outline-secondary w-100" id="buscarButton"><i class="fas fa-search"></i> Buscar</button>
           

        <div class="col-md-6 d-flex">
                <button type="reset" class="btn btn-outline-secondary w-100" id="limpiarButton">
                    <i class="fas fa-trash"></i> Limpiar
                </button>
            </div>
        </div>
        </div>

    </div>
</form>
          


      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title" style="font-weight: bold; font-size: x-large; color: #213D6B">Resultados:</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        

                        <tr>
                          <th><center>NIT/Numero de identificación</center></th>
                          <th><center>Razón Social / Nombre</center></th>
                          <th><center>Tipo de certificado</center></th>
                          <th><center>Año</center></th>
                          <th><center>Periodo</center></th>
                          <th><center>Descargar</center></th>
                        </tr>
                      </thead>
                      <tbody>
            <?php foreach ($certificados_datos as $certificados_dato): ?>
                  <tr>
                  <td><?php echo htmlspecialchars($certificados_dato['nit_cc'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($certificados_dato['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($certificados_dato['certificado'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($certificados_dato['ano'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($certificados_dato['periodo'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td>
                    <center>
            <?php 
        // Extraer solo el nombre del archivo del campo pdf
                  $pdf_name = basename($certificados_dato['pdf']);
            ?>
            <?php echo htmlspecialchars($pdf_name, ENT_QUOTES, 'UTF-8'); ?>
                  <a href="<?php echo htmlspecialchars($certificados_dato['pdf'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-primary btn-sm ml-4" download>
                  <i class="fas fa-download"></i> Descargar
                  </a>
                    </center>
            </td>
      
            </tr>
            <?php endforeach; ?>

            <?php if (empty($certificados_datos)): ?>
            <script>
        <?php

            if (isset($_SESSION['nit_not_found']) && $_SESSION['nit_not_found']) {
            // Mostrar el mensaje de error con SweetAlert
            echo "Swal.fire('Datos no registrados', 'El NIT / Numero de identificación no está registrado. ', 'error');";
            
            // Eliminar el indicador de NIT no encontrado de la sesión
            unset($_SESSION['nit_not_found']);
            }
            ?>
    </script>
            <?php endif; ?>
            </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
<!-- /.content-wrapper -->







<?php include ('../../layout/footer.php'); ?>




<script src="<?php echo $URL;?>/lib/js/index.js"></script>
