<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["nombre"] ?? null) {
    require_once('../TiendaBootstrap/Views/Layouts/cabecera.php');
?>

<div class="card text-center">
  <h5 class="card-header">Gestión de Tiendas Online</h5>
</div>

<div class="row align-items-start p-3">
  <div class="card ml-4 mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">badge</span>Lista de Empleados</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los empleados y gestionarlos.</p>
      <a href="?controller=empleado&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        person_add</span>
		  </a>
      <a href="?controller=empleado&action=showEmpleado" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">work</span>Empleados</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">business</span>Tiendas</h5>
      <p class="card-text text-justify">Aquí podrá consultar todas las tiendas y gestionarlas.</p>
      <a href="?controller=tienda&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        add_business</span>
		  </a>
      <a href="?controller=tienda&action=showTienda" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">store</span>Tiendas</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">inventory</span>Inventario</h5>
      <p class="card-text text-justify">Aquí podrá consultar todo el inventario y gestionarlo.</p>
      <a href="?controller=inventario&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        add_box</span>
		  </a>
      <a href="?controller=inventario&action=showInventario" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">inventory</span>Inventario</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">people_alt</span>Usuarios</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los usuario y gestionarlos.</p>
      <a href="?controller=usuario&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        person_add</span>
		  </a>
      <a href="?controller=usuario&action=showUsuario" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">people_alt</span>Usuarios</a>
    </div>
  </div>
</div>

<?php
  } else require_once('Views/Errores/accesoDenegado.php');
?>