<?php 
/**
* Vista controlador Usuario
*/
class UsuarioController
{
	
	function __construct() {
		
	}
	
	//Función que redirige a la página de registro
	function register(){
		require_once('Views/Usuario/registerUsuario.php');
	}

	//Función que registra un nuevo usuario
	function save(){
		
		$usuario= new Usuario(null, $_POST['nombre'],$_POST['nombre_usuario'],$_POST['password']);

		Usuario::save($usuario);
		$this->showUsuario();
	}

	//Función que muestra los usuarios registrados
	function showUsuario(){
		$listaUsuarios=Usuario::all();

		require_once('Views/Usuario/showUsuario.php');
	}

	//Obtiene el id del usuario y después redirige a la página de actualizar el usuario
	function updateUsuario(){
		$id_usuario=$_GET['id_usuario'];
		$usuario=Usuario::searchById($id_usuario);
		require_once('Views/Usuario/updateUsuario.php');
	}

	//Función que permite actualizar los valores del usuario
	function update(){
		$usuario = new Usuario($_POST['id_usuario'],$_POST['nombre'],$_POST['nombre_usuario'],
			$_POST['password']);
		Usuario::update($usuario);
		$this->showUsuario();
	}

	//Función que borra un usuario
	function delete(){
		$id_usuario=$_GET['id_usuario'];
		Usuario::delete($id_usuario);
		$this->showUsuario();
	}

	//Función que permite buscar por el nombre de la usuario
	function search(){
		if (!empty($_POST['nombre_usuario'])) {
			$nombreUsuario=$_POST['nombre_usuario'];
			$usuario=Usuario::searchByName($nombreUsuario);
			$listaUsuarios[]=$usuario;
			
			require_once('Views/Usuario/showUsuario.php');
		} else {
			$listaUsuarios=Usuario::all();
			
			require_once('Views/Usuario/showUsuario.php');
		}		
	}
}

?>