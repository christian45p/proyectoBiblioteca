<?php
    $metodo=$this->router->fetch_method();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $titulo; ?></title>  
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/vendor/fontawesome-free/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
         <link rel="icon" type="image/png" href="<?php echo base_url();?>assests/images/favicon.png">
        <!-- Custom styles for this template-->    
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/css/sb-admin-2.min.css">
         <link href="<?php echo base_url();?>assests/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assests/select2/css/select2.min.css" rel="stylesheet" />

</head>

<body>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" style="background: #15202B;" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>index.php/usuario/index">
        <div class="sidebar-brand-icon rotate-n-45">
          <i class="fas fa-laugh-wink <?php if($metodo=='index') echo 'active';?>"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SisBiblio</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($metodo=='index') echo 'active';?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/usuario/index">
          <i class="fas fa-plus-circle"></i>
          <span class="text-white">Portada</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        USUARIO
      </div>


      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($metodo=='buscarLibro') echo 'active';?>">

        <a class="nav-link" href="<?php echo base_url().'index.php/usuario/buscarLibro/';?>">
          <i class="fas fa-fw fa-search"></i>
          <span class="text-white">Buscar Libro</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($metodo=='librosPrestados') echo 'active';?>">
        <a class="nav-link" href="<?php echo base_url().'index.php/usuario/librosPrestados/';?>">
          <i class="fas fa-fw fa-book"></i>
          <span class="text-white">Libros Prestados</span></a>
      </li>
            <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($metodo=='misLibrosFavoritos') echo 'active';?>">
        <a class="nav-link" href="<?php echo base_url().'index.php/usuario/misLibrosFavoritos/';?>">
          <i class="fas fa-fw fa-thumbs-up"></i>
          <span class="text-white">Mis libros Favoritos</span></a>
      </li>
            <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($metodo=='historialDeBusqueda') echo 'active';?>">
        <a class="nav-link" href="<?php echo base_url().'index.php/usuario/historialDeBusqueda/';?>">
          <i class="fas fa-fw fa-history"></i>
          <span class="text-white">Historial de Busqueda</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($metodo=='datosDeUsuario') echo 'active';?>">
        <a class="nav-link" href="<?php echo base_url().'index.php/usuario/datosDeUsuario/';?>">
          <i class="fas fa-fw fa-user-secret"></i>
          <span class="text-white">Datos de Usuario</span></a>
      </li>

      <!-- Divider -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
 <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombreDelUsuario;?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url();?>assests/images/usuario.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url().'index.php/usuario/datosDeUsuario/';?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-dark-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>

  <!-- Logout Modal-->
  <div class="container-fluid">

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: #15202B;">
          <h5 class="modal-title text-white" id="exampleModalLabel">¿En serio quiere salir?</h5>
          <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body text-dark">Selecciona "Salir" abajo si estás listo para terminar su actual sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary text-white" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn text-white" style="background: #15202B;" href="<?php echo base_url();?>administrador/salir">Salir</a>
        </div>
      </div>
    </div>
  </div>
<script  src="<?php echo base_url();?>assests/jquery-3.4.1.min.js"></script>
