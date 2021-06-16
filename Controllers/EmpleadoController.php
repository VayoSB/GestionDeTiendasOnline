<?php 
/**
* Vista controlador Empleado
*/
class UsuarioController
{
	
	function __construct()
	{
		
	}

	//Función que redirige a la página de bienvenida
	function index(){
		require_once('Views/bienvenido.php');
	}

	//Función que redirige a la página de login
	function login() {
		require_once('Views/Login/login.php');
	}

	//Función que redirige a la página de login
	function logout() {
		require_once('Views/Login/logout.php');
	}

	//Función que redirige a la página de registro
	function registerEmpleado(){
		require_once('Views/Empleado/registerEmpleado.php');
	}

	//Función que registra el nuevo empleado
	function save(){
		if (!isset($_POST['estado'])) {
			$estado="off";
		}else{
			$estado="on";
		}
		$empleado= new Empleado(null, $_POST['nombre'],$_POST['apellidos'],$_POST['direccion'],
		$_POST['id_provincia'],$estado);

		Empleado::save($empleado);
		$this->showEmpleado();
	}

	//Función que muestra el código
	function showEmpleado(){
		$listaEmpleados=Empleado::all();

		require_once('Views/Empleado/showEmpleado.php');
	}

	//Obtiene el id del empleado y después redirige a la página de actualizar el empleado
	function updateEmpleado(){
		$id=$_GET['idEmpleado'];
		$empleado=Empleado::searchById($id);
		require_once('Views/Empleado/updateEmpleado.php');
	}

	//Función que permite actualizar los valores del empleado
	function update(){
		$empleado = new Empleado($_POST['id'],$_POST['nombre'],$_POST['apellidos'],
			$_POST['direccion'],$_POST['id'],$_POST['estado']);
		Empleado::update($empleado);
		$this->showEmpleado();
	}

	//Función que borra un empleado
	function delete(){
		$id=$_GET['id'];
		Empleado::delete($id);
		$this->showEmpleado();
	}

	//Función que permite buscar por el nombre
	function search(){
		if (!empty($_POST['nombre'])) {
			$nombre=$_POST['nombre'];
			$empleado=Empleado::searchByName($nombre);
			$listaEmpleados[]=$empleado;
			
			require_once('Views/Empleado/showEmpleado.php');
		} else {
			$listaEmpleados=Empleado::all();
			
			require_once('Views/Empleado/showEmpleado.php');
		}		
	}

	//Función que muestra una página de error
	function error(){
		require_once('Views/Errores/error.php');
	}
}

?>