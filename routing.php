<?php 

//Llama a las funciones de EmpleadoController.php para definir las rutas
$controllers=array(
	'empleado'=>['login','index','register','save','show','updateshow','update',
		'delete','search','error','logout']
);

if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('empleado','error');
	}		
}else{
	call('empleado','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		//Con cada case se establece el nombre del controlador
		case 'empleado':
		require_once('Model/Empleado.php');
		$controller= new UsuarioController();
		break;			
		default:
				# code...
		break;
	}
	$controller->{$action}();
}

?>