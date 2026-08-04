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
include ('../../../controllers/roles/update_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>EDITAR ROL</strong></h1></center>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content" style="width: 1500px; margin-left: 22%;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Llene los datos con cuidado</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="../../../controllers/roles/update.php" method="post">
                      <div class="form-group">
                        <input type="text" name="id_rol" value="<?php echo $id_rol_get;?>" hidden>
                        <label for="">Nombre del Rol</label>
                        <input type="text" name="rol" class="form-control" placeholder="Escriba aqui el rol..."  value="<?php echo $rol;?>" required>
                      </div>
                      <hr>
                      <div class="form-group">
                        <a href="index.php" class="btn btn-outline-dark">Cancelar</a>
                        <button type="submit" class="btn btn-success">Actualizar</button>
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