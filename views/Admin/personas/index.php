<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ('../../../controllers/login/session_check.php');
checkSession();
?>


<?php

$_GET['vista'] = 'listado_de_personas';

include ('../../../model/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/index1.php');
include ('../../../controllers/personas/listado_de_personas.php');

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>




<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>LISTADO DE CERTIFICADOS</strong></h1></center>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

  
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: center;">ID</th>
                          <th style="text-align: center;">NIT/Numero de identificación</th>
                          <th style="text-align: center;">Razón Social/Nombre</th>
                          <th style="text-align: center;">Tipo de certificado</th>
                          <th style="text-align: center;">Año</th>
                          <th style="text-align: center;">Periodo</th>
                          <th style="text-align: center;">Descargar</th>
                          <th style="text-align: center;">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php
              $contador = 0;
              foreach ($certificados_datos as $certificados_dato) { 
              $id_cert = $certificados_dato['id_cert']; 
              ?>
<tr>
    <td><?php echo ++$contador; ?></td>
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
            // Construir la ruta completa del archivo
            $pdf_ruta = $URL . '../../../certificados/certificados/' . $pdf_name; 
            ?>
            <?php echo htmlspecialchars($pdf_name, ENT_QUOTES, 'UTF-8'); ?>
            <a href="<?php echo htmlspecialchars($pdf_ruta, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-primary btn-sm ml-4" download>
                <i class="fas fa-download"></i> Descargar
            </a>
        </center>
    </td>
    <td>
        <center>
            <div class="btn-group">
                <a href="update.php?nit_cc=<?php echo htmlspecialchars($certificados_dato['nit_cc'], ENT_QUOTES, 'UTF-8'); ?>" type="button" class="btn btn-outline-success">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-outline-danger" onclick="alerta_eliminar('<?php echo htmlspecialchars($certificados_dato['pdf'], ENT_QUOTES, 'UTF-8'); ?>')">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </center>
    </td>
</tr>
<?php } ?>
            </tbody>
                </table>
              </div>

              </div>
              <!-- /.card-body -->
            </div>

            </div>
        </div>
            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <?php include ('../../../layout/mensajes.php'); ?>
  <?php include ('../../../layout/footer.php'); ?>
  

  <script src="<?php echo $URL;?>/lib/js/translate.js"></script>
  <script src="<?php echo $URL;?>/lib/js/eliminar_pdf.js"></script>
