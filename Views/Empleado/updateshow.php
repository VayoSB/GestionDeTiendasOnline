<div class="container">
	<h2>Actualizar Empleado</h2>
	<!-- Muestra el formulario con los datos a actualizar -->
	<form action="?controller=empleado&&action=update" method="POST">
	
		<input type="hidden" name="id" value="<?php echo $empleado->getId() ?>" >
		
		<div class="form-group">
			<label for="text">Nombres</label>
			<input type="text" name="nombre" id="nombre" class="form-control" 
				value="<?php echo $empleado->getNombre() ?>">
		</div>

		<div class="form-group">
			<label for="text">Apellidos</label>
			<input type="text" name="apellidos" id="apellidos" class="form-control" 
				value="<?php echo $empleado->getApellidos(); ?>">
		</div>

		<div class="form-group">
			<label for="text">Direccion</label>
			<input type="text" name="direccion" id="direccion" class="form-control" 
				value="<?php echo $empleado->getDireccion(); ?>">
		</div>
		
		<div class="check-box">
			<label>Activo <input type="checkbox" name="estado" <?php echo $empleado->getEstado() ?>>
			</label>
		</div>

		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>
</div>