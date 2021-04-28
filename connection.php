<?php 
/**
* Se realiza la conexión a la base de datos
*/
class Db
{
	private static $instance=NULL;
	
	function __construct(){}

	public static function  getConnect(){
		if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$instance= new PDO('mysql:host=localhost;dbname=tienda','root','',$pdo_options);
		} 
		return self::$instance;
	}
}
?>