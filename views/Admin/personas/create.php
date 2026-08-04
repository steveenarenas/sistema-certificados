<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ('../../../controllers/login/session_check.php');
checkSession();
?>

<?php
include ('../../../model/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/index1.php');
?>

<!-- Estilos CSS -->
<link rel="stylesheet" href="<?php echo $URL;?>/lib/css/create_certificados.css">



<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>REGISTRO DE UN NUEVO CERTIFICADO</strong></h1></center>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Diligencie la información del nuevo certificado</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <form action="../../../controllers/personas/create.php" method="POST" enctype="multipart/form-data">

                    
                        <div class="border">
                        <center><h3><strong>DATOS DEL CERTIFICADO</strong></h3></center>
                        <div class="" style="margin: 30px; transform: translate(1%, 0);">

                        <div class="row">

                        <div class="col-12 row">
                        <div class="col-4">
                            <div class="form-group">
                                    <label class="nit_cc" for="">NIT/Numero de identificación<span style="color: red;">*</span></label>
                                    <input id="nit_cc" type="text" name="nit_cc" class="form-control" placeholder="Escriba su NIT o numero de identificación" required>
                                </div>
                            </div>
                           

                            <div class="col-4">
                            <div class="form-group">
                                    <label class="nombre" for="">Razon Social/Nombre<span style="color: red;">*</span></label>
                                    <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Escriba su nombre" required>
                                </div>
                            </div>
                            
                            
                            

                            <div class="col-3">
                                <div class="form-group">
                            <label class="certificado" for="">Tipo Certificado<span style="color: red;">*</span></label>
                            <select name="certificado" id="certificado" class="form-control" required>
                                    <option>RETENCION EN LA FUENTE</option>
                                    <option>RETENCION POR IVA</option>
                                    <option>RETENCION POR ICA</option>
                              </select>
                                </div>
                            </div>
                            </div>
                            
                            
                            <div class="col-2">
                                <div class="form-group">
                            <label class="ano" for="">Año<span style="color: red;">*</span></label>
                            <select name="ano" id="ano" class="form-control" required>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                              </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                            <label class="periodo" for="">Periodo<span style="color: red;">*</span></label>
                            <select name="periodo" id="periodo" class="form-control" required>
                                    <option>Anual</option>
                                    <option>Bimestral</option>
                              </select>
                                </div>
                            </div>


                            <div class="col-5">
                                <div class="form-group">
                                    <label class="pdf" for="">PDF<span style="color: red;">*</span></label>
                                    <input type="file" name="pdf" id="pdf" class="form-control-file" accept=".pdf" required>
                                </div>
                            </div>
                        
           
</div>

<br>
<br>
                      <div class="form-group">
                        <a href="index.php" class="btn btn-outline-dark">Cancelar</a>
                        <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                      </div>
                    </form>
                  </div>
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


  <script type="text/javascript" src="lib/js/alertas.js"></script>

