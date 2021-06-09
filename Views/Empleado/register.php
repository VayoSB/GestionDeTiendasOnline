<?php
  $db=Db::getConnect();
?>

<div class="card container mt-3">
  <h2 class="align-self-center p-2">Registro de Empleado</h2>
  
  <!-- Formulario de registro -->
  <form action="?controller=empleado&&action=save" method="POST">
  <table class="table">
    <tr>
      <td class="form-group">
        <label for="text">Nombre:</label>
        <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" 
          name="nombre">
      </td>
      <td class="form-group" colspan="2">
        <label for="text">Apellidos:</label>
        <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos">
      </td>
    </tr>    
    <tr>
      <td class="form-group">
        <label for="text">Direccion:</label>
        <input type="text" name="direccion" class="form-control" placeholder="Ingrese su direccion">
      </td>
      <!--
      <td class="form-group">
        <label for="text">Id Provincia:</label>
        <input type="number" name="id_provincia" class="form-control" placeholder="Ingrese el id de su provincia">
      </td>
      -->
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
      <td class="check-box">
        <label>Activo <input type="checkbox" name="estado"></label>      
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