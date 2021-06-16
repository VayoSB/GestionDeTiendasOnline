<?php 
/**
* Vista controlador Empleado
*/
class EmpleadoController
{
	
	function __construct()
	{
		
	}

	
	//Función que redirige a la página de registro
	function register(){
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
		$_POST['id_provincia'],$estado,$_POST['id_tienda']);

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
			$_POST['direccion'],$_POST['id'],$_POST['estado'],$_POST['id_tienda']);
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
}

?>