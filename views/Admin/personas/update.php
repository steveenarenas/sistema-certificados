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
include ('../../../controllers/personas/listado_de_personas.php');
include ('../../../controllers/personas/cargar_persona.php');

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>ACTUALIZACIÓN DEL CERTIFICADO</h1></strong></h1></center>
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
          <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Llene los datos con cuidado</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="../../../controllers/personas/update.php" method="post" enctype="multipart/form-data">
                        <input type="text" value="<?php echo $nit_cc_get; ?>" name="nit_cc" hidden>



                        <div class="border">
                        <center><h3><strong>DATOS DEL CERTIFICADO</strong></h3></center>
                        <div class="" style="margin: 30px; transform: translate(1%, 0);">

                        <div class="row">
                        <div class="col-12 row">

                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="">NIT/Numero de identificación<span style="color: red;">*</span></label>
                                    <input type="text" name="nit_cc" value="<?= $nit_cc_get; ?>" class="form-control" required>
                                </div>
                            </div>
                            

                            <div class="col-md-4">
                            <div class="form-group">
                                    <label for="">Razon Social/Nombre<span style="color: red;">*</span></label>
                                    <input type="text" name="nombre" value="<?= $nombre; ?>" class="form-control" required>
                                </div>
                            </div>
                            
                            

                            
                            
                            <div class="col-3">
                            <div class="form-group">
                                    <label for="">Certificado<span style="color: red;">*</span></label>
                                    <select name="certificado" id="certificado" class="form-control" required>
                                    <option>RETENCION EN LA FUENTE</option>
                                    <option>RETENCION POR IVA</option>
                                    <option>RETENCION POR ICA</option>
                                    <?php
                          foreach ($certificados_datos as $certificados_dato){ 
                            $certificados_tabla = $certificados_dato['certificado'];
                            $nit_cc = $certificados_dato['nit_cc'];?>
                              <option value="<?php echo $certificado; ?>"<?php if($certificados_tabla == $certificado){ ?> selected="selected" <?php } ?> hidden>
                                  <?php echo $certificados_tabla;?>
                                 </option>
                          <?php
                          }
                          ?>
                              </select>
                                </div>
                            </div>
                            </div>
                            
                            
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Año<span style="color: red;">*</span></label>
                                    <select name="ano" id="ano" class="form-control" required>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>  
                                    <?php
                          foreach ($certificados_datos as $certificado){ 
                            $certificados_tabla = $certificado['ano'];
                            $nit_cc = $certificado['nit_cc'];?>
                              <option value="<?php echo $ano; ?>"<?php if($certificados_tabla == $ano){ ?> selected="selected" <?php } ?> hidden>
                                  <?php echo $certificados_tabla;?>
                                 </option>
                          <?php
                          }
                          ?>
                              </select>
                                </div>
                            </div>


                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Periodo<span style="color: red;">*</span></label>
                                    <select name="periodo" id="periodo" class="form-control" required>
                                    <option>Anual</option>
                                    <option>Bimestral</option>
                                    <?php
                          foreach ($certificados_datos as $certificado){ 
                            $certificados_tabla = $certificado['periodo'];
                            $nit_cc = $certificado['nit_cc'];?>
                              <option value="<?php echo $periodo; ?>"<?php if($certificados_tabla == $periodo){ ?> selected="selected" <?php } ?> hidden>
                                  <?php echo $certificados_tabla;?>
                                 </option>
                          <?php
                          }
                          ?>
                              </select>
                                </div>
                            </div>

                            
                            
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="">PDF<span style="color: red;">*</span></label>
                                    <input type="file" name="pdf[]" class="form-control-file" accept=".pdf" multiple required>
                                </div>
                            </div>



</div>


                <br>
                <br>


                      <div class="form-group">
                        <a href="index.php" class="btn btn-outline-dark">Cancelar</a>
                        <button type="submit" name="guardar" class="btn btn-success">Actualizar</button>
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