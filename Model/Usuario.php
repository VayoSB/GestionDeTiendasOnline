<?php 
/**
* Vista modelo usuario
*/
class Usuario {

	private $id_usuario;
	private $nombre;
	private $nombre_usuario;
	private $password;

	//Constructor del usuario
	function __construct($id_usuario, $nombre, $nombre_usuario, $password) {
		$this->setIdUsuario($id_usuario);
		$this->setNombre($nombre);
		$this->setNombreUsuario($nombre_usuario);
		$this->setPassword($password);		
	}

	//Getters y setters de usuario
	public function getIdUsuario() {
		return $this->id_usuario;
	}

	public function setIdUsuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function getNombreUsuario() {
		return $this->nombre_usuario;
	}

	public function setNombreUsuario($nombre_usuario) {
		$this->nombre_usuario = $nombre_usuario;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}


	// Inserta valores nuevos a la tabla usuario 
	public static function save($usuario) {
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO usuario VALUES (NULL,:nombre,:nombre_usuario,:password)');

		$insert->bindValue('nombre',$usuario->getNombre());
		$insert->bindValue('nombre_usuario',$usuario->getNombreUsuario());		
		$insert->bindValue('password',$usuario->getPassword());		
		$insert->execute();

	}

	/* Hace una consulta devolviendo los datos del usuario
	 * y ordenándolos por su id
	 */
	public static function all(){
		$db=Db::getConnect();
		$listaUsuario=[];

		$select=$db->query('SELECT * 
							FROM usuario 
							ORDER BY id_usuario');

		foreach($select->fetchAll() as $usuario){
			$listaUsuario[]=new Usuario($usuario['id_usuario'],$usuario['nombre'],$usuario['nombre_usuario'],
				$usuario['password']);
		}
		
		return $listaUsuario;
	}

	//Hace búsquedas por el nombre del usuario
	public static function searchByName($name){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM usuario 
							  WHERE nombre_usuario=:nombre_usuario');
		$select->bindValue('nombre_usuario',$name);
		$select->execute();

		$usuarioDb=$select->fetch();

		$usuario = new Usuario ($usuarioDb['id_usuario'],$usuarioDb['nombre'], $usuarioDb['nombre_usuario'], 
							  $usuarioDb['password']);
	
		return $usuario;

	}

	//Hace búsquedas por el id
	public static function searchById($id_usuario){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM usuario 
							  WHERE id_usuario=:id_usuario');
		$select->bindValue('id_usuario',$id_usuario);
		$select->execute();

		$usuarioDb=$select->fetch();


		$usuario = new Usuario ($usuarioDb['id_usuario'],$usuarioDb['nombre'], $usuarioDb['nombre_usuario'], 
							  $usuarioDb['password']);
							  
		return $usuario;

	}

	//Actualiza los valores de la tabla usuario
	public static function update($usuario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuario SET nombre=:nombre, nombre_usuario=:nombre_usuario,
			password=:password WHERE id_usuario=:id_usuario');
		$update->bindValue('id_usuario',$usuario->getIdUsuario());
		$update->bindValue('nombre', $usuario->getNombre());
		$update->bindValue('nombre_usuario',$usuario->getNombreUsuario());
		$update->bindValue('password',$usuario->getPassword());
		$update->execute();
	}

	//Borra un usuario por su id
	public static function delete($id_usuario){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM usuario WHERE id_usuario=:id_usuario');
		$delete->bindValue('id_usuario',$id_usuario);
		$delete->execute();		
	}
}

?>