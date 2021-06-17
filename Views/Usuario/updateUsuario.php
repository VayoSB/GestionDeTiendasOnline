<?php 
  if(!isset($_SESSION)) { 
    session_start(); 
  } 
  if($_SESSION["nombre"] ?? null) {
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?controller=index&action=index">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?controller=usuario&&action=showUsuario">Usuarios</a></li>
  </ol>
</nav>

<div class="card container mt-2">
	<h2 class="align-self-center p-2">Actualizar Usuario <?php echo $usuario->getNombreUsuario() ?> 
	</h2>
	<!-- Muestra el formulario con los datos a actualizar -->
	<form action="?controller=usuario&&action=update" method="POST">
		<table class="table">
			<tr>
				<input type="hidden" name="id_usuario" value="<?php echo $usuario->getIdUsuario() ?>" >
				
				<td class="form-group">
					<label for="text">Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control" 
						value="<?php echo $usuario->getNombre() ?>">
				</td>

				<td class="form-group">
					<label for="text">Nombre Usuario</label>
					<input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" 
						value="<?php echo $usuario->getNombreUsuario(); ?>">
				</td>

				<td class="form-group">
					<label for="text">Password</label>
					<input type="password" name="password" id="password" class="form-control" 
						value="<?php echo $usuario->getPassword(); ?>">
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