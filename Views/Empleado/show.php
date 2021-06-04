<div>
	
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light w-100">
		<a href="?controller=empleado&action=register"
			class="btn btn-outline-success btn-lg"
			role="button" aria-disabled="true"><span class='material-icons md-18'>
			person_add</span>
		</a>
		<h2>Lista de Empleados</h2>
		<form class="form-inline" action="?controller=empleado&action=search" method="post">
			<input class="form-control mr-sm-2" type="search" id="nombre" name="nombre" 
				placeholder="Busqueda por nombre" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
		</form>		
	</nav>
	<br/>
	<!-- Tabla que muestra los datos del empleado -->
	<div class="table table-striped">
		<table class="table table-hover table-sm">
			<thead>
				<tr>										
					<th>Id</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Direccion</th>
					<th>Provincia</th>
					<th>Estado</th>					
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
			<!-- Muestra los datos de la tabla de empleado -->
					<?php foreach ($listaEmpleados as$empleado) {?>
					
					<tr onclick="document.location='?controller=empleado&&action=updateshow&&idEmpleado=<?php  
						echo $empleado->getId()?>'">
						<td><?php echo $empleado->getId(); ?></a> </td>
						<td><?php echo $empleado->getNombre(); ?></td>
						<td><?php echo $empleado->getApellidos(); ?></td>
						<td><?php echo $empleado->getDireccion(); ?></td>
						<td><?php echo $empleado->getProvincia(); ?></td>
						<td><?php if ($empleado->getEstado()=='checked'):?>
							Activo
						<?php  else:?>
							Inactivo
						<?php endif; ?></td>
						<td><span class='material-icons md-18'>
						<a href="?controller=empleado&&action=delete&&id=<?php 
						echo $empleado->getId() ?>">delete</a></span></td>
					</tr>
					<?php } ?>
			</tbody>
			
		</table>

	</div>	

</div>