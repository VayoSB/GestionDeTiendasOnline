<?php 
/**
* Vista controlador Inventario
*/
class InventarioController
{
	
	function __construct() {
		
	}
	
	//Función que redirige a la página de registro
	function register(){
		require_once('Views/Inventario/registerInventario.php');
	}

	//Función que registra el nuevo inventario
	function save(){
		$inventario= new Inventario(null, $_POST['nombre_producto'],$_POST['precio'],$_POST['cantidad'],
		$_POST['descripcion'],$_POST['id_tienda']);

		Inventario::save($inventario);
		$this->showInventario();
	}

	//Función que muestra el inventario guardado en la BD
	function showInventario(){
		$listaInventario=Inventario::all();

		require_once('Views/Inventario/showInventario.php');
	}

	//Obtiene el id del inventario y después redirige a la página de actualizar el inventario
	function updateInventario(){
		$id_inventario=$_GET['id_inventario'];
		$inventario=Inventario::searchById($id_inventario);
		require_once('Views/Inventario/updateInventario.php');
	}

	//Función que permite actualizar los valores del inventario
	function update(){
		$inventario = new Inventario($_POST['id_inventario'],$_POST['nombre_producto'],$_POST['precio'],
			$_POST['cantidad'],$_POST['descripcion'],$_POST['id_tienda']);
		Inventario::update($inventario);
		$this->showInventario();
	}

	//Función que borra un inventario
	function delete(){
		$id_inventario=$_GET['id_inventario'];
		Inventario::delete($id_inventario);
		$this->showInventario();
	}

	//Función que permite buscar por el nombre
	function search(){
		if (!empty($_POST['nombre_producto'])) {
			$nombre=$_POST['nombre_producto'];
			$inventario=Inventario::searchByName($nombre);
			$listaInventario[]=$inventario;
			
			require_once('Views/Inventario/showInventario.php');
		} else {
			$listaInventario=Inventario::all();
			
			require_once('Views/Inventario/showInventario.php');
		}		
	}
}

?>