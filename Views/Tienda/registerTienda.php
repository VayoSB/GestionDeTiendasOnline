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
    <li class="breadcrumb-item"><a href="?controller=tienda&action=showTienda">Tiendas</a></li>
  </ol>
</nav>

<div class="card container mt-3">
  <h2 class="align-self-center p-2">Registro de Tienda</h2>
  
  <!-- Formulario de registro -->
  <form action="?controller=tienda&&action=save" method="POST">
  <table class="table">
    <tr>
      <td class="form-group">
        <label for="text">Nombre Tienda:</label>
        <input type="text" class="form-control" id="nombre_tienda" placeholder="Ingrese el nombre de la tienda" 
          name="nombre_tienda">
      </td>
      <td class="form-group" colspan="2">
        <label for="text">Dirección:</label>
        <input type="text" name="direccion" class="form-control" placeholder="Ingrese la dirección">
      </td>
    </tr>    
    <tr>
      <td class="form-group">
        <label for="text">Código Postal:</label>
        <input type="text" name="codigo_postal" class="form-control" placeholder="Ingrese el código postal">
      </td>
      <td class="form-group">
      <label for="id_provincia">Provincia:</label>
      <select class="form-control" name="id_provincia">
      <option value="">Seleccione provincia:</option>
      <?php
        $query = $db->prepare("SELECT * FROM provincia");
        $query->execute();
        $data = $query->fetchAll();

        foreach ($data as $valores):
          echo '<option value="'.$valores["id_provincia"].'">'.$valores["nombre_provincia"].'</option>';
        endforeach;
      ?>
      </select>
      </td>
      <td class="form-group">
        <label for="text">Teléfono:</label>
        <input type="text" name="telefono" class="form-control" placeholder="Ingrese el teléfono">
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