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

<div class="row align-items-start p-2">
  <div class="card ml-4 mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">badge</span>Lista de Empleados</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los empleados y gestionarlos.</p>
      <a href="?controller=empleado&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        person_add</span>
		  </a>
      <a href="?controller=empleado&action=show" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">work</span>Empleados</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">business</span>Departamentos</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los departamentos y gestionarlos.</p>
      <a href="?controller=empleado&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        add_business</span>
		  </a>
      <a href="" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">store</span>Departamentos</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">inventory</span>Inventario</h5>
      <p class="card-text text-justify">Aquí podrá consultar todo el inventario y gestionarlo.</p>
      <a href="?controller=empleado&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        add_box</span>
		  </a>
      <a href="" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">inventory</span>Inventario</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">people_alt</span>Clientes</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los clientes y gestionarlos.</p>
      <a href="?controller=empleado&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        person_add</span>
		  </a>
      <a href="" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">people_alt</span>Clientes</a>
    </div>
  </div>
</div>

<?php
  } else require_once('Views/Empleado/accesoDenegado.php');
?>