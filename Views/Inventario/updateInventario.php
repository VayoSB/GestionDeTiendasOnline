<?php 
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

<div class="card container mt-2">
	<h2 class="align-self-center p-2">Actualizar <?php echo $inventario->getNombreProducto() ?> 
	</h2>
	<!-- Muestra el formulario con los datos a actualizar -->
	<form action="?controller=inventario&&action=update" method="POST">
		<table class="table">
			<tr>
				<input type="hidden" name="id_inventario" value="<?php echo $inventario->getIdInventario() ?>" >
				
				<td class="form-group">
					<label for="text">Nombre Producto</label>
					<input type="text" name="nombre_producto" id="nombre_producto" class="form-control" 
						value="<?php echo $inventario->getNombreProducto() ?>">
				</td>

				<td class="form-group">
					<label for="text">Precio</label>
					<input type="number" name="precio" id="precio" class="form-control" 
						value="<?php echo $inventario->getPrecio(); ?>">
				</td>

				<td class="form-group">
					<label for="text">Cantidad</label>
					<input type="number" name="cantidad" id="cantidad" class="form-control" 
						value="<?php echo $inventario->getCantidad(); ?>">
				</td>		
			</tr>
			<tr>
				<td class="form-group" colspan="3">
					<label for="text">Descripción:</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" 
					id="descripcion" name="descripcion" placeholder="Ingrese la descripción">
					<?php echo $inventario->getDescripcion(); ?></textarea>
				</td>	
				<td class="form-group" style="display:none;">
					<label for="text">Tienda</label>
					<input type="text" name="id_tienda" id="id_tienda" class="form-control" 
						value="<?php echo $inventario->getTienda(); ?>">
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