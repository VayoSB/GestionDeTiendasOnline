<?php 
/**
* Vista modelo empleado
*/
class Empleado
{
	private $id;
	private $nombre;
	private $apellidos;
	private $direccion;
	private $tienda;
	private $provincia;
	private $estado;

	//Constructor del empleado
	function __construct($id, $nombre, $apellidos, $direccion, $provincia, $estado, $id_tienda)
	{
		$this->setId($id);
		$this->setNombre($nombre);
		$this->setApellidos($apellidos);
		$this->setDireccion($direccion);
		$this->setProvincia($provincia);
		$this->setEstado($estado);	
		$this->setTienda($id_tienda);		
	}

	//Getters y setters de empleado
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getProvincia(){
		return $this->provincia;
	}

	public function setProvincia($provincia){
		$this->provincia = $provincia;
	}

	public function getTienda(){
		return $this->tienda;
	}

	public function setTienda($tienda){
		$this->tienda = $tienda;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getEstado(){

		return $this->estado;
	}

	public function setEstado($estado){
		
		if (strcmp($estado, 'on')==0) {
			$this->estado=1;
		} elseif(strcmp($estado, '1')==0) {
			$this->estado='checked';
		}elseif (strcmp($estado, '0')==0) {
			$this->estado='off';
		}else {
			$this->estado=0;
		}
	}

	// Inserta valores nuevos a la tabla empleado	 
	public static function save($empleado){
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO empleado VALUES (NULL, :nombre,:apellidos,:id_provincia,
			:direccion,:estado,:id_tienda)');

		$insert->bindValue('nombre',$empleado->getNombre());
		$insert->bindValue('apellidos',$empleado->getApellidos());
		$insert->bindValue('id_provincia',$empleado->getProvincia());
		$insert->bindValue('direccion',$empleado->getDireccion());		
		$insert->bindValue('estado',$empleado->getEstado());
		$insert->bindValue('id_tienda',$empleado->getTienda());
		$insert->execute();

	}

	/* Hace una consulta devolviendo los datos del empleado
	 * y ordenándolos por su id
	 */
	public static function all(){
		$db=Db::getConnect();
		$listaEmpleados=[];

		$select=$db->query('SELECT * 
							FROM empleado INNER JOIN provincia
							ON empleado.id_provincia = provincia.id_provincia; 
							ORDER BY id');

		foreach($select->fetchAll() as $empleado){
			$listaEmpleados[]=new Empleado($empleado['id'],$empleado['nombre'],$empleado['apellidos'],
				$empleado['direccion'],$empleado['nombre_provincia'],$empleado['estado'],$empleado['id_tienda']);
		}
		
		return $listaEmpleados;
	}

	//Hace búsquedas por el nombre
	public static function searchByName($name){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM empleado INNER JOIN provincia
							  ON empleado.id_provincia = provincia.id_provincia 
							  WHERE nombre=:nombre');
		$select->bindValue('nombre',$name);
		$select->execute();

		$empleadoDb=$select->fetch();

		$empleado = new Empleado ($empleadoDb['id'],$empleadoDb['nombre'], $empleadoDb['apellidos'], 
							  $empleadoDb['direccion'], $empleadoDb['nombre_provincia'], 
							  $empleadoDb['estado'],$empleadoDb['id_tienda']);
	
		return $empleado;

	}

	//Hace búsquedas por el id
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM empleado INNER JOIN provincia
							  ON empleado.id_provincia = provincia.id_provincia 
							  WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$empleadoDb=$select->fetch();


		$empleado = new Empleado ($empleadoDb['id'],$empleadoDb['nombre'], $empleadoDb['apellidos'], 
							  $empleadoDb['direccion'], $empleadoDb['nombre_provincia'], 
							  $empleadoDb['estado'],$empleadoDb['id_tienda']);
							  
		return $empleado;

	}

	//Actualiza los valores de la tabla empleado
	public static function update($empleado){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE empleado SET nombre=:nombre, apellidos=:apellidos,
			direccion=:direccion, estado=:estado WHERE id=:id');
		$update->bindValue('nombre', $empleado->getNombre());
		$update->bindValue('apellidos',$empleado->getApellidos());
		$update->bindValue('direccion',$empleado->getDireccion());
		$update->bindValue('estado',$empleado->getEstado());
		$update->bindValue('id',$empleado->getId());
		$update->execute();
	}

	//Borra a un empleado por su id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM empleado WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>