<?php 
  if(!isset($_SESSION)) { 
    session_start(); 
  } 
  if($_SESSION["nombre"] ?? null) {
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?controller=index&action=index">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?controller=tienda&&action=showTienda">Tiendas</a></li>
  </ol>
</nav>

<div class="card container mt-2">
	<h2 class="align-self-center p-2">Actualizar Tienda <?php echo $tienda->getIdTienda() ?> 
		<?php echo $tienda->getNombreTienda() ?>
	</h2>
	<!-- Muestra el formulario con los datos a actualizar -->
	<form action="?controller=tienda&&action=update" method="POST">
		<table class="table">
			<tr>
				<input type="hidden" name="id_tienda" value="<?php echo $tienda->getIdTienda() ?>" >
				
				<td class="form-group">
					<label for="text">Nombre Tienda</label>
					<input type="text" name="nombre_tienda" id="nombre_tienda" class="form-control" 
						value="<?php echo $tienda->getNombreTienda() ?>">
				</td>

				<td class="form-group">
					<label for="text">Direccion</label>
					<input type="text" name="direccion" id="direccion" class="form-control" 
						value="<?php echo $tienda->getDireccion(); ?>">
				</td>

				<td class="form-group">
					<label for="text">Código Postal</label>
					<input type="text" name="codigo_postal" id="codigo_postal" class="form-control" 
						value="<?php echo $tienda->getCodigoPostal(); ?>">
				</td>
				<td class="form-group" style="display:none;">
					<label for="text">Teléfono</label>
					<input type="text" name="telefono" id="telefono" class="form-control" 
						value="<?php echo $tienda->getTelefono(); ?>">
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