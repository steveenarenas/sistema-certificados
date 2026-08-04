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

include ('../../../controllers/usuarios/update_usuario.php');
include ('../../../controllers/roles/listado_de_roles.php');


?>

<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>ACTUALIZAR USUARIO</strong></h1></center>
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
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    
                  <form action="../../../controllers/usuarios/update.php" method="post">
                    <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                    
                      <div class="form-group">
                        <label for="">Nombres<span style="color: red;">*</span></label>
                        <input type="text" name="nombres" class="form-control" value="<?php echo $nombres;?>" placeholder="Escriba aqui el nombre del nuevo usuario..." required>
                      </div>
                      <div class="form-group">
                        <label for="">Nombre de usuario<span style="color: red;">*</span></label>
                        <input type="text" name="user" class="form-control" value="<?php echo $user;?>" placeholder="Escriba aqui el correo del nuevo usuario..." required>
                      </div>
                      <div class="form-group">
                        <label for="">Rol del usuario<span style="color: red;">*</span></label>
                        <select name="rol" id="" class="form-control">
                          <?php
                          foreach ($roles_datos as $roles_dato){ 
                            $rol_tabla = $roles_dato['rol'];
                            $id_rol = $roles_dato['id_rol'];?>
                              <option value="<?php echo $id_rol; ?>"<?php if($rol_tabla == $rol){ ?> selected="selected" <?php }?> >
                                  <?php echo $rol_tabla;?>
                                 </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Contraseña<span style="color: red;">*</span></label>
                        <input type="text" name="password_user" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Confirmar Contraseña<span style="color: red;">*</span></label>
                        <input type="text" name="password_repeat" class="form-control">
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