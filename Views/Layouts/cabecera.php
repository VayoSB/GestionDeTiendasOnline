<!-- Cabecera de la página -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="nav-link-primary" href="?controller=empleado&action=index" style="color:#195176;">          
    <img src="../TiendaBootstrap/images/LogoGetio.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <!--
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="?controller=empleado&action=index" style="color:#195176;">
          <span class="material-icons align-middle">home</span>Inicio</a>
        </li>
      </ul> -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2 ml-2" href="?controller=empleado&&action=show" style="color:#195176;">
            <span class="material-icons md-18 align-middle">work</span>Empleados</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="" style="color:#195176;">
            <span class="material-icons md-18 align-middle">store</span>Departamentos</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="" style="color:#195176;">
            <span class="material-icons md-18 align-middle">inventory</span>Inventario</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="" style="color:#195176;">
            <span class="material-icons md-18 align-middle">people_alt</span>Clientes</a>
        </li>
      </ul>      
    </div>
  </div>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav float-right">
      <li class="nav-item">
        <a class="nav-link-primary p-1" href="?controller=empleado&&action=logout" style="color:#195176;">
        <span class="material-icons md-18 align-middle">logout</span>Salir</a>
      </li>
    </ul>
  </div>
</nav>

