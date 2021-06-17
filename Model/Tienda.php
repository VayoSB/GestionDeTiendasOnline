<?php 
/**
* Vista modelo tienda
*/
class Tienda
{
	private $id_tienda;
	private $nombre_tienda;
	private $direccion;
	private $codigo_postal;
	private $telefono;
	private $provincia;

	//Constructor de la tienda
	function __construct($id_tienda, $nombre_tienda, $direccion, $codigo_postal, $telefono,$provincia) {
		$this->setIdTienda($id_tienda);
		$this->setNombreTienda($nombre_tienda);
		$this->setDireccion($direccion);
		$this->setCodigoPostal($codigo_postal);
		$this->setTelefono($telefono);	
		$this->setProvincia($provincia);			
	}

	//Getters y setters de tienda
	public function getIdTienda() {
		return $this->id_tienda;
	}

	public function setIdTienda($id_tienda) {
		$this->id_tienda = $id_tienda;
	}

	public function getNombreTienda() {
		return $this->nombre_tienda;
	}

	public function setNombreTienda($nombre_tienda) {
		$this->nombre_tienda = $nombre_tienda;
	}

	public function getDireccion() {
		return $this->direccion;
	}

	public function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	public function getCodigoPostal() {
		return $this->codigo_postal;
	}

	public function setCodigoPostal($codigo_postal) {
		$this->codigo_postal = $codigo_postal;
	}

	public function getTelefono() {
		return $this->telefono;
	}

	public function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	public function getProvincia(){
		return $this->provincia;
	}

	public function setProvincia($provincia){
		$this->provincia = $provincia;
	}

	// Inserta valores nuevos a la tabla tienda	 
	public static function save($tienda) {
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO tienda VALUES (NULL,:nombre_tienda,:direccion,:codigo_postal,
			:telefono,:id_provincia)');

		$insert->bindValue('nombre_tienda',$tienda->getNombreTienda());
		$insert->bindValue('direccion',$tienda->getDireccion());		
		$insert->bindValue('codigo_postal',$tienda->getCodigoPostal());		
		$insert->bindValue('telefono',$tienda->getTelefono());
		$insert->bindValue('id_provincia',$tienda->getProvincia());
		$insert->execute();

	}

	/* Hace una consulta devolviendo los datos de la tienda
	 * y ordenándolos por su id
	 */
	public static function all(){
		$db=Db::getConnect();
		$listaTienda=[];

		$select=$db->query('SELECT * 
							FROM tienda INNER JOIN provincia
							ON tienda.id_provincia = provincia.id_provincia; 
							ORDER BY id');

		foreach($select->fetchAll() as $tienda){
			$listaTienda[]=new Tienda($tienda['id_tienda'],$tienda['nombre_tienda'],$tienda['direccion'],
				$tienda['codigo_postal'],$tienda['telefono'],$tienda['nombre_provincia']);
		}
		
		return $listaTienda;
	}

	//Hace búsquedas por el nombre de la tienda
	public static function searchByName($name){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM tienda INNER JOIN provincia
							  ON tienda.id_provincia = provincia.id_provincia 
							  WHERE nombre_tienda=:nombre_tienda');
		$select->bindValue('nombre_tienda',$name);
		$select->execute();

		$tiendaDb=$select->fetch();

		$tienda = new Tienda ($tiendaDb['id_tienda'],$tiendaDb['nombre_tienda'], $tiendaDb['direccion'], 
							  $tiendaDb['codigo_postal'], $tiendaDb['telefono'], 
							  $tiendaDb['id_provincia']);
	
		return $tienda;

	}

	//Hace búsquedas por el id
	public static function searchById($id_tienda){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM tienda INNER JOIN provincia
							  ON tienda.id_provincia = provincia.id_provincia 
							  WHERE id_tienda=:id_tienda');
		$select->bindValue('id_tienda',$id_tienda);
		$select->execute();

		$tiendaDb=$select->fetch();


		$tienda = new Tienda ($tiendaDb['id_tienda'],$tiendaDb['nombre_tienda'], $tiendaDb['direccion'], 
							  $tiendaDb['codigo_postal'], $tiendaDb['telefono'], 
							  $tiendaDb['id_provincia']);
							  
		return $tienda;

	}

	//Actualiza los valores de la tabla tienda
	public static function update($tienda){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE tienda SET nombre_tienda=:nombre_tienda, direccion=:direccion,
			codigo_postal=:codigo_postal, telefono=:telefono WHERE id_tienda=:id_tienda');
		$update->bindValue('nombre_tienda', $tienda->getNombreTienda());
		$update->bindValue('direccion',$tienda->getDireccion());
		$update->bindValue('codigo_postal',$tienda->getCodigoPostal());
		$update->bindValue('telefono',$tienda->getTelefono());
		$update->bindValue('id_provincia',$tienda->getId());
		$update->execute();
	}

	//Borra una tienda por su id
	public static function delete($id_tienda){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM tienda WHERE id_tienda=:id_tienda');
		$delete->bindValue('id_tienda',$id_tienda);
		$delete->execute();		
	}
}

?>