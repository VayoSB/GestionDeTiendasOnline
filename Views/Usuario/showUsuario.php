<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["nombre"] ?? null) {
?>
<div>	
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light w-100">
		<a href="?controller=usuario&action=register"
			class="btn btn-outline-primary btn-lg"
			role="button" aria-disabled="true"><span class='material-icons md-18 p-1'>
			person_add</span>
		</a>
		<h4>Lista de Usuarios</h4>
		<form class="form-inline" action="?controller=usuario&action=search" method="post">
			<input class="form-control mr-sm-2" type="search" id="nombre_usuario" name="nombre_usuario" 
				placeholder="Busqueda por nombre" aria-label="Search">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
		</form>		
	</nav>
	<br/>
	<!-- Tabla que muestra los datos del Usuario -->
	<div class="table table-striped pl-2 pr-2">
		<table class="table table-hover table-sm">
			<thead>
				<tr>										
					<th>Id</th>
					<th>Nombre</th>
					<th>Nombre Usuario</th>					
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody style="cursor: pointer;">
			<!-- Muestra los datos de la tabla de usuario -->
					<?php foreach ($listaUsuarios as$usuario) {?>
					
					<tr onclick="document.location='?controller=usuario&&action=updateUsuario&&id_usuario=<?php  
						echo $usuario->getIdUsuario()?>'">
						<td><?php echo $usuario->getIdUsuario(); ?></a> </td>
						<td><?php echo $usuario->getNombre(); ?></td>
						<td><?php echo $usuario->getNombreUsuario(); ?></td>
						<td><span class='material-icons md-18'>
						<a href="?controller=usuario&&action=delete&&id_usuario=<?php 
						echo $usuario->getIdUsuario() ?>" style="color:#195176;">delete</a></span></td>
					</tr>
					<?php } ?>
			</tbody>			
		</table>
	</div>	
	<nav class="nav justify-content-end mr-2" aria-label="Page navigation example">
  		<ul class="pagination">
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>	
			</li>
		</ul>
	</nav>
</div>

<?php
  }else require_once('Views/Errores/accesoDenegado.php');
?>