<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gers Certificados</title>
  <link rel="icon" type="image/ico" href="../lib/images/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../lib/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../lib/templates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../lib/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../lib/css/stylelogin.css"> 
  <!-- Libreria Sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .login-page {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f4f6f9;
      padding: 20px;
    }
    .image-container {
      flex: 3;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .image-container img {
      max-width: 100%;
      height: auto;
      border: 2px solid #ccc; /* Borde */
      box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.2); /* Sombra */
    }
    .form-container {
      flex: 2;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center; 
      margin-top: 10px;
    }
    .form-container img {
      margin-bottom: 20px;
    }
    .card {
      width: 100%;
      max-width: 330px;
    }
  </style>
</head>
<body class="hold-transition login-page">



  <?php
  if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje']; ?>
    <script>
      Swal.fire({
        icon: "error",
        title: "<?php echo $respuesta;?>",
        text: "¡El usuario o contraseña son incorrectos!"
      });
    </script>
  <?php
    unset($_SESSION['mensaje']);
  }
  ?>

<div class="form-container">

  <img src="../lib/images/logo_gers2.png" alt="Logo" width="280px">

  <div class="card card-outline card-dark">
    <div class="card-header text-center">
    <b><h1><p style="font-family: courier, arial;">
            CERTIFICADOS
        </p></h1></b>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresa tus datos</p>
      <form action="../controllers/login/ingreso.php" method="post">
      <p class="mb-0"><small>Usuario</small></p>
        <div class="input-group mb-3">
          <input type="text" name="user" class="form-control" placeholder="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <p class="mb-0"><small>Contraseña</small></p>
        <div class="input-group mb-3">
          <input type="password" name="password_user" class="form-control" placeholder="contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-dark btn-block" style="background-color: #1E3966">Ingresar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="../lib/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../lib/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../lib/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>