<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["nombre"] ?? null) {
?>
<div>	
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light w-100">
		<a href="?controller=tienda&action=register"
			class="btn btn-outline-primary btn-lg"
			role="button" aria-disabled="true"><span class='material-icons md-18 p-1'>
			add_business</span>
		</a>
		<h4>Lista de Tiendas</h4>
		<form class="form-inline" action="?controller=tienda&action=search" method="post">
			<input class="form-control mr-sm-2" type="search" id="nombre_tienda" name="nombre_tienda" 
				placeholder="Busqueda por nombre" aria-label="Search">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
		</form>		
	</nav>
	<br/>
	<!-- Tabla que muestra los datos de la tienda -->
	<div class="table table-striped pl-2 pr-2">
		<table class="table table-hover table-sm">
			<thead>
				<tr>										
					<th>Id</th>
					<th>Nombre Tienda</th>
					<th>Dirección</th>
					<th>Código Postal</th>
					<th>Teléfono</th>
					<th>Provincia</th>					
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody style="cursor: pointer;">
			<!-- Muestra los datos de la tabla tienda -->
					<?php foreach ($listaTiendas as$tienda) {?>
					
					<tr onclick="document.location='?controller=tienda&&action=updateTienda&&id_tienda=<?php  
						echo $tienda->getIdTienda()?>'">
						<td><?php echo $tienda->getIdTienda(); ?></a> </td>
						<td><?php echo $tienda->getNombreTienda(); ?></td>
						<td><?php echo $tienda->getDireccion(); ?></td>
						<td><?php echo $tienda->getCodigoPostal(); ?></td>						
						<td><?php echo $tienda->getTelefono(); ?></td>
						<td><?php echo $tienda->getProvincia(); ?></td>
						<td><span class='material-icons md-18'>
						<a href="?controller=tienda&&action=delete&&id_tienda=<?php 
						echo $tienda->getIdTienda() ?>" style="color:#195176;">delete</a></span></td>
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