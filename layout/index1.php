<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Verificar si hay una sesión iniciada
if(isset($_SESSION['sesion_email'])){
  $sesion_iniciada = true; // Hay una sesión iniciada
  
} else {
  
  $sesion_iniciada = false; // No hay una sesión iniciada
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gers Certificados</title>
  <link rel="icon" type="image/ico" href="<?php echo $URL;?>/lib/images/favicon.ico">

  <!-- Estilos CSS -->
  <link rel="stylesheet" href="<?php echo $URL;?>/lib/css/botones.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/lib/css/index.css">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL;?>/lib/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL;?>/lib/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

<!-- Libreria Sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Estilos JS -->
  <script src="<?php echo $URL;?>/lib/js/botones.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL;?>/lib/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/lib/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/lib/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  
</head>

<body>


<?php

?>



<div class="wrapper">

  <!-- Navbar -->
  <nav class="header navbar navbar-expand navbar-dark navbar-light" style="height: 70px; background-color: #F2F2F2;">
    <!-- Left navbar links -->

    
    <ul class="navbar-nav">
      
     

        <a href="<?php echo $URL;?>/views/Admin/index.php" class="brand-link">
      <img src="<?php echo $URL;?>/lib/images/appsgers.png" alt="Logo" class="mh-100 logoapps" style="width: 60px; height: 60px; opacity: 0.9;">
    </a>
  </ul>
        <b><h1><p class="titulo" style="font-family:courier,arial; padding-top: 20px;">
            CERTIFICADOS
        </p></h1></b>
      </ul>

      

   
    
        <ul class="navbar-nav ml-auto">
            <?php if ($sesion_iniciada): ?>
            <li class="nav-item ml-4">
                <a class="nav-link text-dark botonnav" href="<?php echo $URL;?>/views/Admin/index.php">
                    <img class="home" src="<?php echo $URL;?>/lib/images/home3.png" alt="Home" style="width: 20px; height: 20px"> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark botonnav" href="<?php echo $URL;?>/views/Admin/personas/create.php">
                    <img class="pluscert" src="<?php echo $URL;?>/lib/images/cert.png" alt="Agregar certificados" style="width: 20px; height: 20px"> Agregar certificados
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark botonnav" href="<?php echo $URL;?>/views/Admin/personas/subirpdfs.php">
                    <img class="pluscert" src="<?php echo $URL;?>/lib/images/plus.png" alt="Agregar certificados" style="width: 20px; height: 20px"> Agg varios + certificados
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark botonnav" href="<?php echo $URL;?>/views/Admin/personas/index.php">
                    <img class="certificados" src="<?php echo $URL;?>/lib/images/cert2.png" alt="Todos los certificados" style="width: 20px; height: 20px"> Todos los certificados
                </a>
            </li>


            
            <li class="nav-item dropdown" id="hamburguesa">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars"></i> Menú
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo $URL;?>/views/Admin/index.php">
                        <button class="btn btn-outline-secondary">
                            <img class="home" src="<?php echo $URL;?>/lib/images/home3.png" alt="Home" style="width: 25px; height: 25px"> Home
                        </button>
                    </a>
                    <a class="dropdown-item" href="<?php echo $URL;?>/views/Admin/personas/create.php">
                        <button class="btn btn-outline-secondary">
                            <img class="pluscert" src="<?php echo $URL;?>/lib/images/cert.png" alt="Agregar certificados" style="width: 25px; height: 25px"> Agregar certificados
                        </button>
                    </a>
                    <a class="dropdown-item" href="<?php echo $URL;?>/views/Admin/personas/index.php">
                        <button class="btn btn-outline-secondary">
                            <img class="certificados" src="<?php echo $URL;?>/lib/images/cert2.png" alt="Todos los certificados" style="width: 25px; height: 25px"> Todos los certificados
                        </button>
                    </a>
                </div>
            </li>
        
        </ul>
   


          <?php else: ?>
            
          <?php endif; ?>



                




 <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto" id="bienvenido">

<div class="mr-1 mt-1">
  <?php if ($sesion_iniciada): ?>
    <h5 style="color: #294978">¡BIENVENIDO! <?php echo $rol_sesion; ?></h5>
          <?php else: ?>
            <!-- <h5 style="color: #294978">¡BIENVENIDO!</h5> -->
          <?php endif; ?>
          </div> 

  </ul>

 
  
 
  <?php if ($sesion_iniciada) { ?>
    <div class="dropdown" id="userlog">
        <div class="user-panel ml-auto mt-1 pb-2  mb-0 d-flex" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="image">
                <img src="<?php echo $URL;?>/lib/images/user2.png" style="width: 40px; height: 40px;" class="img-circle" alt="User Image">
            </div>
        </div>

        <div class="dropdown-menu" style="width: 250px; background-color: #F0F0F0;">
            <div class="mx-auto" style="width: 180px;">
                <div class="mx-auto" style="width: 145px;">
                    <p style="font-size: 15px;"><?php echo $email_sesion = $_SESSION['sesion_email'];?></p>
                </div>

                <div class="mx-auto" style="width: 100px;">
                    <img src="<?php echo $URL;?>/lib/images/user2.png" style="width: 100px;" alt="User Image">
                </div>
  
                <div class="mx-auto" style="width: 120px;">
                    <p class="mx-auto" style="text-align:center; font-size: 20px;">¡<?php echo $nombres = $_SESSION['nombres'];?>!</p>
                </div>
              </div>
                

                <div class="container mt-3" style="margin-left: 60px;">

    <div class="d-flex justify-content-start">

      <div class="btn-group mr-1" role="group">
        
      <a href="<?php echo $URL;?>/controllers/login/cerrar_sesion.php" class="nav-link p-0">
        <button class="btn btn-danger btn-sm">
          <i class="nav-icon fas fa-door-closed"></i> Cerrar sesión
        </button>
      </a>
    </div>
  </div>
  </div>
                <center><span class="text-success" style="font-size:12px; text-align:justify;">GERS S.A.S</span></center>
            </div> 
        </div>
    </div>
    
    
<?php } else { ?>

  <ul class="navbar-nav">
    <!-- Mostrar el botón de iniciar sesión si no hay sesión iniciada -->
    <li class="nav-item" id="userlog2">
        <a href="<?php echo $URL;?>/login/login.php">
            <img src="<?php echo $URL;?>/lib/images/user2.png" style="" class="btn-iniciar" alt="Logo" class="mh-100"></img>
        </a>
    </li>
  </ul>
<?php } ?>

</nav>
<!-- /.navbar -->

</div>


