<!-- Aquí se realizan las conexiones -->
<?php 
	require_once('connection.php');

	if (isset($_GET['controller']) && isset($_GET['action'])) {
		
		$controller=$_GET['controller'];
		$action=$_GET['action'];
	}else{
		$controller='index';
		$action='login';
	}
	require_once('Views/Layouts/layout.php');	
?>