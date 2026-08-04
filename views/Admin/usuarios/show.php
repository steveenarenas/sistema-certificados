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

include ('../../../controllers/usuarios/show_usuario.php');

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>DATOS DEL USUARIO</strong></h1></center>
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
          <div class="card card-primary">
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
                    
                      <div class="form-group">
                        <label for="">Nombres</label>
                        <input type="text" name="nombres" class="form-control" value="<?php echo $nombres;?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">User</label>
                        <input type="text" name="user" class="form-control" value="<?php echo $user;?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="">Rol del usuario</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $rol;?>" disabled>
                      </div>
                      <hr>
                      <div class="form-group">
                        <a href="index.php" class="btn btn-outline-dark">Volver</a>
                        
                      </div>
                    
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <?php include ('../../../layout/mensajes.php'); ?>
  <?php include ('../../../layout/footer.php'); ?>