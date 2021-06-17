<?php 
/**
* Vista modelo inventario
*/
class Inventario
{
	private $id_inventario;
	private $nombre_producto;
	private $precio;
	private $cantidad;
	private $descripcion;
	private $tienda;

	//Constructor del inventario
	function __construct($id_inventario, $nombre_producto, $precio, $cantidad, $descripcion,$tienda)
	{
		$this->setIdInventario($id_inventario);
		$this->setNombreProducto($nombre_producto);
		$this->setPrecio($precio);
		$this->setCantidad($cantidad);
		$this->setDescripcion($descripcion);
		$this->setTienda($tienda);	
	}

	//Getters y setters de inventario
	public function getIdInventario(){
		return $this->id_inventario;
	}

	public function setIdInventario($id_inventario){
		$this->id_inventario = $id_inventario;
	}

	public function getNombreProducto(){
		return $this->nombre_producto;
	}

	public function setNombreProducto($nombre_producto){
		$this->nombre_producto = $nombre_producto;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getTienda(){
		return $this->tienda;
	}

	public function setTienda($tienda){
		$this->tienda = $tienda;
	}

	// Inserta valores nuevos a la tabla inventario	 
	public static function save($inventario){
		$db=Db::getConnect();
				
		$insert=$db->prepare('INSERT INTO inventario VALUES (NULL, :nombre_producto,:precio,:cantidad,
			:descripcion,:id_tienda)');

		$insert->bindValue('nombre_producto',$inventario->getNombreProducto());
		$insert->bindValue('precio',$inventario->getPrecio());
		$insert->bindValue('cantidad',$inventario->getCantidad());
		$insert->bindValue('descripcion',$inventario->getDescripcion());		
		$insert->bindValue('id_tienda',$inventario->getTienda());
		$insert->execute();

	}

	/* Hace una consulta devolviendo los datos del inventario
	 * y ordenándolos por su id
	 */
	public static function all(){
		$db=Db::getConnect();
		$listaInventario=[];

		$select=$db->query('SELECT * 
							FROM inventario INNER JOIN tienda
							ON inventario.id_tienda = tienda.id_tienda 
							ORDER BY id_inventario');

		foreach($select->fetchAll() as $inventario){
			$listaInventario[]=new Inventario($inventario['id_inventario'],$inventario['nombre_producto'],$inventario['precio'],
				$inventario['cantidad'],$inventario['descripcion'],$inventario['nombre_tienda']);
		}
		
		return $listaInventario;
	}

	//Hace búsquedas por el nombre del inventario
	public static function searchByName($name){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM inventario INNER JOIN tienda
							  ON inventario.id_tienda = tienda.id_tienda 
							  WHERE nombre_producto=:nombre_producto');
		$select->bindValue('nombre_producto',$name);
		$select->execute();

		$inventarioDb=$select->fetch();

		$inventario = new Inventario ($inventarioDb['id_inventario'],$inventarioDb['nombre_producto'], $inventarioDb['precio'], 
							  $inventarioDb['cantidad'], $inventarioDb['descripcion'], $inventarioDb['id_tienda']);
	
		return $inventario;

	}

	//Hace búsquedas por el id
	public static function searchById($id_inventario){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT *
							  FROM inventario 
							  WHERE id_inventario=:id_inventario');
		$select->bindValue('id_inventario',$id_inventario);
		$select->execute();

		$inventarioDb=$select->fetch();


		$inventario = new Inventario ($inventarioDb['id_inventario'],$inventarioDb['nombre_producto'], $inventarioDb['precio'], 
							  $inventarioDb['cantidad'], $inventarioDb['descripcion'], $inventarioDb['id_tienda']);
	
		return $inventario;
	}

	//Actualiza los valores de la tabla inventario
	public static function update($inventario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE inventario SET nombre_producto=:nombre_producto, precio=:precio,
			cantidad=:cantidad, descripcion=:descripcion, id_tienda=:id_tienda WHERE id_inventario=:id_inventario');
		$update->bindValue('id_inventario',$inventario->getIdInventario());
		$update->bindValue('nombre_producto', $inventario->getNombreProducto());
		$update->bindValue('precio',$inventario->getPrecio());
		$update->bindValue('cantidad',$inventario->getCantidad());
		$update->bindValue('descripcion',$inventario->getDescripcion());
		$update->bindValue('id_tienda',$inventario->getTienda());
		$update->execute();
	}

	//Borra el producto del inventario por su id
	public static function delete($id_inventario){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM inventario WHERE id_inventario=:id_inventario');
		$delete->bindValue('id_inventario',$id_inventario);
		$delete->execute();		
	}
}

?>