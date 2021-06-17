<?php
  $db=Db::getConnect();

  if(!isset($_SESSION)) { 
    session_start(); 
  } 
  if($_SESSION["nombre"] ?? null) {
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?controller=index&action=index">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?controller=usuario&&action=showUsuario">Usuarios</a></li>
  </ol>
</nav>

<div class="card container mt-3">
  <h2 class="align-self-center p-2">Registro de Usuario</h2>
  
  <!-- Formulario de registro -->
  <form action="?controller=usuario&&action=save" method="POST">
  <table class="table">
    <tr>
      <td class="form-group">
        <label for="text">Nombre:</label>
        <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre" 
          name="nombre">
      </td>
      <td class="form-group" colspan="2">
        <label for="text">Nombre Usuario:</label>
        <input type="text" name="nombre_usuario" class="form-control" placeholder="Ingrese el nombre de usuario">
      </td>
    </tr>    
    <tr>
      <td class="form-group">
        <label for="text">Contraseña:</label>
        <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
      </td>
    </tr>  
    <tr> 
      <td colspan="3">
        <button type="submit" class="btn btn-outline-primary">Guardar</button>
      </td>
    </tr>    
  </table>
  </form>  
</div>

<?php
  } else require_once('Views/Errores/accesoDenegado.php');
?>