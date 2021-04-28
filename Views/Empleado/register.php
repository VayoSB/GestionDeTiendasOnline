<div class="container">
  <h2>Registro de Empleado</h2>
  
  <!-- Formulario de registro -->
  <form action="?controller=empleado&&action=save" method="POST">
    <div class="form-group">
      <label for="text">Nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" 
        name="nombre">
    </div>

    <div class="form-group">
      <label for="text">Apellidos:</label>
      <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos">
    </div>

    <div class="form-group">
      <label for="text">Direccion:</label>
      <input type="text" name="direccion" class="form-control" placeholder="Ingrese su direccion">
    </div>

    <div class="form-group">
      <label for="text">Id Provincia:</label>
      <input type="number" name="id_provincia" class="form-control" placeholder="Ingrese el id de su provincia">
    </div>
    
    <div class="check-box">
      <label>Activo <input type="checkbox" name="estado"></label>      
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>