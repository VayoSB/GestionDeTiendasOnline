<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["nombre"] ?? null) {
?>
<div>	
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light w-100">
		<a href="?controller=inventario&action=register"
			class="btn btn-outline-primary btn-lg"
			role="button" aria-disabled="true"><span class='material-icons md-18 p-1'>
			add_box</span>
		</a>
		<h4>Lista Inventario</h4>
		<form class="form-inline" action="?controller=inventario&action=search" method="post">
			<input class="form-control mr-sm-2" type="search" id="nombre_producto" name="nombre_producto" 
				placeholder="Busqueda por nombre" aria-label="Search">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
		</form>		
	</nav>
	<br/>
	<!-- Tabla que muestra los datos del inventario -->
	<div class="table table-striped pl-2 pr-2">
		<table class="table table-hover table-sm">
			<thead>
				<tr>										
					<th>Id</th>
					<th>Nombre Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Descripción</th>
					<th>Tienda</th>					
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody style="cursor: pointer;">
			<!-- Muestra los datos de la tabla inventario -->
					<?php foreach ($listaInventario as$inventario) {?>
					
					<tr onclick="document.location='?controller=inventario&&action=updateInventario&&id_inventario=<?php  
						echo $inventario->getIdInventario()?>'">
						<td><?php echo $inventario->getIdInventario(); ?></a> </td>
						<td><?php echo $inventario->getNombreProducto(); ?></td>
						<td><?php echo $inventario->getPrecio(); ?></td>
						<td><?php echo $inventario->getCantidad(); ?></td>
						<td><?php echo $inventario->getDescripcion(); ?></td>
						<td><?php echo $inventario->getTienda(); ?></td>
						<td><span class='material-icons md-18'>
						<a href="?controller=inventario&&action=delete&&id_inventario=<?php 
						echo $inventario->getIdInventario() ?>" style="color:#195176;">delete</a></span></td>
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