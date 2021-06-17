<?php 

//Llama a las funciones de EmpleadoController.php para definir las rutas
$controllers=array(
	'index'=>['index','login','logout','error'],
	'empleado'=>['register','save','showEmpleado','updateEmpleado','update','delete','search'],
	'tienda'=>['register','save','showTienda','updateTienda','update','delete','search'],
	'inventario'=>['register','save','showInventario','updateInventario','update','delete','search'],
	'usuario'=>['register','save','showUsuario','updateUsuario','update','delete','search']
);

if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('index','errorRuta');
	}		
}else{
	call('index','errorLogin');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		//Con cada case se establece el nombre del controlador
		case 'index':
			$controller= new IndexController();
			break;	
		case 'empleado':
			require_once('Model/Empleado.php');
			$controller= new EmpleadoController();
			break;
		case 'tienda':
			require_once('Model/Tienda.php');
			$controller= new TiendaController();
			break;	
		case 'inventario':
			require_once('Model/Inventario.php');
			$controller= new InventarioController();
			break;			
		case 'usuario':
			require_once('Model/Usuario.php');
			$controller= new UsuarioController();
			break;	
	}
	$controller->{$action}();
}

?>