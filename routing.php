<?php 

//Llama a las funciones de EmpleadoController.php para definir las rutas
$controllers=array(
	'empleado'=>['register','save','showEmpleado','updateEmpleado','update',
		'delete','search'],
	'index'=>['index','login','logout','error']
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
		case 'empleado':
			require_once('Model/Empleado.php');
			$controller= new EmpleadoController();
			break;
		case 'index':
			require_once('Model/Empleado.php');
			$controller= new IndexController();
			break;			
		default:
				# code...
			break;
	}
	$controller->{$action}();
}

?>