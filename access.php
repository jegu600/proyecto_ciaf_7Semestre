<?php
    session_start();
    
    if(!isset($_SESSION['id_usu'])){
        header("Location: index.php");
    }
    
    $usuario      = $_SESSION['usuario'];
    $nombre       = $_SESSION['nombre'];
    $tipo_usu     = $_SESSION['tipo_usu'];

?>

<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/fed2435e21.js" crossorigin="anonymous"></script>
    <title></title>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="menu/style.css" />
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="img/" width="100" height="100" alt=""></i>
      </div>

      <!--<div class="search_bar">
        <input type="text" placeholder="Buscar..." />
      </div>-->

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class="fa-solid fa-sun" id="darkLight"></i><!--<i class='bx bx-sun' id="darkLight"></i>-->
        <a href="logout.php"> <i class="fa-solid fa-door-open"></i></a>
        <img src="img/" width="100" height="100" alt="" class="profile" />
      </div>
    </nav>

    <!--************************MENÚ ENCUESTAS DE CAMPO************************-->
    <?php if($tipo_usu == 1) { ?>
    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>
          <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
          <!-- start -->
          <hr style="border: 1px solid #F3840D; border-radius: 5px;">
          <strong>Formatos-></strong>
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
               <i class="fa-solid fa-people-roof"></i>
                <!--<i class="bx bx-home-alt"></i>-->
              </span>

              <span class="navlink">Productos</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="form/productos/additem.php" class="nav_link sublink">Registrar</a>
              <a href="form/productos/showitem.php" class="nav_link sublink">Editar</a>
            </ul>
          </li>
      
          <hr style="border: 1px solid #F3840D; border-radius: 5px;">
          <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
          <!-- start -->
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="fa-solid fa-screwdriver-wrench"></i>
              </span>
              <span class="navlink">Mi Cuenta</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="reset-password.php" class="nav_link sublink">Cambiar Contraseña</a>
            </ul>
          </li>
        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>
    <?php } ?>


<!--************************MENÚ ENCUESTAS DE CAMPO************************-->
    <?php if($tipo_usu == 2) { ?>
    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>
          <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
          <!-- start -->
          
        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>
    <?php } ?>

    <!-- JavaScript -->
    <script src="menu/script.js"></script>
  </body>
</html>
