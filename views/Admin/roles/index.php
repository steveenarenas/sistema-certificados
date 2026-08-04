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
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>ROLES REGISTRADOS</strong></h1></center>
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
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>ID</center></th>
                        <th><center>Nombre del rol</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                        $contador = 0;
                        foreach ($roles_datos as $roles_dato){ 
                          $id_rol = $roles_dato['id_rol']; ?>
                        <tr>
                            <td><center><?php echo $contador = $contador + 1;?></center></td>
                            <td><?php echo $roles_dato['rol'];?></td>
                            <td>
                            <center>
                            <div class="btn-group">
                        <a href="update.php?id=<?php echo $id_rol; ?>" type="button" class="btn btn-success">
                        <i class="fa fa-pencil-alt"></i> Editar</a>
                      </div>
                            </center>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
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
  