<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 
    if($_SESSION["nombre"] ?? null) {
?>
<!-- Cabecera de la página -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <img style="width: 12%;" src="../TiendaBootstrap/images/LogoGetio.png">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="?controller=empleado&action=index" style="color:#195176;">
          <span class="material-icons align-middle">home</span>Inicio</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="?controller=empleado&&action=show" style="color:#195176;">
            <span class="material-icons align-middle">work</span>Empleados</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="" style="color:#195176;">
            <span class="material-icons align-middle">store</span>Departamentos</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="" style="color:#195176;">
            <span class="material-icons align-middle">inventory</span>Inventario</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="" style="color:#195176;">
            <span class="material-icons align-middle">people_alt</span>Clientes</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="?controller=empleado&&action=logout" style="color:#195176;">
            <span class="material-icons align-middle">logout</span>Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
  } else echo "<h1></h1>";
?>