<div class="container">
	<h2>Lista de Empleados</h2>
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light">
		<form class="form-inline" action="?controller=empleado&action=search" method="post">
			<input class="form-control mr-sm-2" type="search" id="nombre" name="nombre" 
				placeholder="Busqueda por nombre" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
		</form>
	</nav>

	<!-- Tabla que muestra los datos del empleado -->
	<div class="table table-striped">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Direccion</th>
					<th>Provincia</th>
					<th>Estado</th>					
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
			<!-- Muestra los datos de la tabla de empleado -->
					<?php foreach ($listaEmpleados as$empleado) {?>
					
					<tr>
						<td> <a href="?controller=empleado&&action=updateshow&&idEmpleado=<?php  
							echo $empleado->getId()?>"> <?php echo $empleado->getId(); ?></a> </td>
						<td><?php echo $empleado->getNombre(); ?></td>
						<td><?php echo $empleado->getApellidos(); ?></td>
						<td><?php echo $empleado->getDireccion(); ?></td>
						<td><?php echo $empleado->getProvincia(); ?></td>
						<td><?php if ($empleado->getEstado()=='checked'):?>
							Activo
						<?php  else:?>
							Inactivo
						<?php endif; ?></td>
						<td><button type="button" class="btn btn-outline-info">
						<a href="?controller=empleado&&action=delete&&id=<?php echo $empleado->getId() ?>">Eliminar</a></button></td>
					</tr>
					<?php } ?>
			</tbody>
			
		</table>

	</div>	

</div>