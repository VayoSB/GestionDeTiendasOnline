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
    <li class="breadcrumb-item"><a href="?controller=inventario&&action=showInventario">Inventario</a></li>
  </ol>
</nav>

<div class="card container mt-3">
  <h2 class="align-self-center p-2">Registro de Inventario</h2>
  
  <!-- Formulario de registro -->
  <form action="?controller=inventario&&action=save" method="POST">
  <table class="table">
    <tr>
      <td class="form-group">
        <label for="text">Nombre Producto:</label>
        <input type="text" class="form-control" id="nombre_producto" placeholder="Ingrese el nombre del producto" 
          name="nombre_producto">
      </td>
      <td class="form-group" colspan="2">
        <label for="text">Precio:</label>
        <input type="number" name="precio" class="form-control" placeholder="Ingrese el precio del producto">
      </td>
    </tr>    
    <tr>
      <td class="form-group">
        <label for="id_tienda">Tienda:</label>
        <select class="form-control" name="id_tienda">
        <option value="">Seleccione la tienda:</option>
        <?php
          $query = $db->prepare("SELECT * FROM tienda");
          $query->execute();
          $data = $query->fetchAll();

          foreach ($data as $valores):
            echo '<option value="'.$valores["id_tienda"].'">'.$valores["nombre_tienda"].'</option>';
          endforeach;
        ?>
        </select>
        <label for="text">Cantidad:</label>
        <input type="number" name="cantidad" class="form-control" placeholder="Ingrese la cantidad">
      </td>
      <td class="form-group">
        <label for="text">Descripción:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" 
        id="descripcion" name="descripcion" placeholder="Ingrese la descripción"></textarea>
      </td>
    </tr>  
    <tr>
      
    </tr>
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