<?php 
  if(!isset($_SESSION)) { 
    session_start(); 
  } 
  if($_SESSION["nombre"] ?? null) {
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?controller=index&action=index">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?controller=empleado&&action=showEmpleado">Empleados</a></li>
  </ol>
</nav>

<div class="card container mt-2">
	<h2 class="align-self-center p-2">Actualizar Empleado <?php echo $empleado->getNombre() ?> 
		<?php echo $empleado->getApellidos() ?>
	</h2>
	<!-- Muestra el formulario con los datos a actualizar -->
	<form action="?controller=empleado&&action=update" method="POST">
		<table class="table">
			<tr>
				<input type="hidden" name="id" value="<?php echo $empleado->getId() ?>" >
				
				<td class="form-group">
					<label for="text">Nombres</label>
					<input type="text" name="nombre" id="nombre" class="form-control" 
						value="<?php echo $empleado->getNombre() ?>">
				</td>

				<td class="form-group">
					<label for="text">Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control" 
						value="<?php echo $empleado->getApellidos(); ?>">
				</td>

				<td class="form-group">
					<label for="text">Direccion</label>
					<input type="text" name="direccion" id="direccion" class="form-control" 
						value="<?php echo $empleado->getDireccion(); ?>">
				</td>
				<td class="form-group" style="display:none;">
					<label for="text">Tienda</label>
					<input type="text" name="id_tienda" id="id_tienda" class="form-control" 
						value="<?php echo $empleado->getTienda(); ?>">
				</td>				
				<td class="check-box">
					<label>Activo <input type="checkbox" name="estado" <?php echo $empleado->getEstado() ?>>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<button type="submit" class="btn btn-outline-primary">Actualizar</button>
				</td>
			</tr>
		</table>
	</form>
</div>

<?php
  } else require_once('Views/Errores/accesoDenegado.php');
?>