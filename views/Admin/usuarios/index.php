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
include ('../../../controllers/usuarios/listado_de_usuarios.php');

?>




<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0" style="color: #0D3B5A;"><strong>LISTADO DE USUARIOS</strong></h1></center>
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


              <div class="table table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>ID</center></th>
                        <th><center>Nombres</center></th>
                        <th><center>Usuario</center></th>
                        <th><center>Rol del usuario</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                        $contador = 0;
                        foreach ($usuarios_datos as $usuarios_dato){ 
                          $id_usuario = $usuarios_dato['id_usuario'];?>
                        <tr>
                            <td><center><?php echo $contador = $contador + 1;?></center></td>
                            <td><?php echo $usuarios_dato['nombres'];?></td>
                            <td><?php echo $usuarios_dato['user'];?></td>
                            <td><center><?php echo $usuarios_dato['rol'];?></center></td>
                            <td>
                            <center>
                            <div class="btn-group">
                        <a href="show.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                        <a href="update.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Editar</a>
                        <a href="javascript:void(0);" class="btn btn-danger" onclick="alerta_eliminar(<?php echo $id_usuario; ?>)"><i class="fa fa-trash"></i> Borrar</a>
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
<script src="<?php echo $URL;?>/lib/js/eliminar_usuario.js"></script>


 