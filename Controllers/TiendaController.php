<?php 
/**
* Vista controlador Tienda
*/
class TiendaController
{
	
	function __construct() {
		
	}
	
	//Función que redirige a la página de registro
	function register(){
		require_once('Views/Tienda/registerTienda.php');
	}

	//Función que registra una nueva tienda
	function save(){
		
		$tienda= new Tienda(null, $_POST['nombre_tienda'],$_POST['direccion'],$_POST['codigo_postal'],
		$_POST['telefono'],$_POST['id_provincia']);

		Tienda::save($tienda);
		$this->showTienda();
	}

	//Función que muestra el código
	function showTienda(){
		$listaTiendas=Tienda::all();

		require_once('Views/Tienda/showTienda.php');
	}

	//Obtiene el id de la tienda y después redirige a la página de actualizar la tienda
	function updateTienda(){
		$id_tienda=$_GET['id_tienda'];
		$tienda=Tienda::searchById($id_tienda);
		require_once('Views/Tienda/updateTienda.php');
	}

	//Función que permite actualizar los valores del empleado
	function update(){
		$tienda = new Tienda($_POST['id_tienda'],$_POST['nombre_tienda'],$_POST['direccion'],
			$_POST['codigo_postal'],$_POST['telefono'],$_POST['id_provincia']);
		Tienda::update($tienda);
		$this->showTienda();
	}

	//Función que borra una tienda
	function delete(){
		$id_tienda=$_GET['id_tienda'];
		Tienda::delete($id_tienda);
		$this->showTienda();
	}

	//Función que permite buscar por el nombre de la tienda
	function search(){
		if (!empty($_POST['nombre_tienda'])) {
			$nombreTienda=$_POST['nombre_tienda'];
			$tienda=Tienda::searchByName($nombreTienda);
			$listaTiendas[]=$tienda;
			
			require_once('Views/Tienda/showTienda.php');
		} else {
			$listaTiendas=Tienda::all();
			
			require_once('Views/Tienda/showTienda.php');
		}		
	}
}

?>