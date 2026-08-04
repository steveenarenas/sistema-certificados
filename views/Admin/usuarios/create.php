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

include ('../../../controllers/roles/listado_de_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>REGISTRO DE UN NUEVO USUARIO</strong></h1></center>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content" style="width: 1500px; margin-left: 4%;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Diligencie la información del usuario</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <form action="../../../controllers/usuarios/create.php" method="post">
                      <div class="form-group">
                        <label for="">Nombres y Apellidos<span style="color: red;">*</span></label>
                        <input type="text" name="nombres" class="form-control" placeholder="Escriba aqui el nombre del nuevo usuario..." required>
                      </div>
                      </div>
                   


                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nombre de Usuario<span style="color: red;">*</span></label>
                        <input type="text" name="user" class="form-control" placeholder="Escriba aqui el correo del nuevo usuario..." required>
                      </div>
                    </div>


                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Rol del usuario<span style="color: red;">*</span></label>
                        <select name="rol" id="" class="form-control">
                          <?php
                          foreach ($roles_datos as $roles_dato) { ?>
                              <option value="<?php echo $roles_dato['id_rol'];?>"><?php echo $roles_dato['rol'];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                  </div>

<br>
<br>
<br>
<br>
<br>

                  <div class="" style="margin: 10px; transform: translate(0%, 0);">
                  <div class="row">
                  <div class="col-6">
                      <div class="form-group">
                        <label for="">Contraseña<span style="color: red;">*</span></label>
                        <input type="password" name="password_user" class="form-control" required>
                      </div>
                        </div>
                      <div class="col-6">
                      <div class="form-group">
                        <label for="">Confirmar contraseña<span style="color: red;">*</span></label>
                        <input type="password" name="password_repeat" class="form-control" required>
                      </div>
                  </div>
              </div>
              

              <hr>
                      
                      <div class="form-group">
                      <br>
                      <br>
                        <a href="index.php" class="btn btn-outline-dark">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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